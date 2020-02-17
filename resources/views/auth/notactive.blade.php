@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa text-center fa-spinner fa-pulse fa-1x fa-fw"></i> {{ __('Akun Anda Menunggu aktivasi.') }} </div>

                <div class="card-body">
                <span class="sr-only">Loading...</span>
                Halo {{ Auth::user()->name }} 
                <br>
                Terimakasih sudah mendaftar :). Saat ini status akun kamu <b>belum aktif</b> dan sedang menunggu aktivasi oleh Asdosku. Silahkan tunggu 2x24 jam yaa, jika dalam waktu 2x24 jam akunmu belum aktif silahkan hubungi admin untuk menanyakan lebih lanjut.  
                <br>
                Sistem akan mengirimkan pemberitahuan ke email Anda <b>({{Auth::user()->email}})</b> apabila akun sudah diaktifasi.
                <div class="text-center">
                <a href="https://wa.me/087719357776" target="_blank"><button type="submit" class="btn mt-5 btn-success">Tanya Admin (WhatsApp)</button>.
                </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
