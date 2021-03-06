<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link href="{{ asset('asset/img/site-icon.png') }}" rel="icon">
    <!-- Favicons -->
    <link href="{{ asset('asset/img/site-icon.png') }}" rel="icon">
    <link href="{{ asset('asset/img/site-icon.png') }}" rel="apple-touch-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161935140-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-161935140-1');
    </script>

    <script type="text/javascript">
        function gotoRegisterDosen() {
            window.location = "{{ url('/register') }}";
        }

        function gotoRegisterAsdos() {
            window.location = "{{ url('/registerasdos') }}";
        }

        function gotoRegisterMahasiswa() {
            window.location = "{{ url('/register/mahasiswa') }}";
        }

        function gotoLogin() {
            window.location = "{{ url('/login') }}";
        }
    </script>
    <script>
        axios.get("{{route('sendnotification')}}")
            .then(function(response) {
                // handle success
            })
            .catch(function(error) {
                // handle error

            })
            .then(function() {
                // always executed
            });

        function addnewjurusan() {
            axios.post('{{route("addnewjurusan")}}', {
                    namajurusanbaru: $("#namajurusanbaru").val(),

                })
                .then(function(response) {
                    Toastify({
                        text: response.data.message,
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: 'center', // `left`, `center` or `right`
                        backgroundColor: "linear-gradient(to right, #56ab2f, #a8e063)",

                    }).showToast();
                    $('#newjurusanmodal').modal('hide')
                    setTimeout(function() {
                        //location.reload(true);
                        if ($('#jurusan').length > 0 ){
                            $('#jurusan')
                                    .empty();
                                    for (i = 0; i < response.data.listjurusan.length; i++) {
                                        var optionString = "<option value='".concat(response.data.listjurusan[i]["id"]).concat("'>").concat(response.data.listjurusan[i]["name"]).concat("</option");
                                        
                                        $('#jurusan')
                                         .append(optionString);
                                        }
                                    }
                         
                    }, 2000);
                })
                .catch(function(error) {
                    Toastify({
                        text: "Gagal menambahkan jurusan baru, harap isi kolom jurusan baru.",
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: 'center', // `left`, `center` or `right`
                        backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",

                    }).showToast();
                });
        }
    </script>
</head>

@if(Route::currentRouteName()=="registerasdosshow")
<script>
    $(document).ready(function() {
        $('#disableregis').modal({
            backdrop: 'static',
            keyboard: false,
            show: true,
            focus: true
        });
    });


    function gotoHome() {
        var url = "{{route('rumah')}}";
        window.location = url;
    }
</script>
@endif

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @include('auth.modal.authmodal')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><button type="button" class="btn btn-primary btn-sm">Masuk</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><button type="button" data-toggle="modal" data-target="#authmodal" class="btn btn-primary btn-sm">Daftar</button></a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="modal fade" id="newjurusanmodal" tabindex="-1" role="dialog" aria-labelledby="jurusanmodaltitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="jurusanmodaltitle">Tambahkan Jurusan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>Pastikan jurusan yang akan ditambahkan tidak ada di list jurusan Asdosku sebelumnya.</li>
                            <li>Perhatikan penulisan dalam menulis jurusan, contoh : Desain Komunikasi Visual.</li>
                        </ul>
                        <div class="form-group">
                            <label for="namajurusanbaru">Nama Jurusan</label>
                            <input required type="text" name="namajurusanbaru" class="form-control" id="namajurusanbaru" placeholder="Ilmu Hukum">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" onclick="addnewjurusan();" class="btn btn-success">Tambahkan Jurusan</button>
                    </div>


                </div>
            </div>
        </div>



        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>