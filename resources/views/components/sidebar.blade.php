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





    @if ($auth->role_id == 1)

    <hr class="sidebar-divider m-1 p-0 ">

    <li class="nav-item active ">
        <a class="nav-link p-3 " href="{{ route('admin.orders.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Orders') }}</span></a>
    </li>

    @endif



    @if ($auth->role_id == 1 || $auth->role_id == 2)

        <hr class="sidebar-divider m-1 p-0 ">


    <!-- Product Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-clipboard-check "></i>
            <span>{{__('Product')}}</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">


                <a class="collapse-item" href="{{ route('admin.products.index') }}">{{__('Products')}}</a>

                {{-- <a class="collapse-item" href="{{ route('admin.ServicesProducts.index') }}">{{__('Service Product')}}</a> --}}
                <a class="collapse-item" href="{{ route('admin.categories.index') }}">{{__('Categories')}}</a>

            </div>
        </div>
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

       @if ($auth->role_id == 1 || $auth->role_id == 2)

        <hr class="sidebar-divider m-1 p-0 ">

        <li class="nav-item active ">
            <a class="nav-link p-3 " href="{{ route('admin.printers.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Printers') }}</span></a>
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

    @if ($auth->role_id == 1)

    <hr class="sidebar-divider m-1 p-0 ">

    <li class="nav-item active ">
        <a class="nav-link p-3 " href="{{ route('admin.settings.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Setting') }}</span></a>
    </li>

    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center  d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
