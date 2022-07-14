@extends('layouts.base')

@push('styles')
    <link href="{{asset('MilleniumTravelAgency/Home/home.css')}}" rel="stylesheet">
@endpush

@section('title')
    Edit Profil
@endsection

@section('content')
    <div class="container bg-light p-3 mb-3 shadow" style="margin-top: 110px">
        <form action="{{route('profile.update')}}" method="POST" class="my-2">
            @csrf
            @method('PUT')
            <h3>Edit Data Profil</h3>
            <div class="my-3 p-2 border shadow-sm">
                <div class="form-group my-2">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username', $data->username) }}" required>
                </div>
                @error('username')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-3 p-2 border border-warning shadow-sm">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $data->email) }}" required>
                </div>
                @error('email')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-3 p-2 border border-warning shadow-sm">
                <div class="form-group my-2">
                    <label for="password_lama">Password lama</label>
                    <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Masukkan password lama anda">
                </div>

                <div class="form-group my-2">
                    <label for="password">Password Baru</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password baru anda">
                </div>

                <div class="form-group my-2">
                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukkan kembali password baru anda">
                </div>

                @if (Session::has('invalid_pass'))
                    <div class="alert alert-danger my-2" role="alert">
                        {{Session::get('invalid_pass')}}
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-warning my-3">Ubah</button>
            </div>
            
            

        </form>

        <hr>
        
        <div class="my-3 p-1">
            <button type="button" class="btn btn-danger my-3 w-100" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus Akun</button>
        </div>

        <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="konfirmasiLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="konfirmasiLabel">Konfirmasi Hapus Akun</h5>
                </div>
                <div class="modal-body">
                    <P>Apakah anda yakin ingin menghapus akun?</P>
                    <p>Akun yang telah dihapus <b>tidak dapat dikembalikan</b> dan <b>semua pemesanan akan dibatalkan</b></p>
                    <div class="d-flex justify-content-center">
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{route('profile.destroy')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Konfirmasi Hapus Akun" class="btn btn-danger">
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('MilleniumTravelAgency/Home/home.js')}}"></script>
    <script>
        $('#profil').addClass('this');
    </script>
@endpush