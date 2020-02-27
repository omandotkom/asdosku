@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card animated slideInLeft slow">
                <div class="card-header">{{ __('Register Dosen / Pengelola') }}</div>

                <div class="card-body">
                <form method="POST" name="formregistrasi" action="{{ route('register') }}">
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
              <label for="kampus" class="col-md-4 col-form-label text-md-right">{{ __('Kampus') }}</label>

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
                <input id="wa" type="tel" class="form-control @error('wa') is-invalid @enderror" name="wa" value="{{ old('wa') }}" required>

                @error('wa')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK / NIDN') }}</label>

              <div class="col-md-6">
                <input id="nik" class="form-control @error('nik') is-invalid @enderror" name="nik" required>

                @error('nik')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
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



            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Syarat Layanan') }}</label>

              <div class="col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input" onchange="document.getElementById('tombolregistrasi').disabled = !this.checked;">
                    </div>
                  </div>
                  <a href="{{asset('asset/etik/KODE_ETIK_PERUSAHAAN.pdf')}}" target="_blank" class="badge badge-light">Saya menyetujui SK Layanan Asdosku</a>
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" disabled id="tombolregistrasi" class="btn btn-outline-primary">
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