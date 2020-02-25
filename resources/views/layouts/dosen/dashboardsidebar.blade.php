<script>
    $(document).ready(function() {

        axios.post('{{route("basicnotification")}}', {
                id: '{{Auth::user()->id}}',
                type: 'tagihan'
            })
            .then(function(response) {
                if (response.data > 0) {
                    document.getElementById("tagihancount").innerHTML = response.data;
                } else {
                    var element = document.getElementById("tagihancount");
                    element.parentNode.removeChild(element);
                }

            })
        .catch(function(error) {});


    });
</script>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dosen</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="{{route('viewservices')}}">
            <i class="fas fa-fw fa-hand-holding"></i>
            <span>Layanan Kami</span></a>
    </li>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('indexdosen')}}">
            <i class="fas fa-fw fa-cart-plus"></i>
            <span>Order Layanan</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{route('showUserOrder')}}">
            <i class="fas fa-fw fa-shopping-bag"></i>
            <span>Pesanan Saya</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <!-- Heading -->
    <div class="sidebar-heading">
        Pembayaran
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('showallpayout')}}">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Tagihan <span id="tagihancount" class="badge badge-danger"></span></span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>