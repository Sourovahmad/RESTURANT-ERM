@extends('includes.app')

@section('content')


 @foreach ($table as $single)
    {{ $single->products[0]->name }}
 @endforeach

@endsection