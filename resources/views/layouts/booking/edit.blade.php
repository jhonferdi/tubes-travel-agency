@extends('layouts.base')

@push('styles')
    <link href="{{asset('MilleniumTravelAgency/PaketWisata/paketWisata.css')}}" rel="stylesheet">
@endpush

@section('title')
    Reschedule Tanggal Perjalanan
@endsection

@section('content')
    <div class="container bg-light p-3 mb-3 shadow" style="margin-top: 110px">
        <form action="{{route('booking.update',['id'=>$booking->id])}}" method="POST" class="my-2">
            @csrf
            @method('PUT')
            <h3 class="my-2">Reschedule Tanggal Perjalanan</h3>
            <div class="my-3 p-2 border shadow-sm">
                <div class="form-group my-2">
                    <label for="tgl_perjalanan">Tanggal Perjalanan Baru</label>
                    <input type="date" class="form-control" name="tgl_perjalanan" id="tgl_perjalanan" value="{{$booking->tgl_perjalanan}}" min="{{date('Y-m-d')}}" required>
                </div>
                @error('tgl_perjalanan')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2 p-2 border border-warning shadow-sm">
                <h4>Konfirmasi Reschedule</h4>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="" placeholder="Masukkan email anda" required>
                </div>
                @error('email')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

                <div class="form-group my-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password anda" required>
                </div>
                @if (Session::has('invalid_user'))
                    <div class="alert alert-danger my-2" role="alert">
                        {{Session::get('invalid_user')}}
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-warning my-3">Ubah</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('MilleniumTravelAgency/PaketWisata/paketWisata.js')}}"></script>
@endpush