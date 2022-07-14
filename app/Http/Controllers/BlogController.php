<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only(['store','update','destroy']);
    }
    public function alam(){
        $data = Destination::where('kategori','Wisata Alam')->simplePaginate(2);
        $blog = 'Wisata Alam';
        return view('layouts.blog.index',['data'=>$data,'blog'=>$blog]);
    }

    public function kuliner(){
        $data = Destination::where('kategori','Kuliner')->simplePaginate(2);
        $blog = 'Kuliner';
        return view('layouts.blog.index',['data'=>$data,'blog'=>$blog]);
    }

    public function hotel(){
        $data = Destination::where('kategori','Hotel')->simplePaginate(2);
        $blog = 'Hotel';
        return view('layouts.blog.index',['data'=>$data,'blog'=>$blog]);
    }

    public function hiburan(){
        $data = Destination::where('kategori','Hiburan')->simplePaginate(2);
        $blog = 'Hiburan';
        return view('layouts.blog.index',['data'=>$data,'blog'=>$blog]);
    }

    // public function create(){
    //     if(Auth::check()){
    //         return view('layouts.blog.create');
    //     } else {
    //         abort(401);
    //     }
    // }

    public function store(Request $request){
        if (!Auth::user()->isadmin) {
            abort(401);
        }
        $request->validate([
            'nama' => ['required'],
            'gambar' => ['required','file','image'],
            'deskripsi' => ['required'],
            'lokasi' => ['required']
        ]);

        $path = Storage::putFile('public/destination-images', $request->file("gambar"));
        Destination::create([
            'nama' => $request['nama'],
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => $request['deskripsi'],
            'lokasi' => $request['lokasi'],
            'harga' => $request['harga'],
            'link_resmi' => $request['link_resmi'],
            'kategori' => $request['kategori']
        ]);
        Alert::success('Berhasil', 'Berhasil menambah destinasi');

        return redirect()->back();
    }
    
    // public function edit($id){
        
    // }
    
    public function update(Request $request, $id){
        if (!Auth::user()->isadmin) {
            abort(401);
        }
        $request->validate([
            'nama' => ['required'],
            'gambar' => ['file','image'],
            'deskripsi' => ['required'],
            'lokasi' => ['required']
        ]);

        $destinasi = Destination::where('id',$id)->first();

        $path = $destinasi->gambar;
        if($request->file('gambar') !== null){
            $path = Storage::putFile('public/destination-images', $request->file("gambar"));
            $path = str_replace('public/','storage/',$path);
        }

        Destination::where('id',$id)->update([
            'nama' => $request['nama'],
            'gambar' => $path,
            'deskripsi' => $request['deskripsi'],
            'lokasi' => $request['lokasi'],
            'harga' => $request['harga'],
            'link_resmi' => $request['link_resmi'],
            'kategori' => $request['kategori']
        ]);
        Alert::success('Berhasil', 'Berhasil mengedit destinasi');
        
        return redirect()->back();
    }

    public function destroy($id){
        if (!Auth::user()->isadmin) {
            abort(401);
        }
        Destination::where('id',$id)->delete();
        Alert::success('Berhasil', 'Berhasil menghapus destinasi');
        return redirect()->back();
    }
}
