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

                                        @if (!is_null($table->order_limit_time))

                                            <div class="icon">
                                                <button class="btn w-100 button_for_table_order_time_limit"
                                                    data-item-id="{{ $table->id }}" id="table_icon_order"> <span
                                                        class="font-weight-bold"> <i class="fas fa-ban"></i></span>
                                                </button>
                                            </div>

                                        @endif
                                        <form action="{{ route('print-queue') }}" method="POST"
                                            id="printbillform-{{ $table->id }}">
                                            @csrf
                                            <input type="text" name="table_id" value="{{ $table->id }}" hidden>
                                            <div class="icon">
                                                <button type="submit" class="btn w-100"
                                                    data-item-id={{ $table->id }}
                                                    id="table_icon_bill-{{ $table->id }}"> <span
                                                        class="iconify font-weight-bold" onclick="if(confirm('Are you sure Want To Print the bill ?')){
                document.getElementById('printbillform-{{ $table->id }}').submit();
               }
               else{
                event.preventDefault();
               }
               " data-icon="fa-solid:money-bill-wave" data-inline="false"></span> </button>
                                            </div>
                                        </form>
                                        <div class="icon  table-service-btn" data-item-id={{ $table->id }}>
                                            <button class="btn text-dark w-100 table_icon_service"
                                                id="table_icon_service-{{ $table->id }}"> <span
                                                    class="iconify font-weight-bold" data-icon="ion:fast-food"
                                                    data-inline="false"> </span> </button>
                                        </div>

                                    </div>
                                    <div class="timer">
                                        <div class="hours " data-hour-id={{ $table->id }}>00</div>
                                        <div class="colon "> : </div>
                                        <div class="minutes " data-minute-id={{ $table->id }}>00</div>
                                        <div class="colon "> : </div>
                                        <div class="second " data-second-id={{ $table->id }}>00</div>
                                    </div>
                                </div>
                                <div class="edit-icon table_edit_icon" data-table-id="{{ $table->id }}"><span
                                        class="iconify" data-icon="clarity:edit-solid" data-inline="false"></span>
                                </div>
                                <div class="running-icon bg-danger button_for_close_table"
                                    data-table-id="{{ $table->id }}" role="button">close</div>
                            </div>


                        @else
                            <div class="table-card">
                                <div class="wrapper">
                                    <div class="title text-center">
                                        <h4>{{ $table->name }}</h4>
                                    </div>
                                    <div class="services-icon">
                                        <div class="active-btn text-center">
                                            <button class="btn btn-lg btn-success btn-sm-sm" id="table_active_button"
                                                data-item-id={{ $table->id }}> Active</button>
                                        </div>

                                    </div>
                                </div>


                            </div>

                        @endif


                    @endforeach

                @endif





            </div>



        </div>
    </section>

    <!-- Modal for taking the customer quantity  -->
    <div class="modal fade" id="modalForCustomerQuantity" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenterTitle">Select Menu </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="formforCustomerQuantityInput" method="POST" action="{{ route('admin.tableupdate') }}">
                        @csrf


                            <input type="text" name="table_id" id="modal-hidden-table-id" hidden>



                    @foreach ($menus as $menu)

                        <div class="row">



                            <div class="col-sm-12 col-md-12">


                                <div class="input-group">

                                    <span class="input-group-btn m-2">
                                        <button type="button" class="quantity-left-minus btn btn-outline-danger btn-number" data-item-id="{{ $menu->id }}">
                                          <span class="fas fa-minus"></span>
                                        </button>
                                    </span>

                                   <span class="mt-3">
                                       <b id="menu_quantity_total_{{ $menu->id }}"> 0</b> X  &nbsp;&nbsp;&nbsp;&nbsp; {{ $menu->name }}
                                   </span>

                                <input type="text" id="quantity_{{ $menu->id }}" name="{{ $menu->id }}" class="form-control"   min="1" max="100" hidden>
                                    <span class="input-group-btn m-2">
                                        <button type="button" class="quantity-right-plus btn btn-outline-success btn-number" data-item-id="{{ $menu->id }}">
                                            <span class="fas fa-plus"></span>
                                        </button>
                                    </span>
                                </div>


                            </div>

                        </div>

                    @endforeach

                        <div class="fariorm-group">
                            <button type="submit" id="table-active-submit-button"
                                class="form-control btn btn-success mt-4">Submit</button>
                        </div>

                    </form>



                </div>

            </div>
        </div>
    </div>




    <!-- Modal for taking the edit the table  -->
    <div class="modal fade" id="table_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenterTitle"> Edit Table </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="form_for_edit_table" method="POST" action="{{ route('admin.table-edit') }}">
                        @csrf

                        <div class="row">
                            <input type="number" name="table_id" id="edit_table_table_id" required hidden>

                            <div class="col-sm-12 col-md-4">

                                <div class="form-group">
                                    <label for="edit_table_total_customer">Total Customer</label>
                                    <input class="form-control" type="number" name="total_customer"
                                        id="edit_table_total_customer" required>
                                </div>

                            </div>


                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">

                                    <label for="edit_table_total_customer">Add extra Hour</label>
                                    <input class="form-control" type="number" name="extra_hour"
                                        id="edit_table_extra_hour">

                                </div>
                            </div>


                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">

                                    <label for="edit_table_total_customer">Add extra Miniute</label>
                                    <input class="form-control" type="number" name="extra_miniute"
                                        id="edit_table_extra_miniute">

                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <input type="submit" id="submit-button-table-edit" class="form-control btn btn-success mt-4">
                        </div>

                    </form>



                </div>

            </div>
        </div>
    </div>


    <!-- Modal for taking times for table  -->
    <div class="modal fade" id="table_order_time_modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenterTitle"> Next Order In </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This Table Can order Again in <span id="again_order_for_table"> </span> </p>
                    <div class="button-group">
                        <form action="{{ route('OrderTimeLimitupdateTwo') }}" method="POST"
                            id="form_for_order_time_limit">
                            @csrf
                            <input type="number" name="table_id" id="table_time_limit_hidden_table_id" hidden>
                            <button type="submit" class="btn btn-success"> Reset</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>




    <!-- Modal for taking the sure cancel the table  -->
    <div class="modal fade" id="table_close_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenterTitle"> Are You Sure? </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Are you Sure Want to close the table ? if the Bill isn't Payed Yet. The Bill Will Be Printed</p>
                    <div class="button-group">
                        <button type="button" id="close_table_confirm_button" class="btn btn-success">Close Table</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>




                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal for view service  -->
    <div class="modal fade" id="service-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenterTitle"> Services </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">

                        <tbody id="serviceModalForm">


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>


    <!-- Modal for view service  -->
    <div class="modal fade" id="bill-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenterTitle"> Services </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">

                        <tbody id="billmodalForm">


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>






    {{-- hidden forms --}}




    <form method="POST" action="{{ route('admin.tableclose') }}" hidden>
        @csrf
        <input type="text" name="table_id" id="input_for_table_close_id" required>
        <button type="submit" id="submit_button_for_close_table"></button>
    </form>



    <script>
        $(document).ready(function() {

            var tables = @json($tables);


        $('.quantity-left-minus').click(function () {

            $(this).addClass('cliecked_for_quantity');
            var el = $(".cliecked_for_quantity");
            var itemId = el.data('item-id');

            currentValue = parseInt($('#menu_quantity_total_' + itemId).text()) ;

            if(currentValue !== 0 || currentValue > 0){
                var updatedValue = currentValue - 1;
                $('#quantity_' + itemId).val(updatedValue);
                $('#menu_quantity_total_' + itemId).html(updatedValue)
            }

            $('.cliecked_for_quantity').removeClass('cliecked_for_quantity');
        });


        $('.quantity-right-plus').click(function () {
            $(this).addClass('cliecked_for_quantity');
            var el = $(".cliecked_for_quantity");
            var itemId = el.data('item-id');

            currentValue = parseInt($('#menu_quantity_total_' + itemId).text()) ;

                var updatedValue = currentValue + 1;
                $('#quantity_' + itemId).val(updatedValue);
                $('#menu_quantity_total_' + itemId).html(updatedValue)


            $('.cliecked_for_quantity').removeClass('cliecked_for_quantity');
        });



            $(document).on('click', '.button_for_table_order_time_limit', function() {

                $(this).addClass('order-time-limit-button-clicked');


                var options = {
                    'backdrop': 'static'
                };

                $('#table_order_time_modal').modal(options);

            });


            $('#table_order_time_modal').on('show.bs.modal', function() {

                var el = $(".order-time-limit-button-clicked");
                var itemId = el.data('item-id');

                $('#table_time_limit_hidden_table_id').val(itemId);

                $.each(tables, function(i, value) {

                    if (tables[i].id == itemId) {

                        var end_Order_time = tables[i].order_limit_time
                        var start = new Date(end_Order_time);

                        setInterval(function() {
                            var total_seconds = (start - new Date) / 1000;

                            var minutes = Math.floor(total_seconds / 60);
                            total_seconds = total_seconds % 60;

                            var seconds = Math.floor(total_seconds);

                            if (minutes <= 00 && seconds <= 0) {

                                var data = $('#form_for_order_time_limit').serialize();
                                var route = '{{ route('OrderTimeLimitupdate') }}'.trim();

                                $.ajax({
                                    url: route,
                                    type: "post",
                                    data: data,
                                    success: function() {
                                        console.log('Round Updated');
                                        location.reload();
                                    },
                                    error: function(jqXHR, exception) {
                                        console.log(jqXHR);
                                    }
                                });


                            }

                            if (minutes < 10) {
                                minutes = '0' + minutes;
                            }
                            if (seconds < 10) {
                                seconds = '0' + seconds;
                            }

                            var html = minutes + ':' + seconds
                            $('#again_order_for_table').text(html)
                        }, 1000);


                    }

                });



            });

            $('#table_order_time_modal').on('hide.bs.modal', function() {

                $(".order-time-limit-button-clicked").removeClass('order-time-limit-button-clicked');

            });




            var all_services = [];
            var serviceTableId;


            $.ajax({
                url: "{{ route('need-service-get') }}",
                type: 'GET',
                success: function(data) {
                    all_services = data;
                },
                error: function(data) {
                    console.log('error');
                },

            });



            var tableOrderLimits = @json($tableOrderLimits);

            $(document).on('click', '#table_active_button', function() {

                $(this).addClass('active-button-clicked');
                var el = $(".active-button-clicked");
                var itemId = el.data('item-id');

                $('#modal-hidden-table-id').val(itemId);

                var options = {
                    'backdrop': 'static'
                };
                $('#modalForCustomerQuantity').modal(options)

                $('.active-button-clicked').removeClass('active-button-clicked')
            });




            $('.table-service-btn').on('click', function() {
                $(this).addClass('show-service-clicked');
                var el = $(".show-service-clicked");
                serviceTableId = el.data('item-id');
                var options = {
                    'backdrop': 'static'
                };
                $('#service-modal').modal(options)

            });


            $('#service-modal').on('show.bs.modal', function() {
                var services = all_services[parseInt(serviceTableId)];
                var html = '';
                var url = "{{ route('dashboard') }}" + "/remove-service/";
                if (Array.isArray(services)) {
                    $.each(services, function(index, value) {

                        html += ' <tr>  <td scope="row">' + value.service + '</td>';
                        html += '<td> <form method="POST" action="' + url + value.id + '">';
                        html += '    {{ csrf_field() }}';
                        html +=
                            ' <button type="submit" class="btn btn-danger rounded"><i class="fas fa-minus-circle"></i></button>';
                        html += '</form>  </td> </tr>';
                    });

                }
                $('#serviceModalForm').html(html);

            });

            $('#service-modal').on('hide.bs.modal', function() {
                $(".show-service-clicked").removeClass('show-service-clicked');

            });


            $('.table_edit_icon').on('click', function() {

                $(this).addClass('edit-table-button-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#table_edit_modal').modal(options);

            });

            $('#table_edit_modal').on('show.bs.modal', function() {

                var el = $(".edit-table-button-clicked");
                var tableId = el.data('table-id');

                $.each(tableOrderLimits, function(key) {
                    if (tableOrderLimits[key].table_id == tableId) {
                        console.log(tableOrderLimits[key]);
                        $('#edit_table_table_id').val(tableId);
                        $('#edit_table_total_customer').val(tableOrderLimits[key].total_customer);
                    }


                })


            });


            $('#table_edit_modal').on('hide.bs.modal', function() {

                $(".edit-table-button-clicked").removeClass('edit-table-button-clicked');
                $('#button_for_close_table').removeAttr('data-table-id');
                $('#form_for_edit_table').trigger('reset');
            });



            // close table button functiiions
            $('.button_for_close_table').on('click', function() {

                $(this).addClass('table-close-button-clicked');
                var el = $('.table-close-button-clicked');
                var dataTableid = el.data('table-id');
                $('#input_for_table_close_id').val(dataTableid);
                var options = {
                    'backdrop': 'static'
                };
                $('#table_close_modal').modal(options);
                $('.table-close-button-clicked').removeClass('table-close-button-clicked');
            })


            $('#close_table_confirm_button').click(function() {
                $('#submit_button_for_close_table').trigger('click');
            });



            $.each(tables, function(i, value) {

                var start = new Date(value.end_time);


                setInterval(function() {
                    var total_seconds = (start - new Date) / 1000;

                    var hours = Math.floor(total_seconds / 3600);
                    total_seconds = total_seconds % 3600;

                    var minutes = Math.floor(total_seconds / 60);
                    total_seconds = total_seconds % 60;

                    var seconds = Math.floor(total_seconds);

                    if (hours < 10) {
                        hours = '0' + hours;
                    }
                    if (minutes < 10) {
                        minutes = '0' + minutes;
                    }
                    if (seconds < 10) {
                        seconds = '0' + seconds;
                    }

                    var selector_id = value.id;
                    var target = $('div[data-hour-id="' + selector_id + '"]').text(hours);
                    var target = $('div[data-minute-id="' + selector_id + '"]').text(minutes);
                    var target = $('div[data-second-id="' + selector_id + '"]').text(seconds);
                }, 1000);
            });





            setInterval(function() {

                $.ajax({
                    url: "{{ route('need-service-get') }}",
                    type: 'GET',
                    success: function(data) {

                        all_services = data;
                        $('.table-service-btn').each(function(index) {
                            var el = $(this);
                            var dataTableid = el.data('item-id');
                            if (Array.isArray(all_services[dataTableid])) {
                                el.addClass('active');
                            } else {
                                el.removeClass('active');
                            }


                        });
                    },

                    error: function(data) {
                        console.log('error');
                    },

                });

            }, 10000);



        });
    </script>



@endsection
