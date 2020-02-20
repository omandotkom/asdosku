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
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="hero">Tentang</a></li>
          <li><a href="#event">Event</a></li>
          <li><a href="#rekrutment">Rekrutment</a></li>
          <li><a href="#kontak">Kontak</a></li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <img src="{{ asset('asset/img/big-logo.png') }}" class="w-50 h-auto text-center mb-2 animated jackInTheBox slow" alt="Responsive image">
      <h2 class="animated fadeInDown slow">Siap menjadi bagian hidupmu (warga kampus)</h2>
      <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Pendaftaran Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <button type="button" onclick='gotoRegisterDosen();' class="btn btn-primary btn-lg btn-block">Daftar Sebagai Dosen</button>
                <button type="button" onclick='gotoRegisterAsdos();' class="btn btn-primary btn-lg btn-block">Daftar Sebagai Asdos</button>
              </div>
              <div class="modal-footer">

              </div>
            </div>
          </div>
        </div>
        <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-outline-warning btn-lg rounded">Daftar</button>
        <button type="button" onclick='gotoLogin();' class="btn btn-outline-primary ml-5 btn-lg rounded">Masuk</button>

        <script type="text/javascript">
          function gotoRegisterDosen() {
            window.location = "{{ url('/register') }}";
          }
          function gotoRegisterAsdos(){
            window.location = "{{ url('/registerasdos') }}";
          }
          function gotoLogin() {
            window.location = "{{ url('/login') }}";
          }
        </script>
      </div>

    </div>
  </section><!-- #hero -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row about-container">

          <div class="content order-lg-1 order-2">
            <h2 class="title text-center">APA ITU ASDOSKU ?</h2>
            <p class="text-center wow fadeInUp">
              <b>ASDOSKU</b> merupakan platform yang membantu dosen menemukan asisten sesuai kriteria dan kebutuhan, serta membantu mahasiswa menemukan kebutuhannya. Kami ingin menghadirkan solusi untuk para dosen dalam menyelesaikan tugas-tigas kampus, penelitian, pengabdian, bisnis dan bantuan lainnya yang diperlukan. Selain itu, kami membantu pengelola kampus untuk menemukan SDM yang berasal dari mahasiswa untuk kebutuhan magang dan event tertentu.
            </p>
            <p class="text-center wow fadeInUp">Demi kenyamanan & kemudahan bagi dosen & pejabat kampus yang akan memakai layanan asdosku diharuskan <b>mendaftar terlebih dahulu sebagai pengguna </b>. Sedangkan bagi mahasiswa yang ingin berkontribusi untuk pendidikan tinggi di Indonesia dapat <b>mendaftarkan diri sebagai Asdos</b>.
            </p>
          
            <h2 class="title text-center">Mengapa menggunakan ASDOSKU ?</h2>

            <div class="icon-box wow fadeInRight">
              <div class="icon"><i class="fa fa-shopping-bag"></i></div>
              <h4 class="title"><a href="">Harga Hemat dan Bergaransi</a></h4>
              <p class="description">Kami siap menyesuaikan budget yang dimiliki untuk mengerjakan tugas bapak/ibu dosen serta memberikan jaminan cashback jika tugas tidak selesai atau tidak sesuai harapan.</p>
             </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-photo"></i></div>
              <h4 class="title"><a href="">Fleksibel</a></h4>
              <p class="description">Waktu dan tempat mengikuti keubutuhan dan rencana bapak/ibu.</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
              <h4 class="title"><a href="">Nyaman</a></h4>
              <p class="description">Dosen bisa memilih asdos sesuai dengan kebutuhan dan kriteria yang bapak/ibu inginkan sehingga akan memberikan kenyamanan dalam memberikan bantuan.</p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
        </div>

      </div>
    </section><!-- #about -->
    
    <!--==========================
      Facts Section
    ============================-->
    {{-- <section id="facts">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Facts</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">232</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">521</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,463</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">15</span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>
    </section><!-- #facts --> --}}

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Layanan ASDOSKU</h3>
          <p class="section-description">Kami menawarkan beberapa layanan untuk Ibu dan Bapak Dosenyang praktis, hemat dan nyaman</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-desktop"></i></a></div>
              <h4 class="title"><a href="">Asisten Bimbel</a></h4>
              <p class="description">Layanan yang menyediakan tutor baik privat ataupun grup untuk bimbingan belajar SD/SMP/SMA</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-bar-chart"></i></a></div>
              <h4 class="title"><a href="">Asisten Mata Kuliah</a></h4>
              <p class="description">Layanan menjadi asisten dosen dalam membantu dosen di mata kuliah tertentu</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-paper-plane"></i></a></div>
              <h4 class="title"><a href="">Asisten Penelitian</a></h4>
              <p class="description">Layanan untuk membantu melakukan survey/mencari data untuk penelitian</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-bar-chart"></i></a></div>
              <h4 class="title"><a href="">Asisten Proyek</a></h4>
              <p class="description">Layanan yang membantu dosen dalam pembuatan laporan keuangan bisnis, LPJ, SPT, dsb</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-photo"></i></a></div>
              <h4 class="title"><a href="">Asisten Pengabdian</a></h4>
              <p class="description">Layanan yang membantu kegiatan seperti pengabdian masyarakat, internship, dsb</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-road"></i></a></div>
              <h4 class="title"><a href="">Asisten Karya</a></h4>
              <p class="description">Layanan untuk membantu input dan / repost data, reviu jurnal, transliterasi, dsb</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-shopping-bag"></i></a></div>
              <h4 class="title"><a href="">Asisten Desainer</a></h4>
              <p class="description">Layanan untuk membantu membuat desain pamflet, banner, kartu nama, dsb</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-road"></i></a></div>
              <h4 class="title"><a href="">Asisten Praktikum</a></h4>
              <p class="description">Layanan menjadi asisten praktikum dalam membantu dosen pada mata kuliah praktikum tertentu</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Testimoni</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          {{-- <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div> --}}
        </div>

      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Portfolio Section
    ============================-->
    {{-- <section id="portfolio">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Portfolio</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row">

          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter=".filter-app, .filter-card, .filter-logo, .filter-web" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-logo">Logo</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row" id="portfolio-wrapper">
          <div class="col-lg-3 col-md-6 portfolio-item filter-app">
            <a href="">
              <img src="img/portfolio/app1.jpg" alt="">
              <div class="details">
                <h4>App 1</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-web">
            <a href="">
              <img src="img/portfolio/web2.jpg" alt="">
              <div class="details">
                <h4>Web 2</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-app">
            <a href="">
              <img src="img/portfolio/app3.jpg" alt="">
              <div class="details">
                <h4>App 3</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-card">
            <a href="">
              <img src="img/portfolio/card1.jpg" alt="">
              <div class="details">
                <h4>Card 1</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-card">
            <a href="">
              <img src="img/portfolio/card2.jpg" alt="">
              <div class="details">
                <h4>Card 2</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-web">
            <a href="">
              <img src="img/portfolio/web3.jpg" alt="">
              <div class="details">
                <h4>Web 3</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-card">
            <a href="">
              <img src="img/portfolio/card3.jpg" alt="">
              <div class="details">
                <h4>Card 3</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-app">
            <a href="">
              <img src="img/portfolio/app2.jpg" alt="">
              <div class="details">
                <h4>App 2</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
            <a href="">
              <img src="img/portfolio/logo1.jpg" alt="">
              <div class="details">
                <h4>Logo 1</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
            <a href="">
              <img src="img/portfolio/logo3.jpg" alt="">
              <div class="details">
                <h4>Logo 3</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-web">
            <a href="">
              <img src="img/portfolio/web1.jpg" alt="">
              <div class="details">
                <h4>Web 1</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
            <a href="">
              <img src="img/portfolio/logo2.jpg" alt="">
              <div class="details">
                <h4>Logo 2</h4>
                <span>Alored dono par</span>
              </div>
            </a>
          </div>

        </div>

      </div>
    </section><!-- #portfolio --> --}}

    <!--==========================
      Team Section
    ============================-->
    {{-- <section id="team">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Team</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-1.jpg" alt=""></div>
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-2.jpg" alt=""></div>
              <h4>Sarah Jhinson</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-3.jpg" alt=""></div>
              <h4>William Anderson</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-4.jpg" alt=""></div>
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #team --> --}}

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Kontak</h3>
          <p class="section-description">Untuk Pelayanan yang lebih friendly kami juga siap menerima pertanyaan, keluhan dan curhatan melalui kontak kami
          </p>
        </div>
      </div>

      <!-- Uncomment below if you wan to use dynamic maps -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.5583905937965!2d109.24486981433112!3d-7.40327519465839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f531de7b945%3A0x71d438121dd2a8e4!2sLab%20Terpadu%20FEB%20Unsoed!5e0!3m2!1sid!2sid!4v1582127993938!5m2!1sid!2sid" width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen></iframe>

      <div class="container wow fadeInUp mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>Innovation Center, Lab. Terpadu lt. 5 FEB, UNSOED<br>Purwokerto</p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                <p>cs@asdosku.com </p>
              </div>

              <div>
                <a href="https://www.instagram.com/asdosku_com/?hl=id">
                <i class="fa fa-instagram"></i></a>
                <p>@asdosku_com </p>
              </div>

              {{-- <div>
                <i class="fa fa-phone"></i>
                <p>+1 5589 55488 55s</p>
              </div> --}}
            </div> 

            {{-- <div class="social-links"> --}}
              {{-- <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> --}}
              {{-- <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> --}}
              {{-- <a href="#" class="instagram"><i class="fa fa-instagram"></i></a> --}}
              {{-- <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> --}}
            {{-- </div>  --}}

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Pesanmu berhasil dikirim. Terimakasih!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Masukkan nama anda dengan benar" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Masukkan email yang valid" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" data-rule="minlen:4" data-msg="Masukkan setidaknya 8 huruf" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Tulis sesuatu untuk kami" placeholder="Pesan"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Kirim</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

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
        &copy; Copyright <strong>ASDOSKU</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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


  <!-- Template Main Javascript File -->
  <script src="{{ asset('asset/js/main.js') }}"></script>

</body>

</html>