@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pengumuman Seleksi.') }} </div>

                <div class="card-body">
                    <span class="sr-only">Loading...</span>
                    Halo {{ Auth::user()->name }}
                    <br>
                    <div class="row mt-3 text-center">
                        <blockquote class="blockquote mx-auto">
                            <p class="mb-0 p-4">Terimakasih sudah mendaftar :). Mohon maaf, kak {{Auth::user()->name}} belum lolos seleksi rekrutmen Asdosku Batch 3. Terus ikuti perkembangan informasi Asdosku selanjutnya dan tetap semangat ya :). Semoga kak {{Auth::user()->name}} dapat dipertemukan dengan kesempatan yang sama dilain hari.
                    
                            </p>
                            <footer class="blockquote-footer">Tetap Semangat!</footer>
                        </blockquote>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    @endsection