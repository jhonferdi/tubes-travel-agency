@extends('layouts.base')

@push('styles')
    <link href="{{asset('MilleniumTravelAgency/PaketWisata/paketWisata.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('title')
    Paket Wisata
@endsection

@section('content')
<section id="konten1" class="konten">
    <div class="left">
        <div class="jenis">
            <h1>Honeymoon In Blue Clouds</h1>

            <p>Paket liburan yang cocok dinikmati bersama pasangan, 
                menikmati indahnya Banjarnegara bersama yang terkasih </p>
            <p>Harga : Rp. 1.500.000/ 2 orang <br>
                2 hari 1 malam</p>
        </div>
    </div>
    <div class="right">
        <div class="box-container">
            <div class="img">
                <img src="{{asset('MilleniumTravelAgency/PaketWisata/centralHotel.png')}}" alt="centralHotel">
            </div>
            <div class="deskripsi">
                <div style="display:flex">
                    <div>
                        <a href="#"><h2>Central Hotel</h2></a>
                    </div>
                    <div style="padding-top: 10px; padding-left: 20px;">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="img">
                <img src="{{asset('MilleniumTravelAgency/PaketWisata/sikunir.png')}}" alt="sikunir">
            </div>
            <div class="deskripsi">
                <a href="#"><h2>Bukit Sikunir, Dieng</h2></a>
                <p>Nikmati sunrise Bukit Sikunir dan panorama yang memanjakan mata.</p>
            </div>
        </div>

        <div class="box-container">
            <div class="img">
                <img src="{{asset('MilleniumTravelAgency/PaketWisata/curugMrawu.png')}}" alt="curugMrawu">
            </div>
            <div class="deskripsi">
                <a href="#"><h2>Curug Mrawu</h2></a>
                <p>Air yang menyegarkan dan udara yang sejuk membuat diri menjadi tenang dan rileks.</p>
            </div>
        </div>
    </div>
</section>
<section id="konten2" class="konten genap">
    <div class="left">
        <div class="jenis">
            <h1>Fun Family Vacation</h1>

            <p>Liburan keluarga memang waktu yang dinanti - nanti, jangan lewatkan kesempatan itu.</p>
            <p>Harga : Rp. 2.500.000/ 4 orang <br>
                3 hari 2 malam</p>
        </div>
    </div>
    <div class="right">
        <div class="box-container">
            <div class="img">
                <img src="{{asset('MilleniumTravelAgency/PaketWisata/centralHotel.png')}}" alt="centralHotel">
            </div>
            <div class="deskripsi">
                <div style="display:flex">
                    <div>
                        <a href="#"><h2>Asri Hotel</h2></a>
                    </div>
                    <div style="padding-top: 10px; padding-left: 20px;">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="img">
                <img src="{{asset('MilleniumTravelAgency/PaketWisata/candiArjuna.png')}}" alt="candiArjuna">
            </div>
            <div class="deskripsi">
                <a href="#"><h2>Candi Arjuna</h2></a>
                <p>Objek wisata yang menyenangkan dan mengandung nilai - nilai sejarah.</p>
            </div>
        </div>

        <div class="box-container">
            <div class="img">
                <img src="{{asset('MilleniumTravelAgency/PaketWisata/sungaiSerayu.png')}}" alt="sungaiSerayu">
            </div>
            <div class="deskripsi">
                <a href="#"><h2>Sungai Serayu</h2></a>
                <p>Sungai Serayu terkenal dengan airnya yang bersih dan tempat yang cocok untuk wisata arung jeram.</p>
            </div>
        </div>
    </div>
</section>
<section id="konten3" class="konten">
    <div class="left">
        <div class="jenis">
            <h1>Solo Traveller</h1>

            <p>Menjelajahi Banjarnegara karena keunikannya akan menjadi sebuah pengalaman yang berharga.</p>
            <p>Harga : Rp. 2.500.000/ 1 orang <br>
                3 hari 2 malam</p>
        </div>
    </div>
    <div class="right">
        <div class="box-container">
            <div class="img">
                <img src="{{asset('MilleniumTravelAgency/PaketWisata/hotelBSY.jpg')}}" alt="Hotel BSY">
            </div>
            <div class="deskripsi">
                <div style="display:flex">
                    <div>
                        <a href="#"><h2>Hotel Surya Yudha</h2></a>
                    </div>
                    <div style="padding-top: 10px; padding-left: 20px;">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="img">
                <img src="{{asset('MilleniumTravelAgency/PaketWisata/bukitSkuter.jpg')}}" alt="bukitSkuter">
            </div>
            <div class="deskripsi">
                <a href="#"><h2>Bukit Skuter, Dieng</h2></a>
                <p>Bersantai di pagi hari atau menjelang sunset akan merilekskan pikiran.</p>
            </div>
        </div>

        <div class="box-container">
            <div class="img">
                <img src="{{asset('MilleniumTravelAgency/PaketWisata/curugPitu.jpg')}}" alt="curugPitu">
            </div>
            <div class="deskripsi">
                <a href="#"><h2>Curug Pitu</h2></a>
                <p>Akan terasa sangat menyegarkan bermain air di dekat air terjun.</p>
            </div>
        </div>

        <div class="box-container">
            <div class="img">
                <img src="{{asset('MilleniumTravelAgency/PaketWisata/sikunir.png')}}" alt="sikunir">
            </div>
            <div class="deskripsi">
                <a href="#"><h2>Bukit Sikunir, Dieng</h2></a>
                <p>Nikmati sunrise Bukit Sikunir dan panorama yang memanjakan mata.</p>
            </div>
        </div>
    </div>
</section>
<section id="konten4" class="konten genap">
    <div class="left">
        <h1 style="color:white;padding-top: 100px;">Trip Menyenangkan Bersama Kami!</h1>
    </div>
    <div class="right">
        <form method="POST" id="paketWisataForm" action="{{route('booking.payment')}}" style="background-color:white;height: 500px; width: 400px;border-radius: 30px; text-align: left;padding: 10px;opacity: 0.7;">
            @csrf
            @method('POST')
            <h1 style="text-decoration: 1px underline; font-size: 20px; padding-left: 10px; padding-right: 10px; padding-top: 10px; text-align: center;">Form Pemesanan Paket Wisata</h1>
            <label>
                Nama Lengkap <br>
                <input type="text" placeholder="Masukan nama lengkap Anda!" value="{{(Auth::check()) ? $name = Auth::user()->username : ''}}" style="width:350px" required name="nama">
            </label>
            <br>
            <label>
                Tanggal perjalanan <br>
                <input type="date" style="width:350px" min="{{date('Y-m-d')}}" required name="tglperjalanan">
            </label>
            <br>
            <label>
                Pilih Paket Wisata <br>
                <select name="paketwisata" id="paketwisata" form="paketWisataForm" style="width: 350px;" required>
                    <option value="Honeymoon In Blue Clouds">Honeymoon In Blue Clouds</option>
                    <option value="Fun Family Vacation">Fun Family Vacation</option>
                    <option value="Solo Traveller">Solo Traveller</option>
                </select>
            </label>
            <label>
                Pilih Metode Pembayaran<br>
                <select name="metodePembayaran" id="metodePembayaran" form="paketWisataForm" style="width: 350px;" required>
                    <option value="OVO">OVO</option>
                    <option value="Dana">Dana</option>
                    <option value="GOPAY">Gopay</option>
                    <option value="LinkAja">LinkAja</option>
                </select>
            </label>
            <button type="submit" style="margin-top: 10px; margin-left: 220px; background-color: rgba(238,231,218,255);cursor: pointer;border-radius: 10px;">Pesan Sekarang</button>
            <p style="text-align: center; margin-top: 50px; height: 20px;font-size: 12px; margin-bottom: 0px;">Belum login?</p>
            <p style="text-align: center;font-size: 12px; height: 20px; margin-bottom: 0;"><a style="text-decoration: underline; color: royalblue;" href="{{route('login')}}">Login</a> atau <a style="text-decoration: underline;color: royalblue;" href="{{route('register')}}">Daftar</a></p>
            <p style="text-align: center; color: orange;margin-top: 10px;">Millennium Travel Agency</p>
        </form>
        
    </div>
</section>
@endsection

@push('scripts')
    <script src="{{asset('MilleniumTravelAgency/PaketWisata/paketWisata.js')}}"></script>

    <script>
        $('#paket').addClass('this');
    </script>
@endpush