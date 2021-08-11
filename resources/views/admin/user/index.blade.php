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


    <!-- Begin Page Content -->
    <div class="collapse" id="createNewForm">
        <div class="card mb-4 shadow">

            <div class="card-header py-3  bg-techbot-dark">
                <nav class="navbar navbar-dark">
                    <a class="navbar-brand text-light"> Add User </a>
                </nav>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="row">


                        <div class="col-12 col-md-4 form-group">
                            <label for="username">User Name<span class="text-danger">*</span> </label>
                            <input type="text" name="name" id="username" class="form-control" required>

                        </div>




                        <div class="col-12 col-md-4 form-group">
                            <label for="email">E-mail<span class="text-danger">*</span> </label>
                            <input type="email" name="email" id="email" class="form-control" required>

                        </div>




                        <div class="col-12 col-md-4 form-group">
                            <label for="password">Password<span class="text-danger">*</span> </label>
                            <input type="text" name="password" id="password" class="form-control" required>

                        </div>

                        <div class="col-12 col-md-4 form-group">
                            <label for="role">Select Role <span class="text-danger">*</span> </label>
                            <select class="form-control" name="role" id="role" required>
                                <option selected hidden disabled>Select Role</option>

                                            @foreach ($roles as $role )

                                            @if ($role->id != 1)
                                                <option value="{{ $role->id }}"> {{ $role->role }}</option>
                                            @endif


                                            @endforeach


                            </select>

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

                <div class="navbar-brand"> Users </div>
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
                            <th>Role</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot class="bg-techbot-dark">
                        <tr>

                            <th> #</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Action</th>

                        </tr>

                    </tfoot>

                    <tbody>


                        @foreach ($users as $user)

                            @if ($user->id != 1)


                            <tr class="data-row">

                                <td>{{ $loop->iteration }}</td>
                                <td class="word-break name">{{ $user->name }}</td>
                                <td class="word-break description">{{ $user->role->role }}</td>



                                <td class="align-middle">
                                    {{-- <button title="Edit" type="button" class="dataEditItemClass btn btn-success btn-sm"
                                        id="data-edit-button" data-item-id={{ $user->id }}> <i class="fa fa-edit"
                                            aria-hidden="false">
                                        </i></button> --}}


                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                        id="delete-form-{{ $user->id }}" style="display:none; ">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                    </form>



                                    <button title="Delete" class="dataDeleteItemClass btn btn-danger btn-sm" onclick="if(confirm('are you sure To remove his Role?')){
            document.getElementById('delete-form-{{ $user->id }}').submit();
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
                            @endif

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
                            <label class="col-form-label" for="modal-update-name">User <span style="color: red">*</span></label>
                            <select class="form-control" name="role" id="role" required>
                                <option id="selecUserOption" selected hidden disabled>Select user</option>

                                @foreach ($users as $user)
                                <option id="userSelector" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach


                            </select>

                        </div>



                        <div class="form-group">
                            <label class="col-form-label" for="modal-update-name">role <span style="color: red">*</span></label>
                            <select class="form-control" name="role" id="role" required>
                                <option id="selectRoleOption" class="form-controll" selected hidden disabled>Select user</option>

                                @foreach ($roles as $role)
                                <option id="roleSelector" value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach


                            </select>

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

            var users = @json($users);
            var roles = @json($roles);


            console.log(users[0].role_id)

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




                $.each(users, function (key) {

                    if(users[key].id == users[key].role_id){
                        $("#userSelector").attr('selected');
                    }

                 });

                $("#modal-update-hidden-id").val(itemId);


                var link = "{{route('admin.users.index')}}";
                 var action =  link.trim() + '/' + itemId;
                 $("#data-edit-form").attr('action', action);
            });



            // on modal hide
            $('#data-edit-modal').on('hide.bs.modal', function () {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#edit-form").trigger("reset");
            });




        });

    </script>




@endsection
