@extends('admin.layouts.app')

@section('content')


  @php
        $authUser = Auth::user();
    @endphp

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <!-- Begin Page Content -->
            <div class="container-fluid  p-1">

                <div class="row">

                 @if ($authUser->role_id == 1)
                    <!-- Growth Card Example -->

                    <div class="col-xl-3 col-md-6 mb-4 text-center topCard">
                        <div class="card border-left-primary shadow  py-4">
                            <div class="card-img-top ">
                            <i class="fas fa-calendar fa-2x text-info"></i>
                            </div>
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> <a href="{{ route('admin.orders.index') }}"> Orders   </a></div>
                                </div>

                            </div>
                            </div>
                        </div>
                 </div>
                @endif



                    @if ($authUser->role_id == 1 || $authUser->role_id == 2)
                    <!-- Growth Card Example -->

                    <div class="col-xl-3 col-md-6 mb-4 text-center topCard">
                        <div class="card border-left-primary shadow  py-4">
                            <div class="card-img-top ">
                            <i class="fas fa-calendar fa-2x text-info"></i>
                            </div>
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">   <a href="{{ route('admin.products.index') }}"> Products   </a></div>
                                </div>

                            </div>
                            </div>
                        </div>
                 </div>
                @endif



                @if ($authUser->role_id == 1 || $authUser->role_id == 2)
                    <!-- Growth Card Example -->

                    <div class="col-xl-3 col-md-6 mb-4 text-center topCard">
                        <div class="card border-left-primary shadow  py-4">
                            <div class="card-img-top ">
                            <i class="fas fa-calendar fa-2x text-info"></i>
                            </div>
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">  <a href="{{ route('admin.tables.index') }}"> Tables   </a></div>
                                </div>

                            </div>
                            </div>
                        </div>
                 </div>
                @endif





                   @if ($authUser->role_id == 1 || $authUser->role_id == 2 || $authUser->role_id == 3)
                    <!-- Growth Card Example -->

                    <div class="col-xl-3 col-md-6 mb-4 text-center topCard">
                        <div class="card border-left-primary shadow  py-4">
                            <div class="card-img-top ">
                            <i class="fas fa-calendar fa-2x text-info"></i>
                            </div>
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">

                                <div class="h6 mb-0 font-weight-bold text-gray-800"> <a href="{{ route('admin.employees.index') }}"> Employee Table  </a></div>
                                </div>

                            </div>
                            </div>
                        </div>
                 </div>
                @endif



                </div>



            </div>
        </div>
    </div>


@endsection
