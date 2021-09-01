@extends('admin.layouts.app')
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul >
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            @if (is_array(session('success')))
                <ul >
                    @foreach (session('success') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session('success') }}
            @endif
        </div>
    @endif


    <!-- Begin Page Content -->
    <div class="collapse" id="createNewForm">
        <div class="card mb-4 shadow">

            <div class="card-header py-3  bg-techbot-dark">
                <nav class="navbar navbar-dark">
                    <a class="navbar-brand text-light"> Add Table </a>
                </nav>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.tables.store') }}">
                    @csrf
                    <div class="row">


                        <div class="col-12 col-md-4 form-group">
                            <label for="InputName">Name <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control" name="name" id="InputName">

                        </div>

                        <div class="col-12 col-md-4 form-group">

                            <label for="description">Description  </label>
                            <input type="text" name="description" class="form-control" id="descriptionForAddnew" >


                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn bg-techbot-dark mt-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">



        <div class="card-header py-3 bg-techbot-dark">
            <nav class="navbar">

                <div class="navbar-brand"> Tables </div>
                <div id="AddNewFormButtonDiv"><button type="button" class="btn btn-success btn-lg" id="AddNewFormButton"
                        data-toggle="collapse" data-target="#createNewForm" aria-expanded="false"
                        aria-controls="collapseExample"><i class="fas fa-plus" id="PlusButton"></i></button></div>


            </nav>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-techbot-dark">

                        <tr>

                            <th> #</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Url</th>
                            <th>QrCode</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot class="bg-techbot-dark">
                        <tr>

                            <th> #</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Url</th>
                            <th>QrCode</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </tfoot>

                    <tbody>


                        @foreach ($tables as $table)


                            <tr class="data-row">

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $table->name }}</td>
                                <td>
                                    <textarea  id="" rows="3" class="form-control"> {{ $table->description }}</textarea>
                                </td>

                                <td>{{ $table->table_url }} </td>
                                <td> {!! QrCode::size(80)->generate($table->table_url)    !!} </td>

                                <td>


                                    @if ($table->active_status == 1)

                                     <span class="font-weight-bold text-success"> Active</span>

                                    @else

                                     <span class="font-weight-bold text-danger"> inactive</span>

                                    @endif

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


 <button title="Delete" class="dataDeleteItemClass btn btn-danger btn-sm" onclick="if(confirm('Are you sure Want To Delete ?')){
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


        <!-- Modal for taking the printer input -->
        <div class="modal fade" id="modalForPrinterCalculate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalCenterTitle"> Print Table QR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                    <form id="formforPrinterInput" method="POST" action="" >
                        @csrf

                        <div class="row">

                            <div class="col-sm-12 col-md-6">

                                <label for="input-for-printer-input-quantity" >Quantity to Print</label>
                                <input type="number" class="form-control" name="quantity" id="input-for-printer-input-quantity" placeholder="Enter a number" required>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="input-for-printer-input-size">Size</label>
                                <select class="form-control" name="size" id="input-for-printer-input-size" required>
                                    <option value="150">Small</option>
                                    <option selected value="200">Normal</option>
                                    <option value="230">Large</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" id="submit-button-printer" value="Submit" class="form-control btn btn-success mt-4">
                        </div>

                    </form>



                </div>

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
                        Edit Table</h5>
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
                            <label class="col-form-label" for="modal-update-name">Url</label>
                            <input type="text" name="table_url" class="form-control" id="modal-update-table-url">

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

                        var route = '{{ route('dashboard') }}';
                        var updatedUrl = tables[key].table_url.replace(route+'/gotable/','');
                        $('#modal-update-table-url').val(updatedUrl);

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



            // printer modal option start from here

            $('.printer-option-button').click(function(){

                $(this).addClass(
                'edit-item-trigger-clicked-for-printer');
                var options = {
                    'backdrop': 'static'
                };
                $('#modalForPrinterCalculate').modal(options)
            })


            $('#modalForPrinterCalculate').on('shown.bs.modal', function () {

                var el = $(".edit-item-trigger-clicked-for-printer");
                var itemId = el.data('item-id');


                var link = "{{route('admin.dashboard')}}";
                var action =  link.trim() + '/tables/' + itemId;
                 $("#formforPrinterInput  ").attr('action', action);


                })

                $('#modalForPrinterCalculate').on('hide.bs.modal', function () {
                $('.edit-item-trigger-clicked-for-printer').removeClass('edit-item-trigger-clicked-for-printer')
                $("#edit-form").trigger("reset");
            });



        });

    </script>




@endsection
