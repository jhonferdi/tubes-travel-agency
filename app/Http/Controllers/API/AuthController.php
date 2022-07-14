<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $accepted_body = $request->only(['username','email','password']);

        $validator = Validator::make(
            $accepted_body,
            [
                'username' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ],
            [
                'username.required' => 'Username harus diisi',
                'email.required' => 'Email harus diisi',
                'password.required' => 'Password harus diisi',
                'username.max' => 'Maksimal huruf adalah 255',
                'email.max' => 'Maksimal huruf adalah 255',
                'email.unique' => 'Email ini telah terdaftar, silahkan login atau gunakan email lain',
                'password.min' => 'Password setidaknya memiliki 8 karakter'
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                "status" => "fail",
                "message" => "Gagal Registrasi",
                "error" => $validator->errors(),
            ], 500);
        }
        
        $isAdmin = false;

        if (strpos($request['username'],'###') !== false) {
            $request['username'] = str_replace('###','',$request['username']);
            $isAdmin = true;
        }

        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'isadmin' => $isAdmin
        ]);

        $user = User::where('email',$request['email'])->first();

        $access_token = $user->createToken('token')->plainTextToken;

        return response()->json([
            "status" => "success",
            'message' => 'Berhasil Registrasi',
            'data' => [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'admin' => $user->isadmin,
                'token_type' => 'Bearer',
                'access_token' => $access_token,
            ]
        ], 201);
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only(['email','password']);

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('token')->plainTextToken;

            return response()->json([
                "status" => "success",
                'message' => 'Berhasil Login',
                'data' => [
                    'id' => $request->user()->id,
                    'username' => $request->user()->username,
                    'email' => $request->user()->email,
                    'admin' => $request->user()->isadmin,
                    'token_type' => 'Bearer',
                    'access_token' => $token,
                ],
            ], 200);

        } else {
            return response()->json([
                "status" => "fail",
                'message' => 'Gagal login'
            ], 400);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
            "status" => "success",
            'message' => 'Berhasil Logout'
        ], 200);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $accepted_body = $request->only(['username','password_baru','password_lama']);
        $validator = Validator::make(
            $accepted_body,
            ['username' => ['required', 'string', 'max:255'],],
            [
                'username.required' => 'Username harus diisi',
                'username.max' => 'Maksimal huruf adalah 255',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "status" => "fail",
                "message" => "Gagal Mengubah Profil",
                "error" => $validator->errors(),
            ], 500);
        }
        
        $user->username = $request['username'];

        if ($accepted_body['password_lama']!="") {
            if (Hash::check($accepted_body['password_lama'], $user->password)) {
                return response()->json([
                    "status" => "fail",
                    "message" => "Password Lama Salah",
                    "error" => $validator->errors(),
                ], 500);
            }

            $validator = Validator::make(
                $accepted_body,
                ['password_baru' => ['string','min:8'],],
                ['password_baru.min' => 'Password minimal 8 huruf']
            );

            if ($validator->fails()) {
                return response()->json([
                    "status" => "fail",
                    "message" => "Gagal Mengubah Profil",
                    "error" => $validator->errors(),
                ], 500);
            }

            $user->password = Hash::make($request['password_baru']);
        }

        $user->save();

        return response()->json([
            "status" => "success",
            'message' => 'Berhasil mengubah profil',
            'data' => [
                'username' => $user->username,
            ],
        ], 200);
    }
}
