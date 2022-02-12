<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>Asdosku</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="asdosku assiten dosen" name="keywords">
  <meta content="No.1 di Indonesia Untuk Dosen" name="description">

  <!-- Favicons -->
  <link href="{{ asset('asset/img/site-icon.png') }}" rel="icon">
  <!-- Favicons -->
  <link href="{{ asset('asset/img/site-icon.png') }}" rel="icon">
  <link href="{{ asset('asset/img/site-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
  <link href="{{ asset('asset/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <!-- Libraries CSS Files -->
  <!--<link href="{{ asset('asset/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"> -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Main Stylesheet File -->
  <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161935140-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-161935140-1');
  </script>

  @auth
  <script type="text/javascript">
    function gotoCariAsisten() {
      window.location = "{{ route('indexdosen') }}";
    }
    function gotoPesananSaya(){
      window.location = "{{route('showUserOrder')}}";
    }
    function gotoTagihanSaya(){
      window.location = "{{route('showallpayout')}}";
    }
     function gotoTawarkanProyek(){
      window.location = "{{ route('showbidpage') }}";
    }
  </script>
  @endauth
  @guest
  <script type="text/javascript">
    function gotoRegisterDosen() {
      window.location = "{{ url('/register') }}";
    }

    function gotoRegisterAsdos() {
      window.location = "{{ url('/registerasdos') }}";
    }

    function gotoRegisterMahasiswa() {
      window.location = "{{ url('/register/mahasiswa') }}";
    }

    function gotoLogin() {
      window.location = "{{ url('/login') }}";
    }

  </script>
  @endguest
</head>

<body style="background:#000a24">

<!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left fadeInUp">
        <a href="{{route('rumah')}}"><img src="{{ asset('asset/img/logo.png') }}" alt="" title="" /></img></a>
        <p class="text-white">No. 1 di Indonesia Untuk Dosen Tercinta</p>
      </div>

     
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
 {{--  <section id="hero">
    <div class="hero-container">
       <img src="{{ asset('asset/img/big-logo.png') }}" class="w-50 h-auto text-center mb-2 animated jackInTheBox slow" alt="Responsive image">
      <h2 class="animated fadeInDown slow">Temukan Asisten Terbaik Disini</h2>
      <div class="btn-group-vertical btn-group-lg" role="group" aria-label="Basic example">
        @auth
        <button type="button" data-toggle="modal" onclick="gotoCariAsisten();" class="btn mb-3 btn-outline-warning btn-lg rounded animated fadeInUp slow">Cari Asisten</button>
        <button type="button" data-toggle="modal" onclick="gotoPesananSaya();" class="btn mb-3 btn-outline-warning btn-lg rounded animated fadeInUp slow">Pesanan Saya</button>
        <button type="button" data-toggle="modal" onclick="gotoTagihanSaya();" class="btn mb-3 btn-outline-warning btn-lg rounded animated fadeInUp slow">Tagihan Saya</button>
        <button type="button" data-toggle="modal" onclick="gotoTawarkanProyek();" class="btn mb-3 btn-outline-warning btn-lg rounded animated fadeInUp slow">Tawarkan Proyek</button>
        @endauth
        @guest
        @include('auth.modal.authmodal')
        <button type="button"  onclick='gotoLogin();' class="btn btn-warning btn-lg rounded">Pilih Asisten</button>
        <a href="#services" class="mx-auto mt-1 text-white"><i class="fa fa-arrow-down"></i> Lihat Kategori Asisten</a>
        <div class="mx-auto">
          atau<br>
          <a class="mx-auto btn btn-info mt-1 text-white" href="{{route('registerasdosshow')}}" role="button"><i class="fa fa-user"></i> Daftar Sebagai Asdos</a>
        </div>
        @endguest
      </div>

    </div>
  </section> --}}
  <!-- #hero -->
  {{-- new hero --}}
  <section id="hero">
      <div class="container">
      <div class="row justify-content-center ">
          <div class="col-lg-8 col-md-12 kata-kata">
            <div class="container">
                <center>
            <p class="hero1" style="margin-top:15%">Mohon Maaf Website Sedang Dalam Masa Pengembangan</p>
            <p class="hero2">Jika ada keperluan silahkan hubungi admin melalui WA <br>  <a href="https://api.whatsapp.com/send?phone=6285643715830&text=Halo%20Asdosku%20Mau%20Tanya%20Nih." target="_blank" style="color: white">
                <i class="fa fa-whatsapp my-float"></i> 085643715830</p>
            </a>
        </center>
                
            </div>
          </div>
          
        </div>
        </div>
   
  </section>

  {{-- end new hero --}}


  

  

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
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script>
    function postquestion() {
      axios.post('{{route("guestquestion")}}', {
          name: $("#name").val(),
          email: $("#email").val(),
          subject: $("#subject").val(),
          question: $("#question").val()
        })
        .then(function(response) {
          Toastify({
            text: response.data,
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: 'center', // `left`, `center` or `right`
            backgroundColor: "linear-gradient(to right, #56ab2f, #a8e063)",

          }).showToast();

        })
        .catch(function(error) {
          console.log(error);
          Toastify({
            text: "Gagal mengirim pesan, periksa semua kolom termasuk format email",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: 'center', // `left`, `center` or `right`
            backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",

          }).showToast();
        });
    }
  </script>
 
  <!-- Template Main Javascript File -->
  <script src="{{ asset('asset/js/main.js') }}"></script>

</body>

</html>