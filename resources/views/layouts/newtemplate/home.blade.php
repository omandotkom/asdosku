<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="{{asset('newtemplate/assets/css/bootstrap.min.css')}}"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('newtemplate/assets/css/style.css')}}" />

    <title>asdosku</title>
  </head>
  <body>
    <!-- Navbar -->
    <header>
      <nav class="navbar navbar-expand-lg px-3 navbar-dark bg-light-blue">
        <div class="container-fluid px-3 py-2">
          <img src="{{asset('newtemplate/assets/images/Logo.png')}}" class="img-fluid logo" alt="" />
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse w-100 justify-content-end"
            id="navbarSupportedContent"
          >
            <div class="mt-2">
              <div>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Tentang</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Asdosku</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Portofolio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Cara Kerja</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/login') }}">Member Area</a>
                  </li>
                  <li class="nav-item mt-1 ms-1">
                    <a class="btn btn-success btn-sm" href="#">Pilih Layanan</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <!-- End Navbar -->

    <!-- Content -->
  @yield('content')
    <!-- End Content -->

    <!-- Including Javascript -->
    <script
      src="{{asset('newtemplate/assets/js/bootstrap.bundle.min.js')}}"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <!-- End -->
  </body>
</html>
