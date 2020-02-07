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
                                <select class="form-control" name="kampus" id="kampus">
                                    @foreach($campuses as $campus)
                                        @if($campus->first)
                                            <option selected value="{{$campus->id}}">{{$campus->name}}</option>
                                        @else
                                        <option selected value="{{$campus->id}}">{{$campus->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
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

                                    @foreach($services as $service)
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-check">

                                                    <input class="form-check-input" name="{{$service->id}}check" type="checkbox" value="{{$service->name}}">
                                                    <label class="form-check-label" for="{{$service->id}}check">
                                                        {{$service->name}}
                                                        <small>(
                                                            Pilih :
                                                            @foreach($service->activities as $activity)
                                                            @if (!$loop->last)
                                                            {{$activity->name}},
                                                            @else
                                                            {{$activity->name}}
                                                            @endif
                                                            @endforeach
                                                            )</small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach


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