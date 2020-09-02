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

<body>

<!--==========================
  Header
  ============================-->
  <header id="header" style="background-color: rgba(52, 59, 64, 0.9);">
    <div class="container">

      <div id="logo" class="pull-left fadeInUp">
        <a href="{{route('rumah')}}"><img src="{{ asset('asset/img/logo.png') }}" alt="" title="" /></img></a>
        <p class="text-white">No. 1 di Indonesia Untuk Dosen Tercinta</p>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#services">Layanan</a></li>
          <li><a href="#alur">Cara Pesan</a></li>
          <li><a href="#gallery">Galeri</a></li>
          <li><a href="#contact">Kontak</a></li>
          <li><a href="https://blog.asdosku.com">Blog</a></li>
          <li><a href="https://market.asdosku.com">Market</a></li>
         
           @guest
           <li><button type="button"  onclick='gotoLogin();'  class="btn badge-pill badge-warning btn-sm rounded">Login</button></li>
          <li><button type="button" data-toggle="modal" data-target="#authmodal" class="btn badge-pill badge-warning btn-sm rounded">Daftar</button></li>

          @endguest          
          @auth
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <?php 
                $nama = Auth::user()->name; 
                $nama = explode(" ", $nama);


              ?>


              {{ $nama[0]}} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endauth
         
        </ul>
      </nav><!-- #nav-menu-container -->
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
 
  {{-- end new hero --}}


  

  <main id="main" style="margin-top: 50px;">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about" style="">
      <div class="container">
        <div class="row about-container">

          <div class="content order-lg-1 order-2">
            <h2 class="title text-center text-uppercase">DAFTAR LAYANAN {{$nama_layanan->name}}</h2>
            <div class="wow fadeInUp">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Deskripsi</th>
                      <th scope="col">Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($daftar as $item)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$item->name}}</td>
                      <td>{{$item->keterangan}}</td>
                      <td>Rp. {{ number_format($item->harga) }}</td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>  
            <p class="text-center wow fadeInUp">
              <b>ASDOSKU</b> merupakan platform berupa website dan aplikasi mobile yang membantu dosen, pengelola kampus dan mahasiswa dalam aktivitas Tri Dharma Perguruan Tinggi dan bisnis sehingga dapat meningkat produktifikas dalam belajar, bekerja dan berkarya. <br>Di kelola dan dikembangkan oleh perusahaan bernama <b> CV. Asdosku Bakti Nusantara.</b>
            </p>
           
           
            <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
          </div>

        </div>
    </section><!-- #about -->

 
  </main>
  <a href="https://api.whatsapp.com/send?phone=6285643715830&text=Halo%20Asdosku%20Mau%20Tanya%20Nih." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        CV. Asdosku Bakti Nusantara
        <br>
        &copy; Copyright <strong>ASDOSKU</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
        -->
      </div>
    </div>
  </footer><!-- #footer -->

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