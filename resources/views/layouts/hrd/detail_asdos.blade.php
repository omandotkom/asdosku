<div class="row">
  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">


      <!-- Card Body -->
      
        <div class="card-header">
          <div class="col-12">

            <h3>Detail asdos <b>{{$user->name}}</b></h3>
          </div>
        </div>
        <div class="card-body">
            <ul>
              <li>Nama : {{$user->name}}</li>
              <li>Email : {{$user->email}}</li>
              <li>No Telpon : {{$user->wa}}</li>
              <li>kampus : {{$user->kampus}}</li>
              <li>jurusan : {{$user->jurusan}}</li>
              <li>domisili : {{$user->domisili}}</li>
              <li>Gender : {{$user->gender}}</li>
              <li>Semester : {{$user->semester}}</li>
              <li>Alamat : {{$user->alamat}}</li>
              <li>Alamat : {{$user->alamat}}</li>
            </ul>
            <div col-5>
              <img src="{{asset('storage/images/300/'.$user->image_name)}}">
            </div>
            <ul class="mt-4">
              <li><a href="{{asset('storage/'.$user->cv_path)}}" class="badge badge-primary">Lihat CV</a> </li>
              <li><a href="{{asset('storage/'.$user->another_file_path)}}" class="badge badge-primary">Lihat Nilai</a></li>
              <li><a href="{{asset('storage/'.$user->identity)}}" class="badge badge-primary">Lihat Dokumen Identitas</a> </li>
              <li><a href="{{asset('storage/'.$user->ktm)}}" class="badge badge-primary">Lihat KTM</a></li>

            </ul>

        </div>
    

    </div>
  </div>
