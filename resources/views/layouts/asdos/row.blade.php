<script>
  function gotoProfileView() {
    window.location = "{{route('profileAsdos')}}";
  }

  function gotoPesananBerjalan() {
    window.location = "{{route('viewpesananasdosbystatus','Berjalan')}}";
  }

  function gotoPesananSelesai() {
    window.location = "{{route('viewpesananasdosbystatus','Selesai')}}";
  }
</script>
<div class="row">

  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-user fa-7x"></i>
          <p class="h3 mt-2">Profile</p>
          <button type="button" onclick='gotoProfileView();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>
  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoPesananBerjalan();' class="btn float-right btn-sm btn-light">
          Asistensi Berjalan <span class="badge badge-primary">{{ $berjalan }}</span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-shopping-cart fa-7x"></i>
          <p class="h3 mt-2">Asistensi Berjalan</p>
          <button type="button" onclick='gotoPesananBerjalan();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>
  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoPesananSelesai();' class="btn float-right btn-sm btn-light">
          Asistensi Selesai <span class="badge badge-primary">{{ $selesai }}</span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-shopping-cart fa-7x"></i>
          <p class="h3 mt-2">Asistensi Selesai</p>
          <button type="button" onclick='gotoPesananBerjalan();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>
</div>
</div>