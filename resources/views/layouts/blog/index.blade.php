@extends('layouts.blog.base')

@section('title')
    Blog - {{$blog}}
@endsection

@push('styles')
    <style>
        .img-preview{
            max-width: 100%;
            height: auto;
        }
        #tambahDestinasi{
            margin-top: -30px;
            width: 150px;
            background-color: blue;
            height: 40px;
            color: white;
            border-radius: 10px;
            border: 0px;
            margin-left: 10px;
        }

        button#tambahDestinasi:hover{
            background-color:  orangered;
            text-decoration: solid;
        }
        div.button{
            margin-left: 80%;
            margin-top: -40px;
        }
        a.btn:hover{
            background-color:  blue;
            color: white;
            text-decoration: solid;
        }
    </style>
@endpush

@section('content')
<div id="main">
    <div class="menu">
    <nav class="nav-menu">
        @php
            $menu = [
                'Wisata Alam' => 'blog.alam',
                'Kuliner' => 'blog.kuliner',
                'Hotel' => 'blog.hotel',
                'Hiburan' => 'blog.hiburan'
                ]
        @endphp
        <ul class="contain">
            @foreach ($menu as $kategori => $route)
            @if ($kategori == $blog)
            <li>
                <a href="{{route($route)}}" class="item this">{{$kategori}}</a>
            </li>
            @else
            <li>
                <a href="{{route($route)}}" class="item">{{$kategori}}</a>
            </li>
            @endif
            @endforeach
        </ul>
    </nav>
</div>
<div class="container">
        @if (Auth::check())
            @if (Auth::user()->isadmin)
                <button id="tambahDestinasi">Tambah Destinasi</button>
            @endif
        @endif
        @foreach ($data as $destination)
            <div class="box-item">
                <div class="left-item">
                    <img src="{{asset($destination->gambar)}}" alt="{{$destination->nama}}">
                </div>
                <div class="right-item">
                    <h3>{{$destination->nama}}</h3>
                    <p class="text-break">{{$destination->deskripsi}}</p>
                    <p>Lokasi: {{$destination->lokasi}}</p>
                    @isset($destination->harga)
                        <p>Info Harga/Tiket: {{$destination->harga}}</p>
                    @endisset

                    @isset($destination->link_resmi)
                        <p>Link Resmi: <a href="{{$destination->link_resmi}}">{{$destination->nama}}</a></p>
                    @endisset

                    <br>
                    @if (Auth::check())
                        @if (Auth::user()->isadmin)
                            <div class="button mb-2">
                                <a id="{{$destination->id}}" class="btn btn-warning btn-sm ubahDestinasi update" role="button">Ubah</a>
                                <a id="{{$destination->id}}" class="btn btn-danger btn-sm hapusDestinasi" role="button">Hapus</a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-end">
            {!!$data->links('vendor.pagination.custom-simple')!!}
        </div>
    </div>
</div>

<div class="modal fade" id="modal-destinasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                <h3 id="header-modal">Tambah Destinasi</h3>
                <hr>
                <form action="{{route('blog.store')}}" method="post" class="p-1" id="destinasiForm" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Destinasi</label>
                        <input type="text" class="form-control " id="nama" name="nama" required placeholder="Masukkan nama destinasi">
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label">Gambar Destinasi</label>
                        <input type="file" class="form-control " id="gambar" name="gambar" required onchange="previewGambar()">
                    </div>

                    <div class="d-flex justify-content-center mb-4">
                        <img class="img-preview d-block">
                    </div>

                    <div class="mb-4">
                        <label for="kategori" class="form-label">Kategori Destinasi</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="Wisata Alam">Wisata Alam</option>
                            <option value="Kuliner">Kuliner</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Hiburan">Hiburan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label">Deskripsi Destinasi</label>
                        <textarea class="form-control " id="deskripsi" name="deskripsi" rows="3" required placeholder="Masukkan deskripsi destinasi"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="lokasi" class="form-label">Lokasi Destinasi</label>
                        <input type="text" class="form-control " id="lokasi" name="lokasi" required placeholder="Contoh: Dieng">
                    </div>

                    <div class="mb-4">
                        <label for="harga" class="form-label">Info Harga atau Tiket Masuk <span>(opsional)</span></label>
                        <input type="text" class="form-control " id="harga" name="harga" placeholder="Contoh: Gratis atau Rp10000/orang atau Rp5000/porsi">
                    </div>

                    <div class="mb-4">
                        <label for="link_resmi" class="form-label">Link resmi <span>(opsional)</span></label>
                        <input type="text" class="form-control " id="link_resmi" name="link_resmi" placeholder="Contoh: www.banjarnegara.com">
                    </div>

                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Tambah" class="btn btn-primary" id="submit">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="konfirmasi-hapus" tabindex="-1" role="dialog" aria-labelledby="konfirmasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="konfirmasiLabel">Konfirmasi Hapus Destinasi</h5>
        </div>
        <div class="modal-body">
            <P>Apakah anda yakin ingin menghapus destinasi?</P>
            <div class="d-flex justify-content-center">
            </div>
        </div>
        <div class="modal-footer">
            <form class="form-hapus" action="" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Konfirmasi" class="btn btn-danger">
            </form>
        </div>
      </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewGambar() {
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        const FReader = new FileReader();
        FReader.readAsDataURL(gambar.files[0]);
        FReader.onload = function(FREvent){
            imgPreview.src = FREvent.target.result;
        }
    }

    $('#tambahDestinasi').click(function(){
        showModal(this);
    });

    $('.ubahDestinasi').click(function(){
        showModal(this);
    });

    $('.hapusDestinasi').click(function(){
        $('.form-hapus').attr('action',`/blog/hapus/${this.id}`);
        $('#konfirmasi-hapus').modal('show');
    });

    function showModal(element){
        //Reset form modal
        document.getElementById('destinasiForm').reset();
        $('#destinasiForm').attr('action','/blog/tambah');
        $('#gambar').attr('required');
        $("input[name='_method']").val('POST');
        document.getElementById('header-modal').innerHTML = "Tambah Destinasi";
        document.getElementById('submit').value = "Tambah";
        $('.img-preview').removeAttr('src');

        if (element.classList.contains('update')) {
            document.getElementById('header-modal').innerHTML = "Edit Destinasi";
            document.getElementById('submit').value = "Edit";
            $("input[name='_method']").val('PUT');
            $('#gambar').removeAttr('required');

            $.ajax('/api/blog/cari',{
                data:{'id_destinasi':element.id},
                success: setForm
            })
        }
        $('#modal-destinasi').modal('show');
    }

    function setForm(data){
        if (data?.data.length != 0) {
            let destinasi = data?.data[0];

            $('#destinasiForm').attr('action',`/blog/edit/${destinasi.id}`);

            $('#nama').val(destinasi.nama);

            $('.img-preview').attr('src',`/${destinasi.gambar}`);

            $('#kategori').val(destinasi.kategori);

            $('#deskripsi').val(destinasi.deskripsi);

            $('#lokasi').val(destinasi.lokasi);

            $('#harga').val(destinasi.harga);

            $('#link_resmi').val(destinasi.link_resmi);
        }
    }

</script>
@endpush
