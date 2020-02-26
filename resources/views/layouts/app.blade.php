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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                        text: response.data,
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: 'center', // `left`, `center` or `right`
                        backgroundColor: "linear-gradient(to right, #56ab2f, #a8e063)",

                    }).showToast();
                    $('#newjurusanmodal').modal('hide')
                    setTimeout(function() {
                        location.reload(true);
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">

                        </li>
                        @endif
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