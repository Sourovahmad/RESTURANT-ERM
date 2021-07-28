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




    <div class="card shadow mb-4">

        <div class="card-header py-3 bg-techbot-dark">
            <nav class="navbar">

                <div class="navbar-brand"> Tables </div>

            </nav>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-techbot-dark">

                        <tr>

                            <th> #</th>
                            <th>Table Name</th>
                            <th>Orders</th>
                            <th>Extra </th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot class="bg-techbot-dark">
                        <tr>

                            <th> #</th>
                            <th>Table Name</th>
                            <th>Orders</th>
                            <th>Extra </th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </tfoot>

                    <tbody>


                        @foreach ($tables as $table)


                            <tr class="data-row">

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $table->name }}</td>


                                <td>{{ $table->table_url }} </td>

                                <td>
                                  <select data-item-id={{ $table->id }}  id="selectForTD" class="form-control" >

                                    @if ($table->active_status == 1)
                                        <option selected value="1">  Active </option>
                                        <option value="2"> Inactive</option>
                                    @else
                                        <option  value="1"> Active </option>
                                        <option selected value="2"> Inactive</option>

                                    @endif
                                  </select>

                                </td>

                                <td class="align-middle">


                                    <button title="print" type="button" class="printerbuttonClass btn btn-warning btn-sm printer-option-button"
                                    id="printer-option-button" data-item-id={{ $table->id }}> <i class="fa fa-print"
                                        aria-hidden="false">
                                    </i></button>

                                    <button title="Edit" type="button" class="dataEditItemClass btn btn-success btn-sm"
                                        id="data-edit-button" data-item-id={{ $table->id }}> <i class="fa fa-edit"
                                            aria-hidden="false">
                                        </i></button>


                                    <form method="POST" action="{{ route('admin.tables.destroy', $table->id) }}"
                                        id="delete-form-{{ $table->id }}" style="display:none; ">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                    </form>



                                    <button title="Delete" class="dataDeleteItemClass btn btn-danger btn-sm" onclick="if(confirm('are you sure To remove his Role?')){
            document.getElementById('delete-form-{{ $table->id }}').submit();
           }
           else{
            event.preventDefault();
           }
           " class="btn btn-danger btn-sm btn-raised">
                                        <i class="fa fa-trash" aria-hidden="false">

                                        </i>
                                    </button>




                                </td>


                            </tr>

                        @endforeach

                    </tbody>


                </table>
            </div>
        </div>
    </div>



    <!-- Attachment Modal -->
    <div class="modal fade" id="data-edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-techbot-dark">
                    <h5 class="modal-title " id="edit-modal-label ">
                        Edit Printer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="attachment-body-content">
                    <form id="data-edit-form" class="form-horizontal" method="POST" action="">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="col-form-label" for="modal-update-hidden-id">Id</label>
                            <input type="text" name="id" class="form-control" id="modal-update-hidden-id" required readonly>
                        </div>


                        <div class="form-group">
                            <label class="col-form-label" for="modal-update-name">Name <span style="color: red">*</span></label>
                            <input type="text" name="name" id="modal-update-name" class="form-control">

                        </div>



                        <div class="form-group">
                            <label class="col-form-label" for="modal-update-name">Description</label>
                            <input type="text" name="description" class="form-control" id="modal-update-description">

                        </div>
                        <div class="form-group">

                            <input type="submit" id="submit-button" value="Submit" class="form-control btn btn-success">
                        </div>




                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- /Attachment Modal -->


        <form id="form_for_csrf">

        @csrf

        <input type="text" id="form_input_csrf_id" name="id" hidden>
        <input type="text" id="form_input_csrf_value" name="value" hidden>


        </form>

    <script>


        $(document).ready(function () {

            var tables = @json($tables)


            $('#dataTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });






            $(document).on('click', "#data-edit-button", function () {

                $(this).addClass(
                'edit-item-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#data-edit-modal').modal(options)
            });


            // on modal show
            $('#data-edit-modal').on('show.bs.modal', function () {

                var el = $(".edit-item-trigger-clicked");

                // get the data
                var itemId = el.data('item-id');

                $.each(tables, function (key) {

                    if(tables[key].id == itemId){
                        $('#modal-update-hidden-id').val(itemId);
                        $("#modal-update-name").val(tables[key].name);
                        $("#modal-update-description").val(tables[key].description);

                        return false;
                    }

                 });


                var link = "{{route('admin.tables.index')}}";
                var action =  link.trim() + '/' + itemId;
                 $("#data-edit-form").attr('action', action);
            });



            // on modal hide
            $('#data-edit-modal').on('hide.bs.modal', function () {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#edit-form").trigger("reset");
            });




            $(document).on('change','#selectForTD',function(){

                $(this).addClass(
                'edit-item-trigger-clicked-for-select');
                 var options = {
                    'backdrop': 'static'
                };

              var el = $(".edit-item-trigger-clicked-for-select");
              var itemId = el.data('item-id');
              var value = $( "#selectForTD option:selected" ).val();

              $('#form_input_csrf_id').val(itemId);
              $('#form_input_csrf_value').val(value);

                var route = '{{ route('admin.tableupdate') }}'.trim();
                var data = $('#form_for_csrf').serialize();
                $.ajax({
                url: route,
                type: "post",
                data: data,
                success: function(data){
                    console.log(data);
                },
                error: function (jqXHR, exception) {
                    console.log(jqXHR);
                }
            });


            $('.edit-item-trigger-clicked-for-select').removeClass('edit-item-trigger-clicked-for-select')
            location.reload();

            });


        });

    </script>




@endsection
