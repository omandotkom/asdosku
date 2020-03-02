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

                    <p>Sebelum melanjutkan, Anda harus melakukan verifikasi email dengan melakukan klik tombol di bawah. Jika anda tidak menemukan email dari Asdoksu di kotak masuk mohon periksa di folder spam.</p>
                    FAQ
                    <dl class="row">
                        
                        <dt class="col-sm-3 border-top">Mengapa email verifikasi belum masuk ? </dt>
                        <dd class="col-sm-9 border-top">Pengiriman email verifikasi kurang lebih akan sampai dalam waktu paling lama 15 menit. Apabila masih tidak menerima email, klik lagi tombol <b>Verifikasi {{Auth::user()->email}} Sekarang.</b></dd>
                        
                        <dt class="col-sm-3 border-top">Bagaimana mengatasi Error 403 This action is unauthorized ?</dt>
                        <dd class="col-sm-9 border-top">Ini biasanya terjadi jika Anda membuka link verifikasi akun melalui browser bawaan aplikasi Gmail atau melalui browser yang berbeda dengan yang dipakai login. Solusinya adalah copy link verifikasi dan paste di kolom URL browser yang dipakai untuk login.</dd>
                    
                        <dt class="col-sm-3 border-top">Bagaimana alur registrasi akun bagi Dosen / Pengelola Kampus ?</dt>
                        <dd class="col-sm-9 border-top">Pertama, melakukan registrasi di halaman pendaftaran, setelah itu verifikasi email di halaman ini.</dd>
                    
                        <dt class="col-sm-3 border-top">Bagaimana alur registrasi akun bagi Asdos ?</dt>
                        <dd class="col-sm-9 border-top">Pertama, melakukan registrasi di halaman pendaftaran, setelah itu verifikasi email di halaman ini. Jika sudah verifikasi maka akun Anda sedang dalam tahap review oleh HRD Asdosku. Jika sudah disetujui oleh HRD Asdosku maka Anda akan mendapatkan email pemberitahuan. Langkah terakhir adalah mengisi formulir lanjutan tentang asistensi apa saja yang ingin dikerjakan serta melengkapi foto profile.</dd>
                        
                    </dl>
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