<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('indexoperational')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Operational</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('indexoperational')}}">
            <i class="fas fa-fw fa-dot-circle"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
   
    <!-- Heading -->
    <div class="sidebar-heading">
        Layanan
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('viewpendingtransaction')}}">
            <i class="fas fa-fw fa-dot-circle"></i>
            <span>Pesanan Pending</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('viewpesananberjalan')}}">
            <i class="fas fa-fw fa-dot-circle"></i>
            <span>Pesanan Berjalan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('viewpesananpayout')}}">
            <i class="fas fa-fw fa-dot-circle"></i>
            <span>Sedang Ditagih</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('viewpendingpayout')}}">
            <i class="fas fa-fw fa-dot-circle"></i>
            <span>Konfirmasi Pembayaran</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>