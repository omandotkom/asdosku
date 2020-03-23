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
@endif>
<div class="container">
  <div class="row">

    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title">Foto Profile</h5>
        <div class="text-center">
          @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif
          @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif
          <img src="{{$imageurl}}" class="rounded img-fluid" alt="Foto Pengguna">
          <form class="mt-3" id="profilePic" name="profilePic" method="post" action="{{route('uploadProfileAsdos')}}" enctype="multipart/form-data">
            @csrf

            <div class="row d-flex justify-content-center">
              <div class="form-group">
                <input type="file" name="image" class="form-control-file" id="image">
              </div>
            </div>
        </div>
        <h5 class="card-title">Rekening</h5>
        <div class="w-50">
          <div class="form-group">
            <label for="nama">Atas nama Rekening</label>
            <input required type="text" aria-describedby="namahelp" placeholder="Agus Hendra" class="form-control" id="nama" name="nama" value="@if(isset($bank->nama)) {{$bank->nama}} @endif">
            <small id="namahelp" class="form-text text-muted text-left">
              Isi dengan nama lengkap pemilik akun dengan kapitalisasi yang benar.
            </small>
          </div>
          <div class="form-group">
            <label for="payment">Nama Bank</label>
            <input required type="text" name="payment" value="@if(isset($bank->payment)) {{$bank->payment}} @endif" aria-describedby="paymenthelp" class="form-control" id="payment" placeholder="BCA">
            <small id="paymenthelp" class="form-text text-muted text-left">
              Misal : BCA, BNI, Mandiri, GOPAY, DANA, dsb.
            </small>
          </div>
          <div class="form-group">
            <label for="nomor">Nomor Rekening</label>
            <input required type="text" name="nomor" aria-describedby="nomorhelp" class="form-control" id="nomor" placeholder="89829653123" value="@if(isset($bank->nomor)) {{$bank->nomor}} @endif">
            <small id="nomorhelp" class="form-text text-muted text-left">
              Isi dengan nomor rekening, untuk e-money isi dengan nomor akun.
            </small>
          </div>

          <div class="form-group">
            <label for="accountname">{{ __('Nama') }}</label>

            <input id="accountname" type="text" class="form-control @error('accountname') is-invalid @enderror" name="accountname" value="{{Auth::user()->name}}" required autocomplete="nama" autofocus>

            @error('accountname')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <div class="form-group">
            <label for="kampus">{{ __('Asal Kampus') }}</label>

            <select class="form-control" name="kampus" id="kampus">
              @foreach($campuses as $campus)
              @if($campus->id == Auth::user()->detail->kampus_id)
              <option value="{{$campus->id}}" selected>{{$campus->name}}</option>
              @else
              <option value="{{$campus->id}}">{{$campus->name}}</option>
              @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="wa">{{ __('WhatsApp') }}</label>

            <input id="wa" aria-describedby="wahelp" type="tel" class="form-control @error('wa') is-invalid @enderror" name="wa" value="{{Auth::user()->detail->wa}}" required>
            <small id="wahelp" class="form-text text-muted text-left">
              Isi dengan format 0812xxxxxx.
            </small>
            @error('wa')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <div class="form-group">
            <label for="semester">{{ __('Semester') }}</label>


            <!--<input id="semester" aria-describedby="semesterhelp" type="numeric" min="0" class="form-control @error('semester') is-invalid @enderror" name="semester" required> -->
            <select aria-describedby="semesterhelp" class="form-control" name="semester" id="semester">
              @for ($i = 1; $i < 9; $i++) <option value="DiplomaSemester{{$i}}">Diploma Semester {{$i}}</option>
                @endfor
                @for ($i = 1; $i < 11; $i++) <option value="SarjanaSemester{{$i}}">Sarjana Semester {{$i}}</option>
                  @endfor

                  @for ($i = 1; $i < 7; $i++) <option value="PascasarjanaSemester{{$i}}">Pascasarjana Semester {{$i}}</option>
                    @endfor
                    <option value="Freshgraduate">Freshgraduate</option>
                    <script>
                      $(document).ready(function() {
                        $("#semester").val("{{Auth::user()->detail->semester}}")
                        $("#gender").val("{{Auth::user()->detail->gender}}")
                      });
                    </script>
            </select>

            <small id="semesterhelp" class="form-text text-muted text-left">
              Pilih sesuai posisi semester pendidikan Anda saat ini.
            </small>
            @error('semester')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <div class="form-group">
            <label for="jurusan">{{ __('Jurusan') }}</label>

            <select class="form-control" aria-describedby="jurusanhelp" name="jurusan" id="jurusan">
              @foreach($jurusans as $jurusan)
              @if($jurusan->id == Auth::user()->detail->jurusan_id)
              <option selected value="{{$jurusan->id}}">{{$jurusan->name}}</option>
              @else
              <option value="{{$jurusan->id}}">{{$jurusan->name}}</option>
              @endif
              @endforeach

            </select>
            <small id="jurusanhelp" class="form-text text-muted text-left">
              Apabila jurusan tidak ditemukan, tambahkan dengan menekan tombol +
            </small>
          </div>

          <div class="form-group">
            <label for="alamat">{{ __('Alamat') }}</label>

            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" name="alamat" required>{{Auth::user()->detail->alamat}}</textarea>
            @error('alamat')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>
          <div class="form-group">
            <label for="gender">{{ __('Gender') }}</label>


            <select class="form-control" name="gender" id="gender">
              <option>Pria</option>
              <option>Wanita</option>

            </select>


          </div>

          <div id="cvfrm" class="form-group">
            <label for="cv">CV (wajib berformat pdf)</label>

            <input type="file" name="cv" accept="application/pdf" class="form-control-file" id="cv">

          </div>
          <label for="cvfrm">@if(isset($archive->cv_path)) <a href="{{asset('storage/'.$archive->cv_path)}}" class="badge badge-primary">Lihat CV</a> @else <div class="alert alert-warning" role="alert">
              Anda belum mengunggah CV
            </div> @endif</label>

          <div id="nilaifrm" class="form-group">
            <label for="nilai">Nilai (wajib berformat pdf)</label>

            <input type="file" name="nilai" accept="application/pdf" class="form-control-file" id="nilai">

          </div>
          <label for="cvfrm">@if(isset($archive->another_file_path)) <a href="{{asset('storage/'.$archive->another_file_path)}}" class="badge badge-primary">Lihat Nilai</a> @else <div class="alert alert-warning" role="alert">
              Anda belum mengunggah Nilai
            </div> @endif</label>

        </div>
        <div class="form-group mt-3">
          <button class="btn btn-success btn-sm">Perbarui</button>
        </div>
        </form>

      </div>
    </div>

  </div>
  <div class="row">
    <div class="card w-100">
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
            <button type="submit" class="btn btn-success btn-sm">Perbarui</button>
          </div>

        </form>





      </div>
    </div>

  </div>

</div>
</div>