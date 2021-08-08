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
                                            <button class="btn w-100" id="table_icon_order"> <span
                                                    class="iconify font-weight-bold"
                                                    data-icon="fluent:service-bell-24-filled" data-inline="false"></span>
                                            </button>
                                        </div>
                                        <div class="icon">
                                            <button class="btn w-100" id="table_icon_bill"> <span
                                                    class="iconify font-weight-bold" data-icon="fa-solid:money-bill-wave"
                                                    data-inline="false"></span> </button>
                                        </div>
                                        <div class="icon active">
                                            <button class="btn text-white w-100" id="table_icon_service"> <span
                                                    class="iconify font-weight-bold" data-icon="ion:fast-food"
                                                    data-inline="false"> </span> </button>

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
                                <div class="edit-icon table_edit_icon" data-table-id="{{ $table->id }}"><span
                                        class="iconify" data-icon="clarity:edit-solid" data-inline="false"></span></div>
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
                    <h5 class="modal-title text-center" id="exampleModalCenterTitle"> Customer Quantity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="formforCustomerQuantityInput">
                        @csrf

                        <div class="row">

                            <div class="col-sm-12 col-md-">

                                <label for="input-for-customer-quantity">Enter how Many Customer</label>
                                <input type="number" class="form-control" name="quantity" id="input-for-customer-quantity"
                                    placeholder="Enter a number" required>

                            </div>

                        </div>

                        <div class="form-group">
                            <input type="submit" id="submit-button-printer" class="form-control btn btn-success mt-4">
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

                    <form id="form_for_edit_table">
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
                                    <input class="form-control" type="number" name="extra_hour" id="edit_table_extra_hour">

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



    <!-- Modal for taking the edit the table  -->
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






    {{-- hidden forms --}}

    <form id="form_for_table_input" hidden>

        @csrf

        <input type="text" id="form_table_input_id" name="id">
        <input type="text" id="form_table_input_value" value="1" name="value">
        <input type="text" id="form_table_customer_quantity" name="customer_quantity">


    </form>


    <form method="POST" action="{{ route('admin.tableclose') }}" hidden>
        @csrf
        <input type="text" name="table_id" id="input_for_table_close_id" required>
        <button type="submit" id="submit_button_for_close_table"></button>
    </form>



    <script>
        $(document).ready(function() {


            var tableOrderLimits = @json($tableOrderLimits);

            $(document).on('click', '#table_active_button', function() {


                $(this).addClass('active-button-clicked');
                var el = $(".active-button-clicked");
                var itemId = el.data('item-id');

                $('#form_table_input_id').val(itemId);
                $('#form_table_input_value').val();

                $(this).addClass(
                    'edit-item-trigger-clicked-for-printer');
                var options = {
                    'backdrop': 'static'
                };
                $('#modalForCustomerQuantity').modal(options)

                $('.active-button-clicked').removeClass('active-button-clicked')
            });


            $('#submit-button-printer').on('click', function() {

                var customerQuantity = $('#input-for-customer-quantity').val();
                $('#form_table_customer_quantity').val(customerQuantity);

                var route = '{{ route('admin.tableupdate') }}'.trim();
                var data = $('#form_for_table_input').serialize();

                $.ajax({
                    url: route,
                    type: "post",
                    data: data,
                    success: function(data) {
                        console.log(data)

                    },
                    error: function(jqXHR, exception) {
                        console.log(jqXHR);
                    }
                });


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


            $('#close_table_confirm_button').click(function () {
                $('#submit_button_for_close_table').trigger('click');
            })


        });
    </script>



@endsection
