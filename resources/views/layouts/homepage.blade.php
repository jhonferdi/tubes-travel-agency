@extends('layouts.base')

@section('title')
    MILLENNIUM TRAVEl AGEN
@endsection
@push('styles')
    <link href="{{asset('MilleniumTravelAgency/Home/home.css')}}" rel="stylesheet">
@endpush

@section('content')    
    <section id="header1">
    <div class="bgImg">
        <div class="textImg">
        <h1>Jika Anda Ingin Melihat Keindahan Dunia Yang Belum Pernah Anda Lihat Sebelumnya, Silahkan Datang Ke Banjarnegara!</h1>
        <!---<a type="button" class="btn btn-dark btn-lg btn-outline-light" href="#">PAKET WISATA</a>--->
        </div>
    </div>
    <div class="description">
        <p>
        Banjarnegara merupakan sebuah Kabupaten yang terletak di Jawa Tengah, Kabupaten ini memiliki 
        sejuta pesona dan panaroma alam yang menakjubkan dan masih banyak yang tersembunyi. 


        </p>
        <img src="{{asset('MilleniumTravelAgency/Home/banjarnegara.png')}}" alt="Banjarnegara">
    </div>
    </section>
    <section id="konten1" class="konten">
    <div>
        <h1>Perjalanan yang menyenangkan dan akan selalu terkenang</h1>
        <p>Saat trip menuju destinasi wisata akan sangat menyenangkan.
        Kita akan melewati pemandangan yang sangat indah.
        Akses jalan menuju destinasi wisata juga sangat nyaman.
        </p>
    </div>
    <div class="bgImg">
        <img src="{{asset('MilleniumTravelAgency/Home/konten1jpg.jpg')}}" alt="konten1">
    </div>
    </section>
    <section id="konten2" class="konten">
    <div>
        <h1>Pengalaman Tak Terlupakan Saat Berkunjung ke Banjarnegara</h1>
        <p>Banyak pengalaman menarik yang akan sulit anda lupakan ketika 
        mengunjungi Banjarnegara. Tempat yang sangat indah untuk membuat kenangan
        bersama teman, pasangan atau keluarga. Tempat destinasi wisata yang ramah
        lingkungan bagi anak-anak.
        </p>
    </div>
    <div class="bgImg">
        <img src="{{asset('MilleniumTravelAgency/Home/konten2.jpg')}}" alt="konten2">
    </div>
    </section>
    <section id="konten3" class="konten">
    <div>
        <h1>Beranekaragam Destinasi Wisata</h1>
        <p>Destinasi wisata untuk bersenang-senang bersama teman, pasangan, atau keluarga sangat Beranekaragam
        </p>
    </div>
    <div class="imageKonten">
        <div class="img">
            <img src="{{asset('MilleniumTravelAgency/Home/kawah.jpg')}}" alt="kawah">
            <h3>Kawah Sikidang</h3>
            <a type="button" class="button info-destinasi" id="Kawah Sikidang" style="vertical-align:middle"><span>Info Destinasi</span></a>
        </div>
        <div class="img">
            <img src="{{asset('MilleniumTravelAgency/Home/telaga.jpg')}}" alt="telaga">
            <h3>Telaga Warna</h3>
            <a type="button" class="button info-destinasi" id="Telaga Warna" style="vertical-align:middle"><span>Info Destinasi</span></a>
        </div>
        <div class="img">
            <img src="{{asset('MilleniumTravelAgency/Home/candi-dieng.jpg')}}" alt="candi">
            <h3>Candi Dieng</h3>
            <a type="button" class="button info-destinasi" id="Candi Dieng" style="vertical-align:middle"><span>Info Destinasi</span></a>
        </div>
    </div>
    <div class="arrow" style="margin-right: 10%;margin-top: 5%;">
        <a class="arrow_box" href="{{route('blog.alam')}}">Lihat Semua Destinasi</a>
    </div>

    
    </section>

    <div class="modal fade" id="modal-info-destinasi">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <h3 class="card-title my-2 p-3" id="nama-destinasi"></h3>
                    <div class="text-center p-3">
                        <img class="card-img" id="gambar-destinasi">
                    </div>
                    <div class="card-body">
                        <p class="card-text" id="deskripsi-destinasi"></p>
                        <p class="card-text" id="lokasi-destinasi"></p>
                        <p class="card-text" id="harga-destinasi"></p>
                        <p class="card-text" id="link-resmi-destinasi"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="konten4">
    <h1>Dieng Culture Festival!</h1>
    <div class="slider">
        <div class="slides">
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">

        <div class="slide first">
            <img src="{{asset('MilleniumTravelAgency/Home/slide2.jpg')}}" alt="slide1">
        </div>
        <div class="slide">
            <img src="{{asset('MilleniumTravelAgency/Home/slide3.jpg')}}" alt="slide2">
        </div>
        <div class="slide"> 
            <img src="{{asset('MilleniumTravelAgency/Home/slide1.jpg')}}" alt="slide3">
        </div>

        <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
        </div>

        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>
        </div>
    </div>
    </div>
    </section>
    <section id="konten5">
    <div class="judul">
        <h1>Kenapa Memilih Millennium Travel Agency?</h1>
    </div>
    <div class="inline">
        <div>
        <img src="{{asset('MilleniumTravelAgency/Home/murah.jpg')}}" alt="murah">
        <div class="textImg">
            <h2>Murah</h2>
        </div>
        </div>
        <div>
        <img src="{{asset('MilleniumTravelAgency/Home/aman.jpg')}}" alt="aman">
        <div class="textImg">
            <h2>Aman</h2>
        </div>
        </div>
        <div>
        <img src="{{asset('MilleniumTravelAgency/Home/terpercaya.jpg')}}" alt="terpercaya">
        <div class="beda">
            <h2>Terpercaya</h2>
        </div>
        </div>
    </div>
    <div class="arrow" style="text-align: right;margin-right: 10%;margin-top: 5%;">
        <a class="arrow_box" href="/paket">Pilih Paket Wisata</a>
    </div>
    </section>
@endsection

@push('scripts')
    <script src="{{asset('MilleniumTravelAgency/Home/home.js')}}"></script>
    
    <script>
        const gambarCard = document.getElementById('gambar-destinasi');
        const namaCard = document.getElementById('nama-destinasi');
        const deskripsiCard = document.getElementById('deskripsi-destinasi');
        const lokasiCard = document.getElementById('lokasi-destinasi');
        const hargaCard = document.getElementById('harga-destinasi');
        const linkResmiCard = document.getElementById('link-resmi-destinasi');
        
        $('.info-destinasi').click(function(e){
            e.preventDefault();

            $.ajax('/api/blog/cari',{
                data:{'kata_kunci':this.id},
                success: successHandler
            })
        });

        function successHandler(data) {
            // console.log(data?.data);
            if (data?.data.length != 0) {
                let destinasi = data?.data[0];
                
                gambarCard.src = `/${destinasi.gambar}`;
                gambarCard.alt = destinasi.nama;

                namaCard.innerHTML = destinasi.nama;

                deskripsiCard.innerHTML = destinasi.deskripsi;

                lokasiCard.innerHTML = `Lokasi = ${destinasi.lokasi}`;

                if (!!destinasi.harga) {
                    hargaCard.innerHTML = `Info Harga/Tiket: ${destinasi.harga}`;
                }

                if (!!destinasi.link_resmi) {
                    linkResmiCard.innerHTML = `Link Resmi <a href="${destinasi.link_resmi}">${$destination.nama}</a>`;
                }

                $('#modal-info-destinasi').modal('show');
            }
        }
    </script>

    <script>
        $('#beranda').addClass('this');
    </script>
@endpush