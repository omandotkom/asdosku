<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.dashboardsidebar')
    <!--Sidebar ada di sini -->

    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layouts.dashboardtopbar')
        <!--top bar ada di sini -->
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Layanan</h1>
          </div>

          <!-- Content Row -->

          <div class="row">
            <div class="col-xl-3 col-lg-5">
              <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">

                  <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-chalkboard fa-7x"></i>
                    <p class="h3 mt-2">Asisten Bimbel</p>
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2">Cari</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-5">
              <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">

                  <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-chalkboard-teacher fa-7x"></i>
                    <p class="h3 mt-2">Asisten Matakuliah</p>
                    <button type="button" class="btn btn-outline-primary btn-lg btn-block mt-2">Cari</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-5">
              <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">

                  <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-atom fa-7x"></i>
                    <p class="h3 mt-2">Asisten Praktikum</p>
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2">Cari</button>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-lg-5">
              <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">

                  <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-university fa-7x"></i>
                    <p class="h3 mt-2">Asisten Penelitian</p>
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2">Cari</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-xl-3 col-lg-5">
              <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">

                  <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-people-carry fa-7x"></i>
                    <p class="h3 mt-2">Asisten Proyek</p>
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2">Cari</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-5">
              <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">

                  <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-person-booth fa-7x"></i>
                    <p class="h3 mt-2">Asisten Pengabdian</p>
                    <button type="button" class="btn btn-outline-primary btn-lg btn-block mt-2">Cari</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-5">
              <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">

                  <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-pencil-ruler fa-7x"></i>
                    <p class="h3 mt-2">Asisten Karya</p>
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2">Cari</button>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-lg-5">
              <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">

                  <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-ruler fa-7x"></i>
                    <p class="h3 mt-2">Asisten Designer</p>
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2">Cari</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Asdosku 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  @include('layouts.dashboardlogoutmodal');

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('sbadmin/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('sbadmin/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('sbadmin/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>