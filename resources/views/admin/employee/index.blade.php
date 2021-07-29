@extends('admin.layouts.app')
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            @if (is_array(session('success')))
                <ul>
                    @foreach (session('success') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session('success') }}
            @endif
        </div>
    @endif





    <section id="tables" class="container-fluid">
        <div class="tables-area">
            <div class="row">
                <div class="table-card">
                    <div class="wrapper">
                        <div class="title text-center"><h4>Tabel <span>1</span></h4></div>
                        <div class="services-icon">
                            <div class="icon">
                                <span class="iconify" data-icon="fluent:service-bell-24-filled" data-inline="false"></span>
                            </div>
                            <div class="icon">
                                <span class="iconify" data-icon="fa-solid:money-bill-wave" data-inline="false"></span>
                            </div>
                            <div class="icon active">
                                <span class="iconify" data-icon="ion:fast-food" data-inline="false"></span>
                            </div>

                        </div>
                        <div class="timer">
                            <div class="hours">20</div>
                            <div class="colon"> : </div>
                            <div class="minutes">20</div>
                            <div class="colon"> : </div>
                            <div class="second">20</div>
                        </div>
                    </div>
                    <div class="edit-icon"><span class="iconify" data-icon="clarity:edit-solid" data-inline="false"></span></div>
                    <div class="running-icon">running</div>
                </div>

                <div class="table-card">
                    <div class="wrapper">
                        <div class="title text-center"><h4>Tabel <span>1</span></h4></div>
                        <div class="services-icon">
                            <div class="active-btn">
                                <h3 class="text-center">Active</h3>
                            </div>

                        </div>
                    </div>
                    <div class="edit-icon"><span class="iconify" data-icon="clarity:edit-solid" data-inline="false"></span></div>

                </div>

                <div class="table-card">
                    <div class="wrapper">
                        <div class="title text-center"><h4>Tabel <span>1</span></h4></div>
                        <div class="services-icon">
                            <div class="icon">
                                <span class="iconify" data-icon="fluent:service-bell-24-filled" data-inline="false"></span>
                            </div>
                            <div class="icon">
                                <span class="iconify" data-icon="fa-solid:money-bill-wave" data-inline="false"></span>
                            </div>
                            <div class="icon active">
                                <span class="iconify" data-icon="ion:fast-food" data-inline="false"></span>
                            </div>

                        </div>
                        <div class="timer">
                            <div class="hours">20</div>
                            <div class="colon"> : </div>
                            <div class="minutes">20</div>
                            <div class="colon"> : </div>
                            <div class="second">20</div>
                        </div>
                    </div>
                    <div class="edit-icon"><span class="iconify" data-icon="clarity:edit-solid" data-inline="false"></span></div>
                    <div class="running-icon">running</div>
                </div>

                <div class="table-card">
                    <div class="wrapper">
                        <div class="title text-center"><h4>Tabel <span>1</span></h4></div>
                        <div class="services-icon">
                            <div class="icon">
                                <span class="iconify" data-icon="fluent:service-bell-24-filled" data-inline="false"></span>
                            </div>
                            <div class="icon">
                                <span class="iconify" data-icon="fa-solid:money-bill-wave" data-inline="false"></span>
                            </div>
                            <div class="icon active">
                                <span class="iconify" data-icon="ion:fast-food" data-inline="false"></span>
                            </div>

                        </div>
                        <div class="timer">
                            <div class="hours">20</div>
                            <div class="colon"> : </div>
                            <div class="minutes">20</div>
                            <div class="colon"> : </div>
                            <div class="second">20</div>
                        </div>
                    </div>
                    <div class="edit-icon"><span class="iconify" data-icon="clarity:edit-solid" data-inline="false"></span></div>
                    <div class="running-icon">running</div>
                </div>

                <div class="table-card">
                    <div class="wrapper">
                        <div class="title text-center"><h4>Tabel <span>1</span></h4></div>
                        <div class="services-icon">
                            <div class="icon">
                                <span class="iconify" data-icon="fluent:service-bell-24-filled" data-inline="false"></span>
                            </div>
                            <div class="icon">
                                <span class="iconify" data-icon="fa-solid:money-bill-wave" data-inline="false"></span>
                            </div>
                            <div class="icon active">
                                <span class="iconify" data-icon="ion:fast-food" data-inline="false"></span>
                            </div>

                        </div>
                        <div class="timer">
                            <div class="hours">20</div>
                            <div class="colon"> : </div>
                            <div class="minutes">20</div>
                            <div class="colon"> : </div>
                            <div class="second">20</div>
                        </div>
                    </div>
                    <div class="edit-icon"><span class="iconify" data-icon="clarity:edit-solid" data-inline="false"></span></div>
                    <div class="running-icon">running</div>
                </div>

                <div class="table-card">
                    <div class="wrapper">
                        <div class="title text-center"><h4>Tabel <span>1</span></h4></div>
                        <div class="services-icon">
                            <div class="icon">
                                <span class="iconify" data-icon="fluent:service-bell-24-filled" data-inline="false"></span>
                            </div>
                            <div class="icon">
                                <span class="iconify" data-icon="fa-solid:money-bill-wave" data-inline="false"></span>
                            </div>
                            <div class="icon active">
                                <span class="iconify" data-icon="ion:fast-food" data-inline="false"></span>
                            </div>

                        </div>
                        <div class="timer">
                            <div class="hours">20</div>
                            <div class="colon"> : </div>
                            <div class="minutes">20</div>
                            <div class="colon"> : </div>
                            <div class="second">20</div>
                        </div>
                    </div>
                    <div class="edit-icon"><span class="iconify" data-icon="clarity:edit-solid" data-inline="false"></span></div>
                    <div class="running-icon">running</div>
                </div>

            </div>



        </div>
    </section>





@endsection
