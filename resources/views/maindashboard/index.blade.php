<!DOCTYPE html>
<html lang="id">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicons -->
  <link href="{{ asset('asset/img/site-icon.png') }}" rel="icon">
  <!-- Favicons -->
  <link href="{{ asset('asset/img/site-icon.png') }}" rel="icon">
  <link href="{{ asset('asset/img/site-icon.png') }}" rel="apple-touch-icon">
  <title>@if(isset($title)) {{$title}} @else Asdosku @endif</title>

  <!-- Custom fonts for this template-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <!-- Custom styles for this template-->
  <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
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

  <script>
    axios.get("{{route('sendnotification')}}")
      .then(function(response) {
        // handle success
      })
      .catch(function(error) {
        // handle error

      })
      .then(function() {
        // always executed
      });
  </script>
  @handheld
  <script>
    $(document).ready(function() {
      if ($("#sidebarToggleTop").length) {
        $("#sidebarToggleTop").click();
      }
    });
  </script>
  @endhandheld
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @if (Auth::user()->role == "dosen")
    @include('layouts.dosen.dashboardsidebar')
    @elseif (Auth::user()->role == "operational")
    @include('layouts.operational.dashboardsidebar')
    @elseif (Auth::user()->role == "hrd")
    @include('layouts.hrd.dashboardsidebar')
    @elseif (Auth::user()->role == "asdos")
    @include('layouts.asdos.dashboardsidebar')
    @elseif (Auth::user()->role == "marketing")
    @include('layouts.marketing.dashboardsidebar')
    @endif

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
            <h1 id="judulHalaman" class="h3 mb-0 text-gray-800">{{$title}}</h1>
          </div>
          @if(Auth::user()->role == "operational")
          @switch ($content ?? '')
          @case('pendingpayout')
          @include('layouts.operational.pendingpayoutlist')
          @break
          @case('showbidlist')
          @include('layouts.dosen.transaction.bidlist')
          @break
          @case('viewcomments')
          @include('layouts.asdos.commentrating')
          @break
          @case("finishedpayout")
          @include('layouts.operational.finishedpayoutlist')
          @break
          @case('dosenlist')
          @include('layouts.operational.dosen')
          @break
          @case('bidsapplicants')
          @include('layouts.dosen.applicantlist')
          @break
          @case('viewAsdoswithFilter')
          @include('layouts.dosen.rowasdos')
          @break
          @case('changetransaction')
          @include('layouts.operational.changeorder')
          @break
          @case('pesananasdoslist')
          @include('layouts.operational.pendinglist')
          @break
          @case('berjalanlist')
          @include('layouts.operational.berjalanlist')
          @break
          @case('historisbiaya')
          @include('layouts.operational.costhistory')
          @break
          @default
          @include('layouts.operational.row')
          @break
          @endswitch
          @elseif (Auth::user()->role == "dosen")
          @switch($content ?? '')
          @case('historisbiaya')
          @include('layouts.operational.costhistory')
          @break
          @case('showbidpage')
          @include('layouts.dosen.transaction.bidorder')
          @break
          @case('showbidlist')
          @include('layouts.dosen.transaction.bidlist')
          @break
          @case('bidsapplicants')
          @include('layouts.dosen.applicantlist')
          @break
          @case('servicelist')
          @include('layouts.dosen.semualayanan')
          @break
          @case('viewpayouts')
          @include('layouts.dosen.transaction.payment')
          @break
          @case('payment')
          @include('layouts.dosen.transaction.payment')
          @break
          @case('viewcomments')
          @include('layouts.asdos.commentrating')
          @break
          @case('viewAsdoswithFilter')
          @include('layouts.dosen.rowasdos')
          @break
          @case('order')
          @include('layouts.dosen.transaction.order')
          @break
          @case('orderlist')
          @include('layouts.dosen.transaction.orderlist')
          @break
          @default
          @include('layouts.dosen.row')
          @endswitch
          @elseif (Auth::user()->role == "hrd")
          @switch($content ?? '')
          @case('persetujuanlist')
          @include('layouts.hrd.persetujuan')
          @break
          @default
          @include('layouts.hrd.row')
          @endswitch
          @elseif (Auth::user()->role == "asdos")
          @switch($content ?? '')
          @case('documentprofile')
          @include('layouts.asdos.uploaddocument')
          @break
          @case('servicelist')
          @include('layouts.dosen.semualayanan')
          @break
          @case('bidsapplicants')
          @include('layouts.dosen.applicantlist')
          @break
          @case('showbidlist')
          @include('layouts.dosen.transaction.bidlist')
          @break
          @case('pesananasdoslist')
          @include('layouts.operational.pendinglist')
          @break
          @case('profile')
          @include('layouts.asdos.profile2')
          @break
          @case('berjalanlist')
          @include('layouts.operational.berjalanlist')
          @break
          @case('viewcomments')
          @include('layouts.asdos.commentrating')
          @break
          @case('historisbiaya')
          @include('layouts.operational.costhistory')
          @break
          @default
          @include('layouts.asdos.row')
          @break
          @endswitch
          @elseif (Auth::user()->role == "marketing")
          @switch($content ?? '')
          @case('viewAsdoswithFilter')
          @include('layouts.marketing.rowasdos')
          @break
          @default
          @include('layouts.marketing.row')
          @endswitch
          @endif

          <!-- Content Row -->

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
  @include('layouts.dashboardlogoutmodal')

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