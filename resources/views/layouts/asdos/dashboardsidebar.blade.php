<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('indexasdos')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ASDOS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('indexasdos')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
  
<li class="nav-item">
        <a class="nav-link" href="{{route('profileAsdos')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('viewcommentratingbyuser',Auth::user()->id)}}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Rating & Komentar</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('viewpesananasdosbystatus','Berjalan')}}">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Asistensi Berjalan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('viewpesananasdosbystatus','Selesai')}}">
            <i class="fas fa-fw fa-money-bill-alt"></i>
            <span>Asistensi Selesai</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>