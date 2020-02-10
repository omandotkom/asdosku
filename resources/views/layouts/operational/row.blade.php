<div class="row">
  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoPersetujuanView();' class="btn float-right btn-sm btn-light">
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

  <script>
document.getElementById("judulHalaman").innerHTML = "Beranda";
    function gotoPendingPesananView() {
      window.location = "{{ route('viewpendingtransaction') }}";
    }
  </script>