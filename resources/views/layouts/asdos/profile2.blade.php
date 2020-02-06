<div class="container">

  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Informasi Layanan</h5>
          <p class="card-text">Pilih satu atau beberapa pekerjaan dibawah dengan mencentang yang kamu inginkan. Hal ini digunakan agar ketika dosen sedang mencari asisten, akunmu ikut ditampilkan.</p>

          <div class="container pl-auto">
            @foreach($services as $service)
            <div class="row">
              <div class="font-weight-bold">
                {{$service->name}}
              </div>
            </div>
            @foreach($service->activities as $activity)
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="{{$service->id}}check" class="form-check-input" value="{{$activity->id}}">{{$activity->name}}
              </label>
            </div>
            @endforeach
            @endforeach
          </div>




          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Foto Profile</h5>
          <div class="text-center">
            <img src="https://picsum.photos/200" class="rounded" alt="...">

            <form class="mt-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </form>

            <script>
              // Add the following code if you want the name of the file appear on select
              $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
              });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>