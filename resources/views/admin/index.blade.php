@extends('admin.layouts.app')

@section('content')

<p> hello this is admin</p>

{!! QrCode::size(120)->generate('codingdriver.com'); !!}


@endsection