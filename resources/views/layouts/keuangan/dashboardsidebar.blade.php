<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('indexoperational')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Keuangan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('indexkeuangan')}}">
            <i class="fas fa-fw fa-dot-circle"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading --><li class="nav-item">
        <a class="nav-link" href="{{route('spend.index')}}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Pengeluaran</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('externalincome.index')}}">
            <i class="fas fa-fw fa-plus"></i>
            <span>Pemasukan</span></a>
    </li>
    
    <!-- Heading -->
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>