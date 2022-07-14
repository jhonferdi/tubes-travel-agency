@extends('layouts.base')

@push('styles')
    <link href="{{asset('MilleniumTravelAgency/Kontak/kontak.css')}}" rel="stylesheet">
@endpush

@section('title')
    Kontak
@endsection

@section('content')
  <section class="konten">
      <div class="left">
          <h1>Company <br> Name</h1>
      </div>
      <div class="right">
          <h3>Millenium Travel Agency</h3>
      </div>
  </section>
  <section class="konten">
      <div class="left">
          <img src="{{asset('MilleniumTravelAgency/Kontak/address.png')}}" alt="address">
          <h1>Alamat</h1>
      </div>
      <div class="right" style="padding-top: 0px;">
          <h3>Jl. S. Parman No. 171 <br>
              Parakancanggah <br>
              Banjarnegara, Jawa Tengah
          </h3>
      </div>
  </section>
  <section class="konten">
      <div class="left">
          <img src="{{asset('MilleniumTravelAgency/Kontak/email.png')}}" alt="email">
          <h1>Email</h1>
      </div>
      <div class="right">
          <h3>millennium.travelagency@gmail.com</h3>
      </div>
  </section>
  <section class="konten">
      <div class="left">
          <img src="{{asset('MilleniumTravelAgency/Kontak/call.png')}}" alt="call">
          <h1>Tlepon</h1>
      </div>
      <div class="right">
          <h3>+62 89-505-1691</h3>
      </div>
  </section>
@endsection

@push('scripts')
    <script>
        $('#kontak').addClass('this');
    </script>
@endpush