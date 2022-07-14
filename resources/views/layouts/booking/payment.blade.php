@extends('layouts.base')

@push('styles')
    <link href="{{asset('MilleniumTravelAgency/PaketWisata/paketWisata.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('title')
    Paket Wisata
@endsection

@section('content')
<div class="container" style="margin-top: 75px">
    <div class="d-flex justify-content-center">
        @if ($booking = Session::get('booking'))

            <div class="card my-5 p-3 shadow">
                <h5 class="card-header">Pembayaran</h5>
                <div class="card-body">
                    <h5 class="card-title">Detail Pemesanan</h5>
                    <hr>
                    <p class="card-text my-5">Nama Pemesan: <b>{{$booking['nama']}}</b></p>
                    <p class="card-text my-5">Tanggal Perjalanan: <b>{{$booking['tglperjalanan']}}</b></p>
                    <p class="card-text my-5">Paket Wisata: <b>{{$booking['paketwisata']}}</b></p>
                    <p class="card-text my-5">Metode Pembayaran: <b>{{$booking['metodePembayaran']}}</b></p>
                    <p class="card-text my-5">Harga: <b>Rp{{number_format($booking['harga'])}}</b></p>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pembayaran">Bayar Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="pembayaran" tabindex="-1" role="dialog" aria-labelledby="pembayaranLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="pembayaranLabel">Pembayaran</h5>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <div class="visible-print text-center">
                                {!! $booking['qrcode'] !!}
                                <p><span> invoice: {{$booking['invoice']}}</span></p>
                                <p>Scan Qr Code untuk melakukan pembayaran.</p>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-center">
                            <form action="{{route('booking.store')}}" method="post">
                                @csrf
                                @method('POST')
                                <input type="submit" value="Konfirmasi Pembayaran" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{asset('MilleniumTravelAgency/PaketWisata/paketWisata.js')}}"></script>
@endpush