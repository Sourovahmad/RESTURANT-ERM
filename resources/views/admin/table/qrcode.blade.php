<div>

    <button type="button" id="printPdf" style="color: white;  background-color:green;  ">Print </button>
    <a href="{{ route('admin.tables.index') }}"><button type="button" " style=" color: white; background-color:red; ">Cancel </button> </a>
    </div>

    <div id=" page-top">

            <!DOCTYPE html>
            <html lang="en">

            <head>

                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">

                <title> {{ config('app.name', 'Resturant') }} </title>

                <link rel="stylesheet" href="{{ asset('css/admin/sb-admin-2.min.css') }}">

            </head>

            <body>



                <div class="container-fluid " id="printdata">

                    <div class="row">

                        @for ($i = 0; $i < $quantity; $i++)
                            <!-- Growth Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4 text-center topCard">
                                <div class="card border-left-primary shadow h-100 py-4">
                                    <div class="card-img-top ">
                                        <i class="fas fa-calendar fa-2x text-info"></i>
                                    </div>


                                    <div class="text-center">
                                        {!! QrCode::size($size)->generate($tableForPrint->table_url) !!}

                                    </div>



                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary  mb-1">
                                                    {{ $tableForPrint->table_url }}</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor






                    </div>

                </div>




                <!-- Bootstrap core JavaScript-->
                <script src="{{ asset('js/admin/jquery.min.js') }}"></script>


                <script src="{{ asset('js/admin/bootstrapbundle.js') }}"></script>

                <script src="{{ asset('js/printThis.js') }}"></script>

                <script src="{{ asset('js/print.js') }}"></script>


            </body>

            </html>




</div>
