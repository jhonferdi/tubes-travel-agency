<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Auth;
use Session;
use Hash;
use Alert;

class BookingController extends Controller
{
    private $paket = array(
        "Honeymoon In Blue Clouds" => 1500000,
        "Fun Family Vacation" => 2500000,
        "Solo Traveller" => 2500000
    );

    public function __construct(){
        //Semua perlu login kecuali index
        $this->middleware('auth')->except(['index']);
    }

    private function generateInvoice(){
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charslen = strlen($chars);
        $randomString = '';

        for ($i=0; $i < 32; $i++) { 
            $randomString .= $chars[rand(0,$charslen-1)];
        }

        return $randomString;
    }

    public function index(){
        return view('layouts.booking.index');
    }

    public function payment(Request $request){
        $request->validate([
            "nama" => 'required|string',
            "tglperjalanan" => 'required|date',
            "paketwisata" => 'required',
            "metodePembayaran" => 'required'
        ]);

        $invoice = $this->generateInvoice();
        
        $booking = array(
            "nama" => $request['nama'],
            "tglperjalanan" => $request['tglperjalanan'],
            "paketwisata" => $request['paketwisata'],
            "metodePembayaran" => $request['metodePembayaran'],
            'harga' => $this->paket[$request['paketwisata']],
            'invoice' => $invoice,
            'qrcode' => QrCode::size(250)->generate('simulasi-pembayaran-' . $invoice)
        );
        
        Session::put('booking',$booking);
        
        return redirect()->route('booking.create');
    }
    
    public function create()
    {
        return view('layouts.booking.payment');
    }
    
    public function store(Request $request){
        $id = Auth::user()->id;

        $booking = Session::get('booking');

        $booking = Booking::create([
            "user_id" => $id,
            "nama" => $booking['nama'],
            "tgl_perjalanan" => $booking['tglperjalanan'],
            "paket_wisata" => $booking['paketwisata'],
            "metode_pembayaran" => $booking['metodePembayaran'],
            'harga' => $booking['harga'],
            'invoice' => $booking['invoice']
        ]);
        
        Session::forget('booking');
        Alert::success('Berhasil', 'Berhasil melakukan pemesanan');

        return redirect('/paket');
    }
    
    public function edit($id){
        $user_id = Auth::user()->id;
        $booking = Booking::where('id',$id)->where('user_id',$user_id)->first();
        if (isset($booking)) {
            return view('layouts.booking.edit',compact('booking'));
        } else {
            abort(401);
        }
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'email' => ['required','string','email'],
            'password' => ['required','string'],
            'tgl_perjalanan' => ['required','date']
        ]);

        $user = Auth::user();
        
        if ($user->email === $request['email'] && Hash::check($request['password'], $user->password)){
            Booking::where('id',$id)->where('user_id',$user->id)->update([
                'tgl_perjalanan' => $request['tgl_perjalanan']
            ]);
            Alert::success('Berhasil', 'Berhasil melakukan reschedule');
            return redirect()->route('profile.index');
        }
        // Session::flash('invalid_user','Email atau Password anda salah');
        Alert::error('Error','Email atau Password anda salah');
        return redirect()->back();
    }

    public function show($id){
        //
    }

    public function destroy($id){
        $user_id = Auth::user()->id;
        $booking = Booking::where('id',$id)->where('user_id',$user_id)->delete();
        Alert::success('Berhasil', 'Berhasil melakukan pembatalan pemesanan');
        return redirect()->back();
    }
}
