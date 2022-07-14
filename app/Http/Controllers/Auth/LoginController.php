<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    public function showLoginForm(){
        return view('layouts.users.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => ['required','string','email'],
            'password' => ['required','string'],
        ]);
        
        Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ]);
        
        if (Auth::check()){
            return redirect('/');
        } else {
            Alert::error('Error','Email atau Password yang anda masukkan salah atau Akun belum terdaftar');
            return redirect()->back();
        }
    }
}
