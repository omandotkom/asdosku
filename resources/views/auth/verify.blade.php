@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi Alamat Email Anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Email verifikasi berhasil di kirim. Tunggu hingga maksimal 10 menit jika email tidak sampai klik verifikasi kembali.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, Anda harus melakukan verifikasi email dengan melakukan klik tombol di bawah. Jika anda tidak menemukan email dari Asdoksu di kotak masuk mohon periksa di folder spam.') }}
                    <div class="text-center">
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn mt-5 btn-primary">Verifikasi {{Auth::user()->email}} Sekarang</button>.
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
