<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>Asdosku</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="asdosku assiten dosen" name="keywords">
  <meta content="No.1 di Indonesia Untuk Dosen" name="description">

  <!-- Favicons -->
  <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">
  <!-- Favicons -->
  <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('asset/img/favicon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->

  <link href="{{ asset('asset/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <!-- Libraries CSS Files -->
  <link href="{{ asset('asset/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Regna
    Theme URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>


<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left fadeInUp">
        <a href="#hero"><img src="{{ asset('asset/img/logo.png') }}" alt="" title="" /></img></a>
        <p class="text-white">No. 1 di Indonesia Untuk Dosen Tercinta</p>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <div class="card mt-5 w-50 animated slideInUp slow">
        <div class="card-body">
          <h5 class="card-title">Pendaftaran Member (Dosen)</h5>
          <form method="POST" name="formregistrasi" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="nama" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="kampus" class="col-md-4 col-form-label text-md-right">{{ __('Kampus') }}</label>

              <div class="col-md-6">
                <input id="kampus" class="form-control @error('kampus') is-invalid @enderror" name="kampus" required>

                @error('kampus')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="wa" class="col-md-4 col-form-label text-md-right">{{ __('WhatsApp') }}</label>

              <div class="col-md-6">
                <input id="wa" type="tel" class="form-control @error('wa') is-invalid @enderror" name="wa" value="{{ old('wa') }}" required>

                @error('wa')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

              <div class="col-md-6">
                <input id="nik" class="form-control @error('nik') is-invalid @enderror" name="nik" required>

                @error('nik')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>



            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Syarat Layanan') }}</label>

              <div class="col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input" onchange="document.getElementById('tombolregistrasi').disabled = !this.checked;" >
                    </div>
                  </div>
                  <a href="{{asset('asset/etik/KODE_ETIK_PERUSAHAAN.pdf')}}" target="_blank" class="badge badge-light">Saya menyetujui SK Layanan Asdosku</a>
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" disabled id="tombolregistrasi" class="btn btn-outline-primary">
                  {{ __('Daftar') }}
                </button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </section><!-- #hero -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('asset/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('asset/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('asset/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('asset/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('asset/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('asset/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('asset/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('asset/lib/superfish/superfish.min.js') }}"></script>


  <!-- Template Main Javascript File -->
  <script src="{{ asset('asset/js/main.js') }}"></script>

</body>

</html>