<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function alam(){
        $data = Destination::where('kategori','Wisata Alam')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function kuliner(){
        $data = Destination::where('kategori','Kuliner')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function hotel(){
        $data = Destination::where('kategori','Hotel')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function hiburan(){
        $data = Destination::where('kategori','Hiburan')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function cari(Request $request){
        $data = Destination::where('id',$request['id_destinasi'])->get();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }
}
