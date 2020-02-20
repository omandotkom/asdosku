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
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, Anda harus melakukan verifikasi email <b>{{$user->email}}</b> dengan melakukan klik tombol di bawah. Jika anda tidak menemukan email dari Asdoksu di kotak masuk mohon periksa di folder spam.') }}
                    <div class="text-center">
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn mt-5 btn-primary">{{ __('Verifikasi Email Sekarang') }}</button>.
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
