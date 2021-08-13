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

            <div class="container">
                <div class="row">


                    <div class="col-sm-12 col-md-4">
                      Website Name:
                    </div>


                    <div class="col-sm-12 col-md-4">
                       <input class="form-control" type="text" name="website_name" id="" value="{{ $setting->website_name }}" required>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </div>
            </div>

            </form>

        </div>
    </div>





@endsection