@extends('includes.app')

@section('content')

<div class="visible-print text-center pt-5">
     {!! QrCode::size(100)->generate('https://github.com/sourovahmad'); !!}
     <p>Scan me to return to the Menu</p>
 </div>



    </div>
</div>


@endsection