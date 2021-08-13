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

                <div class="navbar-brand"> Settings </div>

            </nav>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.settings.store') }}" method="POST">
                @csrf

                 <div class="row mt-4">

                    <div class="form-group col-12 col-md-1">
                        <label for="name"> Name:  </label>
                    </div>

                    <div class=" form-group col-12 col-md-4">
                        <input type="text" name="website_name" class="form-control" id="name"
                            value="{{ $setting->website_name }}" required>
                    </div>



                    <div class="form-group col-12 col-md-1">
                        <label for="email"> Email:  </label>
                    </div>


                    <div class="form-group col-12 col-md-4">
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ $setting->email }}" required>
                    </div>



                </div>

                   <div class="row mt-4">

                    <div class="form-group col-12 col-md-1">
                        <label for="phone">  Phone:  </label>
                    </div>

                    <div class=" form-group col-12 col-md-4">
                        <input type="phone" name="phone" class="form-control" id="name"
                            value="{{ $setting->phone }}" required>
                    </div>



                    <div class="form-group col-12 col-md-1">
                        <label for="address">  Address:  </label>
                    </div>


                    <div class="form-group col-12 col-md-4">
                        <input type="text" name="address" class="form-control" id="address"
                            value="{{ $setting->website_name }}" required>
                    </div>



                </div>




                   <div class="row mt-4">

                    <div class="form-group col-12 col-md-1">
                        <label for="kitchen_printer_id">  Kitchen Printer:  </label>
                    </div>

                    <div class=" form-group col-12 col-md-4">
                          <select name="kitchen_printer_id" class="form-control" id="kitchen-printer" required>
                            @foreach ($printers as $printer)

                            <option
                            @if ($setting->kitchen_printer_id == $printer->id)
                                selected
                            @endif
                            value="{{ $printer->id }}">{{ $printer->name }}</option>
                            @endforeach
                          </select>
                    </div>



                    <div class="form-group col-12 col-md-1">
                        <label for="bill-printer">  Bill Printer:  </label>
                    </div>


                    <div class="form-group col-12 col-md-4">
                          <select name="bill_printer_id" class="form-control" id="bill-printer" required>
                            @foreach ($printers as $printer)
                            <option
                           @if ( $setting->bill_printer_id == $printer->id)
                               selected
                           @endif
                            value="{{ $printer->id }}">{{ $printer->name }}</option>
                            @endforeach
                          </select>
                    </div>



                </div>





                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </div>
            </div>

            </form>

    </div>





@endsection