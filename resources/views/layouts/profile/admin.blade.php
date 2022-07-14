@extends('layouts.base')

@push('styles')
    <link href="{{asset('MilleniumTravelAgency/Home/home.css')}}" rel="stylesheet">
@endpush

@section('title')
    Profil
@endsection

@section('content')
    <div class="container p-3 mb-3" style="margin-top: 100px">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif

        <p>Nama: {{$data['user']->username}}</p>
        <p>Email: {{$data['user']->email}}</p>

        <div class="d-flex justify-content-between">
            <a href="/profile/edit" class="btn btn-secondary" role="button">Pengaturan</a>
            <a href="/logout" class="btn btn-danger" role="button">Keluar</a>
        </div>
    </div>
    <div class="container p-3">
        <p>Data Pemesanan</p>

        <div class="container p-3 my-3">
            <table class="table">
                <thead class="thead-light bg-light">
                  <tr>
                    <th scope="col">Email Pemesan</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Tanggal Perjalanan</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Invoice</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($data['booking'] as $key => $booking)
                      <tr>
                            <td>{{$booking->user->email}}</td>
                            <td>{{$booking->nama}}</td>
                            <td>{{$booking->paket_wisata}}</td>
                            <td>{{$booking->tgl_perjalanan}}</td>
                            <td>{{$booking->metode_pembayaran}}</td>
                            <td>Rp{{number_format($booking->harga)}}</td>
                            <td>{{$booking->invoice}}</td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="7" align="center">Belum ada pemesanan</td>
                      </tr>
                  @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('MilleniumTravelAgency/Home/home.js')}}"></script>
    <script>
        $('#profil').addClass('this');
    </script>
@endpush