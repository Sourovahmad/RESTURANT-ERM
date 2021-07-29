@extends('admin.layouts.app')

@section('content')


{!! QrCode::size(200)->generate('sourovahamd.netlify.app'); !!}


@endsection