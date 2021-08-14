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

                <div class="navbar-brand"> Orders </div>

            </nav>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-techbot-dark">

                        <tr>

                            <th> #</th>
                            <th>table Name</th>
                            <th>Total Amount</th>
                            <th>Created At</th>

                        </tr>
                    </thead>
                    <tfoot class="bg-techbot-dark">
                        <tr>

                            <th> #</th>
                            <th>table Name</th>
                            <th>Total Amount</th>
                            <th>Created At</th>

                        </tr>

                    </tfoot>

                    <tbody>


                        @foreach ($orders as $order)


                            <tr class="data-row">

                                <td>{{ $loop->iteration }}</td>
                                <td >{{ $order->table_name }}</td>
                                <td >{{ $order->total_amount }}</td>
                                <td >{{ $order->created_at }}</td>




                            </tr>


                        @endforeach

                    </tbody>


                </table>
            </div>
        </div>
    </div>


@endsection