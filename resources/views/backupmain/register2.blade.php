@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerasdos') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="nama" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="gender" id="gender">
                                    <option>Pria</option>
                                    <option>Wanita</option>
                                    
                                </select>
                             
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kampus" class="col-md-4 col-form-label text-md-right">{{ __('Asal Kampus') }}</label>

                            <div class="col-md-6">
                                <input id="kampus" class="form-control @error('kampus') is-invalid @enderror" name="kampus" required>

                                @error('kampus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="wa" class="col-md-4 col-form-label text-md-right">{{ __('WhatsApp') }}</label>

                            <div class="col-md-6">
                                <input id="wa" aria-describedby="wahelp" type="tel" class="form-control @error('wa') is-invalid @enderror" name="wa" value="{{ old('wa') }}" required>
                                <small id="wahelp" class="form-text text-muted text-left">
                                    Isi dengan format 0812xxxxxx.
                                </small>
                                @error('wa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="semester" class="col-md-4 col-form-label text-md-right">{{ __('Semester') }}</label>

                            <div class="col-md-6">
                                <input id="semester" aria-describedby="semesterhelp" type="numeric" min="0" class="form-control @error('semester') is-invalid @enderror" name="semester" required>
                                <small id="semesterhelp" class="form-text text-muted text-left">
                                    Isi dengan angka, misal 6.
                                </small>
                                @error('semester')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jurusan" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>

                            <div class="col-md-6">
                                <input id="jurusan" aria-describedby="jurusanhelp" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" required>
                                <small id="jurusanhelp" class="form-text text-muted text-left">
                                    Misal S1 Teknik Informatika
                                </small>
                                @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" name="alamat" required></textarea>
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prefer" class="col-md-4 col-form-label text-md-right">{{ __('Tugas') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#prefermodal" type="button">Pilih</button>
                                    </div>
                                    <input type="text" readonly class="form-control" placeholder="" name="preferensi" aria-label="" required aria-describedby="basic-addon1">
                                    <div class="modal fade" id="prefermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Pilih Preferensi yang Akan Anda Kerjakan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" aria-describedby="checkhelp">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="bimbel">
                                                        <label class="form-check-label" for="bimbel">
                                                            Asisten Bimbel
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="makul">
                                                        <label class="form-check-label" for="makul">
                                                            Asisten Matakuliah
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="praktikum">
                                                        <label class="form-check-label" for="praktikum">
                                                            Asisten Praktikum
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="penelitian">
                                                        <label class="form-check-label" for="penelitian">
                                                            Asisten Penelitian
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="proyek">
                                                        <label class="form-check-label" for="proyek">
                                                            Asisten Proyek
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="pengabdian">
                                                        <label class="form-check-label" for="pengabdian">
                                                            Asisten Pengabdian
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="karya">
                                                        <label class="form-check-label" for="karya">
                                                            Asisten Karya
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="designer">
                                                        <label class="form-check-label" for="designer">
                                                            Asisten Designer
                                                        </label>
                                                    </div>
                                                </div>
                                                <small id="checkhelp" class="form-text text-center text-muted">
                                                    Pilih lebih dari satu.
                                                </small>
                                                <div class="modal-footer"> <button type="button" onclick='savePreference();' class="btn btn-primary" data-dismiss="modal">Simpan</button>
                                                    <script>
                                                        function savePreference() {
                                                            var val = "";
                                                            var isBimbel = true;
                                                            if ($("#bimbel").is(":checked")) {
                                                                val = val.concat("bimbel,");

                                                            }
                                                            if ($("#makul").is(":checked")) {
                                                                val = val.concat("makul,");
                                                            }
                                                            if ($("#praktikum").is(":checked")) {
                                                                val = val.concat("praktikum,");
                                                            }
                                                            if ($("#penelitian").is(":checked")) {
                                                                val = val.concat("penelitian,");
                                                            }
                                                            if ($("#proyek").is(":checked")) {
                                                                val = val.concat("proyek,");
                                                            }
                                                            if ($("#pengabdian").is(":checked")) {
                                                                val = val.concat("pengabdian,");
                                                            }
                                                            if ($("#karya").is(":checked")) {
                                                                val = val.concat("karya,");
                                                            }
                                                            if ($("#designer").is(":checked")) {
                                                                val = val.concat("designer,");
                                                            }
                                                            //show ke textfield

                                                            val = val.slice(0, -1);
                                                            $('input[name=preferensi]').val(val);
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection