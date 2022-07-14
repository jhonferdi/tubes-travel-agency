<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('MilleniumTravelAgency/SignUp/daftar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>MILLENNIUM TRAVEl AGEN</title>    
  </head>
  <body>
        <section id="navigasi">
        <nav>
            <div class="left-nav">
                <a href="/"><img src="{{asset('MilleniumTravelAgency/SignUp/Millennium.png')}}" alt=""></a>
            </div>
            <div class="right-nav">
                <h3>Daftar</h1>
            </div>
        </nav>
      </section>

      <div class="konten mb-5">
        <form action="/register" method="POST">
            @csrf
            @method('POST')
            <h3>Daftar Akun</h3>
            <p> Username </p>
            <input type="text" placeholder="Masukan username" name="username" required>
            <br>
            @error('username')
                <div class="alert alert-danger my-2" role="alert">
                    {{$message}}
                </div>
            @enderror
            <p>Email</p>
            <input type="email" placeholder="Masukan email anda!" name="email" required>
            <br>
            @error('email')
                <div class="alert alert-danger my-2" role="alert">
                    {{$message}}
                </div>
            @enderror
            <p>Password</p>
            <input type="password" placeholder="Masukan password anda" name="password" required>
            <br>
            <p>Confirm Password</p>
            <input type="password" placeholder="Masukan kembali password anda" name="password_confirmation" required>
            <br>
            @error('password')
                <div class="alert alert-danger my-2" role="alert">
                    {{$message}}
                </div>
            @enderror
            <div style="text-align: right;">
                <input type="submit" style="margin-top: 20px;width: auto;background-color: brown;color: white; border: transparent;">
            </div>
            <div style="margin-top: 50px;text-align: center;">
                <p>Sudah punya akun? <a href="{{route('login')}}">Login</a></p>
            </div>
            <div style="margin-top: 50px;text-align: center;">
                <p style="color: brown;">Millennium Travel Agency</p>
            </div>
        </form>
    </div>

    @include('layouts.part.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('MilleniumTravelAgency/SignUp/daftar.js')}}"></script>
  </body>
</html>