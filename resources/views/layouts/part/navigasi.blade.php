<section id="navigasi">
  <nav class="navbar fixed-top navbar-expand-lg navbar-nav-scroll">
    <div class="container-fluid">
      <div class="LOGO">
        <a class="navbar-brand" href="/" style="padding-left: 15%;"><img src="{{asset('MilleniumTravelAgency/Home/Millennium.png')}}" alt="Millennium Agency"></a>
      </div>
      <div style="margin-right: 2%;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
          <ul class="navbar-nav me-2 mb-2 mb-lg-0">
            <li>
              <a class="nav-link borderA" id="beranda" href="/">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link borderA" id="paket" href="{{route('booking.index')}}">Paket Wisata</a>
            </li>
            <li>
              <a class="nav-link borderA" id="blog" href="{{route('blog.alam')}}">Travel Blog</a>
            </li>
            <li>
              <a class="nav-link" id="kontak" href="{{route('kontak.index')}}">Kontak</a>
            </li>
            @if (Auth::check())
                <li class="nav-item">
                  <a href="/profile" id="profil" class="nav-link">{{Auth::user()->username}}</a>
              </li>
            @else
                <li class="nav-item">
                  <a class="nav-link" id="daftar" href="{{route('register')}}" style="font-size: 12px; border-right: 1px solid white; padding-right: 30px;">Daftar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="masuk" href="{{route('login')}}" style="font-size: 12px; margin-left: 0px;">Masuk</a>
                </li>
            @endif
        </div>
      </div>
    </div>
  </nav>
</section>