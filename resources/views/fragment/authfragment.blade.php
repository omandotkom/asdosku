
@section('hero')
<section id="hero">
    <div class="hero-container">
      <img src="{{ asset('asset/img/big-logo.png') }}" class="w-50 h-auto text-center mb-2 animated jackInTheBox slow" alt="Responsive image">
      <h2 class="animated fadeInDown slow">Siap menjadi bagian hidupmu (warga kampus)</h2>
      <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
        <button type="button" onclick='gotoLogin();' class="btn btn-outline-primary btn-lg rounded">Login</button>
        <button type="button" onclick='gotoRegister();' class="btn btn-outline-warning ml-5 btn-lg rounded">Daftar</button>
        <script type="text/javascript">
          function gotoRegister() {
            window.location = "{{ url('/register') }}";
          }

          function gotoLogin() {
            window.location = "{{ url('/login') }}";
          }
        </script>
      </div>
    </div>
  </section><!-- #hero -->
@endsection