@extends('errors.includes.app')


@section('content')



<div class="container">
    <div class="row">
        <div class="text-center">
            <h4>table not found with:  {{ $myid }}</h4>
            <p>Maybe you Type mistake or scan the QrCode </p>
        </div>
    </div>
</div>

@endsection