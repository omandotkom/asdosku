<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@if(empty($prefer))
<script type="text/javascript">
  Toastify({
    backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",
    text: "Pilih satu atau beberapa kegiatan.",

    duration: 10000

  }).showToast();
</script>
@endif
@php
  $path = basename($imageurl);
  $picname = basename($path, ".png");
@endphp
@if($picname == "default")
<script type="text/javascript">
  Toastify({
    backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",
    text: "Anda belum mengunggah foto profile.",

    duration: 10000

  }).showToast();
</script>
@endif
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Informasi Layanan</h5>
          <p class="card-text">Pilih satu atau beberapa pekerjaan dibawah dengan mencentang yang kamu inginkan. Hal ini digunakan agar ketika dosen sedang mencari asisten, akunmu ikut ditampilkan.</p>
          @if (session('successprefer'))
          <div class="alert alert-success">
            {{ session('successprefer') }}
          </div>
          @endif
          <form action="{{route('updatePreferAsdos')}}" method="post">
            @csrf

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
                  @php
                  $name = $activity->id."check";

                  @endphp
                  <input type="checkbox" @if(in_array($name,$prefer)) checked @endif name="{{$activity->id}}check" class="form-check-input" value="{{$activity->id}}">{{$activity->name}}
                </label>
              </div>
              @endforeach
              @endforeach
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="btn btn-danger btn-sm">Upload</button>
            </div>

          </form>





        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Foto Profile</h5>
          <div class="text-center">
            @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
            <img src="{{$imageurl}}" class="rounded" alt="...">

            <form class="mt-3" id="profilePic" name="profilePic" method="post" action="{{route('uploadProfileAsdos')}}" enctype="multipart/form-data">
              @csrf
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <div class="form-group mt-3">
                <button class="btn btn-danger btn-sm">Upload</button>
              </div>
            </form>


            <!--<button type="button" class="btn mt-3 btn-success btn-sm btn-block">Unggah Foto</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>