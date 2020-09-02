@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if(!@isset($message))

                    <form method="POST" action="{{ route('resetpasssend') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Kirim Link Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Berhasil!</h4>
                        <p>Halo {{$user->name}}, email berisi link ubah password telah berhasil di kirim ke alamat email <strong>{{$user->email}}</strong> dengan subjek <strong>Reset Pasword | Asdosku</strong>.</p>
                        <hr>
                        <p class="mb-0">Mohon untuk menunggu beberapa saat (terkadang butuh beberapa menit) sampai email masuk. Jika sudah sampai 20 menit belum ada email, mohon periksa tab spam ya.</p>
                        <br>Mengalami masalah ? <a target="_blank" href="https://api.whatsapp.com/send?phone=6287719357776&text=Saya%20mengalami%20kendala%20lupa%20password">Minta Bantuan</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection