<!-- Sidebar -->
<ul class="navbar-nav    sidebar sidebar-dark accordion bg-techbot-dark " id="accordionSidebar">

    <!-- Divider -->
@php
    $auth = Auth::user();
@endphp



    <!-- Nav Item - Dashboard -->
    <li class="nav-item active ">
        <a class="nav-link p-3 " href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('Home')}}</span></a>
    </li>
    {{-- *********************************Super Admin**********************************  --}}



    <hr class="sidebar-divider m-1 p-0 ">

@if($auth->role_id == 1)


    <li class="nav-item active ">
        <a class="nav-link p-3 " href="{{ route('admin.users.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('Dashboard')}}</span></a>
    </li>

@endif




    <hr class="sidebar-divider m-1 p-0 ">

@if($auth->role_id == 1 || $auth->role_id == 2)


    <li class="nav-item active ">
        <a class="nav-link p-3 " href="{{ route('admin.printers.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('Printers')}}</span></a>
    </li>

@endif




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center  d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->