<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">EasyIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item {{ request()->is('dashboard/acara') || request()->is('dashboard/acara/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.acara.index') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Acara</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Transaksi</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/user') || request()->is('dashboard/user/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.user.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/lokasi') || request()->is('dashboard/lokasi/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.lokasi.index') }}">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>Lokasi</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/kategori') || request()->is('dashboard/kategori/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.kategori.index') }}">
            <i class="fas fa-fw fa-th-large"></i>
            <span>Kategori</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/kampus') || request()->is('dashboard/kampus/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.kampus.index') }}">
            <i class="fas fa-fw fa-university"></i>
            <span>Kampus</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/metode-pembayaran') || request()->is('dashboard/metode-pembayaran/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.metode-pembayaran.index') }}">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Metode Pembayaran</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
