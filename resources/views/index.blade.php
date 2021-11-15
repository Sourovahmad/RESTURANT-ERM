@extends('includes.app')

@section('content')
<div class="container mt-5">
    <div class="col">
        <div class="text-center">
{!! QrCode::size(230)->generate("RUMAN MIAH, 17419806622,1701, 2017-18, BANGLA, ENGLISH, POLITICAL SCIENCE, ISLAMIC STUDIES, ISLAMIC STORY")    !!}
        </div>
    </div>
</div>


@endsection
 