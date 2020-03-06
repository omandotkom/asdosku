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
                        {{ __('Email verifikasi berhasil di kirim. Tunggu hingga maksimal 10 menit jika email tidak sampai, klik verifikasi kembali.') }}
                    </div>
                    @endif

                    <p>Sebelum melanjutkan, Anda harus melakukan verifikasi email dengan melakukan klik tombol di bawah. Jika anda tidak menemukan email dari Asdoksu di kotak masuk mohon periksa di folder spam. Mohon untuk sempatkan membaca bagian pertanyaan yang sering ditanyakan di bawah terkait kesalahan.</p>
                    @include('auth.modal.faq')
                    <div class="text-center">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn mt-5 btn-primary">Verifikasi {{Auth::user()->email}} Sekarang</button>.
                        </form>
                    </div>
                    <div class="text-center mt-3">
                        <small>Mengalami masalah verifikasi atau ingin bertanya hal lain ?</small>
                    </div>
                    <div class="text-center">
                        
                        <a href="https://wa.me/6287719357776" target="_blank"><button type="submit" class="btn mt-1 btn-success">Tanya Admin (WhatsApp)</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection