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
            <span>{{ __('Home') }}</span></a>
    </li>


    {{-- *********************************Super Admin********************************** --}}

    @if ($auth->role_id == 1 || $auth->role_id == 2)

        <hr class="sidebar-divider m-1 p-0 ">

        <li class="nav-item active ">
            <a class="nav-link p-3 " href="{{ route('admin.printers.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Printers') }}</span></a>
        </li>

    @endif




    @if ($auth->role_id == 1 || $auth->role_id == 2)

        <hr class="sidebar-divider m-1 p-0 ">

        <li class="nav-item active ">
            <a class="nav-link p-3 " href="{{ route('admin.products.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Product') }}</span></a>
        </li>

    @endif


    @if ($auth->role_id == 1 || $auth->role_id == 2)

        <hr class="sidebar-divider m-1 p-0 ">

        <li class="nav-item active ">
            <a class="nav-link p-3 " href="{{ route('admin.categories.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Category') }}</span></a>
        </li>

    @endif


    @if ($auth->role_id == 1)

        <hr class="sidebar-divider m-1 p-0 ">

        <li class="nav-item active ">
            <a class="nav-link p-3 " href="{{ route('admin.users.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Users') }}</span></a>
        </li>

    @endif



    @if ($auth->role_id == 1 || $auth->role_id == 2)

    <hr class="sidebar-divider m-1 p-0 ">

    <li class="nav-item active ">
        <a class="nav-link p-3 " href="{{ route('admin.tables.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Table') }}</span></a>
    </li>

    @endif

    {{-- *********************************Waiter********************************** --}}


    @if ($auth->role_id == 1 ||$auth->role_id == 2 || $auth->role_id == 3 )

    <hr class="sidebar-divider m-1 p-0 ">

    <li class="nav-item active ">
        <a class="nav-link p-3 " href="{{ route('admin.employees.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('tables (employee)') }}</span></a>
    </li>

    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center  d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
