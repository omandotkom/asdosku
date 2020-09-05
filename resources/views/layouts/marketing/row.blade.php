<script>
  function gotoProfileView() {
    window.location = "{{route('profileAsdos')}}";
  }
</script>
<div class="row">

  <div class="col-xl-3 col-lg-5">
    <div class="card shadow mb-4">

      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">
          <i class="fas fa-fw fa-user fa-7x"></i>
          <p class="h3 mt-2">Lihat Asdos</p>
          <button type="button" data-toggle="modal" data-target="#browseasdos" class="btn btn-outline-primary btn-block btn-lg mt-2">Lihat</button>
        </div>
      </div>

    </div>
  </div>
  @include('layouts.marketing.modals.browseasdos')
</div>
</div>