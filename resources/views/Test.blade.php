@foreach ($data as $key => $value)

@if ($key > 0)
@if ($key != 'table_id')
{{ $key }} {{ $value }} <br>
@endif

@endif






@endforeach
