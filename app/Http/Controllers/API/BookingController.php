<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function all(Request $request){
        $user = $request->user();

        $booking = Booking::where('user_id',$user->id)->orderBy('tgl_perjalanan')->get();

        return response()->json([
            "status" => "success",
            'message' => 'Berhasil mendapatkan data booking',
            'data' => $booking,
        ], 200);
    }

    public function store(Request $request){
        $id = $request->user()->id;

        $booking = Booking::create([
            "user_id" => $id,
            "nama" => $request['nama'],
            "tgl_perjalanan" => $request['tgl_perjalanan'],
            "paket_wisata" => $request['paket_wisata'],
            "metode_pembayaran" => $request['metode_pembayaran'],
            'harga' => $request['harga'],
            'invoice' => $request['invoice']
        ]);
        
        return response()->json([
            "status" => "success",
            'message' => 'Berhasil Booking',
            'data' => $booking,
        ], 201);
    }

    public function reschedule(Request $request)
    {
        $id = $request->user()->id;

        $booking = Booking::where('user_id',$id)->where('invoice',$request['invoice'])->first();
        $booking->tgl_perjalanan = $request['tgl_perjalanan'];
        $booking->save();
        
        return response()->json([
            "status" => "success",
            'message' => 'Berhasil Reschedule',
            'data' => [
                'tgl_perjalanan' => $booking->tgl_perjalanan,
            ]
        ], 200);
    }

    public function destroy(Request $request)
    {
        $id = $request->user()->id;

        $booking = Booking::where('user_id',$id)->where('invoice',$request['invoice'])->delete();

        return response()->json([
            "status" => "success",
            'message' => 'Berhasil Melakukan Pembatalan',
        ], 200);
        
    }
}
