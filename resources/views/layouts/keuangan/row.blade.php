<div class="row">



  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoPengeluaran();' class="btn float-right btn-sm btn-light">
          Pengeluaran Team Asdosku <span class="badge badge-danger"></span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-shopping-cart fa-7x"></i>
          <p class="h3 mt-2">Pengeluaran</p>
          <button type="button" onclick='gotoPengeluaran();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>


  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <div class="card-header" id="persetujuan">
        <button type="button" onclick='gotoExternalIncome();' class="btn float-right btn-sm btn-light">
          Pemasukan Eksternal <span class="badge badge-danger"></span>
        </button>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-plus fa-7x"></i>
          <p class="h3 mt-2">Pemasukan Eksternal</p>
          <button type="button" onclick='gotoExternalIncome();' class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>



  <script>
    function gotoPengeluaran() {
      window.location = "{{route('spend.index')}}";
    }
    function gotoExternalIncome(){
      window.location = "{{route('externalincome.index')}}";
    }
  </script>