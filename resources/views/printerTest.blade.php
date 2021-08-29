<form action="{{ route('printerInput') }}" method="POST">
    @csrf
    <input type="text" name="name" id="">
    <button type="submit">print</button>
</form>
