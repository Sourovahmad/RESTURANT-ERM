@extends('admin.layouts.app')

@section('content')

<p> hello this is admin</p>

{!! QrCode::size(200)->generate('sourovahamd.netlify.app'); !!}


@endsection