<div class="row">
  
<div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoAsdosView();' class="btn float-right btn-sm btn-light">
          Lihat Asdos <span class="badge badge-primary">{{ $asdos }}</span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">
        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-hands-helping fa-7x"></i>
          <p class="h3 mt-2">Lihat Asdos</p>
          <button type="button" onclick='gotoAsdosView();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>


  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoDosenView();' class="btn float-right btn-sm btn-light">
          Lihat Dosen <span class="badge badge-primary">{{ $dosen }}</span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-user fa-7x"></i>
          <p class="h3 mt-2">Lihat Dosen</p>
          <button type="button" onclick='gotoDosenView();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>
<div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoPendingPesananView();' class="btn float-right btn-sm btn-light">
          Pesanan <span class="badge badge-danger">{{ $pending }}</span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-shopping-cart fa-7x"></i>
          <p class="h3 mt-2">Pesanan Pending</p>
          <button type="button" onclick='gotoPendingPesananView();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>

  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoPesananBerjalanView();' class="btn float-right btn-sm btn-light">
          Pesanan Berjalan <span class="badge badge-primary">{{ $berjalan }}</span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-shopping-cart fa-7x"></i>
          <p class="h3 mt-2">Pesanan Berjalan</p>
          <button type="button" onclick='gotoPesananBerjalanView();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>

  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoPayoutTransaction();' class="btn float-right btn-sm btn-light">
          Sedang Ditagih <span class="badge badge-danger">{{ $payout }}</span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-shopping-cart fa-7x"></i>
          <p class="h3 mt-2">Sedang Ditagih</p>
          <button type="button" onclick='gotoPayoutTransaction();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>
  
  
  
  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoPendingPayoutView();' class="btn float-right btn-sm btn-light">
          Konfirmasi Pembayaran <span class="badge badge-danger">{{ $tagihan }}</span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-shopping-cart fa-7x"></i>
          <p class="h3 mt-2">Konfirmasi Pembayaran</p>
          <button type="button" onclick='gotoPendingPayoutView();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>

  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoFinishedPayout();' class="btn float-right btn-sm btn-light">
          Pembayaran Selesai <span class="badge badge-danger">{{ $finishedpayout }}</span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-shopping-cart fa-7x"></i>
          <p class="h3 mt-2">Pembayaran Selesai</p>
          <button type="button" onclick='gotoFinishedPayout();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>

  <script>
    document.getElementById("judulHalaman").innerHTML = "Beranda";
    function gotoPesananBerjalanView(){
      window.location = "{{route('viewpesananberjalan')}}";
    }
    function gotoPendingPesananView() {
      window.location = "{{ route('viewpendingtransaction') }}";
    }
    function gotoPendingPayoutView(){
      window.location = "{{route('viewpendingpayout')}}";
    }
    function gotoPayoutTransaction(){
      window.location = "{{route('viewpesananpayout')}}";
    }
    function gotoFinishedPayout(){
      window.location = "{{route('viewfinishedpayoutbymonth')}}";
    }
    function gotoDosenView(){
      window.location = "{{route('viewdosen')}}";
    }
    function gotoAsdosView(){
      window.location = "{{route('viewasdos')}}";
    }
  </script>