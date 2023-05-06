<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin/index.html">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

{{-- 
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="admin/tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Nav Item - Category -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/utilisateurs') }}">
            <i class="fas fa-thin fa-user"></i>
            <span>Utilisateurs</span></a>
    </li>

    <!-- Nav Item - Category -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/category') }}">
            <i class="fas fa-solid fa-list"></i>
            <span>Catégorie</span></a>
    </li>

    <!-- Nav Item - Réservations -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/reservations') }}">
            <i class="fas fa-thin fa-check"></i>
            <span>Réservations</span></a>
    </li>

    <!-- Nav Item - Réservations -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/reviews') }}">
            <i class="fas fa-thin fa-star"></i>
            <span>Reviews</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>
<!-- End of Sidebar -->