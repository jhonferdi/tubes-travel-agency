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
        <p>Riwayat Pemesanan</p>

        <div class="container p-3 my-3">
            <table class="table">
                <thead class="thead-light bg-light">
                  <tr>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Tanggal Perjalanan</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Invoice</th>
                    <th scope="col" style="width: 40px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($data['booking'] as $key => $booking)
                      <tr>
                            <td>{{$booking->nama}}</td>
                            <td>{{$booking->paket_wisata}}</td>
                            <td>{{$booking->tgl_perjalanan}}</td>
                            <td>{{$booking->metode_pembayaran}}</td>
                            <td>Rp{{number_format($booking->harga)}}</td>
                            <td>{{$booking->invoice}}</td>
                            <td style="display:flex;">
                                <a href="{{route('booking.edit',['id'=>$booking->id])}}" class="btn btn-primary btn-sm mx-2">Reschedule</a>
                                <button type="button" class="btn btn-danger btn-sm batalkan" data-bs-toggle="modal" data-bs-target="#konfirmasi" id="{{$booking->id}}">Batalkan</button>
                            </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="7" align="center">Belum ada pemesanan</td>
                      </tr>
                  @endforelse
                </tbody>
            </table>
    
            <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="konfirmasiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="konfirmasiLabel">Konfirmasi Batalkan Pemesanan</h5>
                    </div>
                    <div class="modal-body">
                        <P>Apakah anda yakin ingin membatalkan pemesanan?</P>
                        <div class="d-flex justify-content-center">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form class="form-batalkan" action="" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Konfirmasi Batalkan Pemesanan" class="btn btn-danger">
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('MilleniumTravelAgency/Home/home.js')}}"></script>
    <script>
        $('.batalkan').click(function(){
            $('.form-batalkan').attr('action',`/paket/hapus/${this.id}`);
        });
    </script>

    <script>
        $('#profil').addClass('this');
    </script>
@endpush