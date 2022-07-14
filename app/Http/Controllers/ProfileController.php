<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use Auth;
use Session;
use Hash;
use Alert;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $id = Auth::user()->id;
        $data['user'] = User::where('id',$id)->first();

        if (Auth::user()->isadmin) {
            $data['booking'] = Booking::orderBy('tgl_perjalanan')->get();
            return view('layouts.profile.admin',compact('data'));
        } else {
            $data['booking'] = Booking::where('user_id',$id)->orderBy('tgl_perjalanan')->get();
            return view('layouts.profile.index',compact('data'));
        }
    }
    public function edit(){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('layouts.profile.edit', compact('data'));
    }

    public function update(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);

        $request->validate([
            'username' => ['required','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        if ($request->email != $user->email) {
            $request->validate([
                'email' => ['unique:users']
            ]);
        }

        $password = $user->password;
        if(isset($request->password_lama,$request->password,$request->password_confirmation)){
            if(!Hash::check($request->password_lama, $password)){
                // Session::flash('invalid_pass','Password lama anda salah');
                Alert::error('Error', 'Password lama anda salah');
                return redirect()->back();
            }
            
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
            $password = Hash::make($request['password']);
        }

        $profile = User::where('id',$id)->update([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => $password
        ]);

        // Session::flash('success','Berhasil memperbarui profil');
        Alert::success('Berhasil', 'Berhasil memperbarui profil');

        return redirect('/profile');
        
    }

    public function destroy(){
        $id = Auth::user()->id;

        $bookings = Booking::where('user_id',$id)->get();
        $bookings->each->delete();

        Auth::logout();
        User::where('id',$id)->delete();

        return redirect('/');
    }
}
