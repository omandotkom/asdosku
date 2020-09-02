<div class="row">
  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">


      <!-- Card Body -->
      
        <div class="card-header">
          <div class="col-12">

            <h3>Detail asdos <b>{{$user->name ?? ''}}</b></h3>
          </div>
        </div>
        <div class="card-body">
            <ul>
              <li>Nama : {{$user->name ?? ''}}</li>
              <li>Email : {{$user->email ?? ''}}</li>
              <li>No Telpon : {{$detail->wa ?? ''}}</li>
              <li>kampus : {{$kampus->name ?? ''}}</li>
              <li>jurusan : {{$jurusan->name ?? ''}}</li>
              <li>domisili : {{$detail->domisili ?? ''}}</li>
              <li>Gender : {{$detail->gender ?? ''}}</li>
              <li>Semester : {{$detail->semester ?? ''}}</li>
              <li>Alamat : {{$detail->alamat ?? ''}}</li>
            </ul>
            <div col-5>
              @isset($data->image_name)
              <img src="{{asset('storage/images/300/'.$data->image_name) }}">
              @endisset
            </div>
            <ul class="mt-4">
              @isset($data->cv_path)
              <li><a href="{{asset('storage/'.$data->cv_path) }}" class="badge badge-primary">Lihat CV</a> </li>
              @endisset
              @isset($data->another_file_path)
              <li><a href="{{asset('storage/'.$data->another_file_path) }}" class="badge badge-primary">Lihat Nilai</a></li>
              @endisset
              @isset($data->identity)
              <li><a href="{{asset('storage/'.$data->identity) }}" class="badge badge-primary">Lihat Dokumen Identitas</a> </li>
              @endisset
              @isset($data->ktm)
              <li><a href="{{asset('storage/'.$data->ktm) }}" class="badge badge-primary">Lihat KTM</a></li>
              @endisset

            </ul>

        </div>
    

    </div>
  </div>
