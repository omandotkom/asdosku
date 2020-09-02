@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> {{ __('Unggah Beberapa Dokumen yang dibutuhkan.') }} </div>

                <div class="card-body">
                    Halo {{ Auth::user()->name }}! :), bantu kami lebih mengenali kamu dengan unggah beberapa dokumen berikut ya.
                    <br>
                    <form method="post" action="{{route('savearchive')}}" class="mt-3">
                        @csrf
                        <div class="form-group row">
                            <label for="nilai" class="col-md-4 col-form-label text-md-left">{{ __(' Nilai') }}</label>
                            <div>
                                <input id="nilai" aria-describedby="nilaihelp" type="file" class="form-control @error('nilai') is-invalid @enderror" name="nilai"  required>
                                <small id="nilaihelp" class="form-text text-muted text-left">
                                    File wajib berformat pdf
                                </small>
                                @error('nilai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cv" class="col-md-4 col-form-label text-md-left">{{ __(' CV') }}</label>
                            <div>
                                <input id="cv" aria-describedby="cvhelp" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" required>
                                <small id="cvhelp" class="form-text text-muted text-left">
                                    File wajib berformat pdf </small>
                                @error('cv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pengenal" class="col-md-4 col-form-label text-md-left">{{ __(' Pengenal') }}</label>
                            <div>
                                <input id="pengenal" aria-describedby="pengenalhelp" type="file" class="form-control @error('pengenal') is-invalid @enderror" name="pengenal" value="{{ old('pengenal') }}" required>
                                <small id="pengenalhelp" class="form-text text-muted text-left">
                                    File wajib berformat pdf
                                </small>
                                @error('pengenal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ktm" class="col-md-4 col-form-label text-md-left">{{ __(' KTM') }}</label>
                            <div>
                                <input id="ktm" aria-describedby="ktmhelp" type="file" class="form-control @error('ktm') is-invalid @enderror" name="ktm" value="{{ old('ktm') }}" required>
                                <small id="ktmhelp" class="form-text text-muted text-left">
                                    File wajib berformat pdf
                                </small>
                                @error('ktm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn mx-auto btn-outline-primary">Unggah</button>
                        </div>

                    </form>
                    <div class="text-center">
                        Bingung ?</div>

                    <div class="text-center">
                        <a href="https://wa.me/6287719357776" target="_blank"><button type="submit" class="btn mt-2 btn-sm btn-success">Tanya Admin (WhatsApp)</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection