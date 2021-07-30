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

                @if ($tables->count() == 0)
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Opps No table Found !</h4>
                        <p>There is No table Found.Plase Contact The Manager Or Admin for Adding Tables</p>
                        <hr>

                    </div>

                @else
                    @foreach ($tables as $table)



                        @if ($table->active_status == 1)





                            <div class="table-card">
                                <div class="wrapper">
                                    <div class="title text-center">
                                        <h4>{{ $table->name }}</span></h4>
                                    </div>
                                    <div class="services-icon">
                                        <div class="icon">
                                            <span class="iconify" data-icon="fluent:service-bell-24-filled"
                                                data-inline="false"></span>
                                        </div>
                                        <div class="icon">
                                            <span class="iconify" data-icon="fa-solid:money-bill-wave"
                                                data-inline="false"></span>
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
                                <div class="edit-icon"><span class="iconify" data-icon="clarity:edit-solid"
                                        data-inline="false"></span></div>
                                <div class="running-icon">running</div>
                            </div>


                        @else
                            <div class="table-card">
                                <div class="wrapper">
                                    <div class="title text-center">
                                        <h4>{{ $table->name }}</h4>
                                    </div>
                                    <div class="services-icon">
                                        <div class="active-btn text-center">
                                            <button class="btn btn-lg btn-success btn-sm-sm" id="table_active_button" data-item-id={{ $table->id }}> Active</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="edit-icon"><span class="iconify" data-icon="clarity:edit-solid"
                                        data-inline="false"></span></div>

                            </div>

                        @endif


                    @endforeach

                @endif





            </div>



        </div>
    </section>

    <form id="form_for_table_input">

        @csrf

        <input type="text" id="form_table_input_id" name="id" hidden>
        <input type="text" id="form_table_input_value" value="1" name="value" hidden>


    </form>


    <script>
        $(document).ready(function() {
            $(document).on('click', '#table_active_button', function() {
                $(this).addClass('active-button-clicked');
                var el = $(".active-button-clicked");
                var itemId = el.data('item-id');

                $('#form_table_input_id').val(itemId);
                $('#form_table_input_value').val();

                var route = '{{ route('admin.tableupdate') }}'.trim();
                var data = $('#form_for_table_input').serialize();

                $.ajax({
                    url: route,
                    type: "post",
                    data: data,
                    success: function(data) {
                        location.reload();

                    },
                    error: function(jqXHR, exception) {
                        console.log(jqXHR);
                    }
                });


                $('.active-button-clicked').removeClass('active-button-clicked')
            })
        });
    </script>



@endsection
