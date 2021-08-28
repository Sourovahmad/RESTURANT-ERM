
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ config('app.name', 'LearnEdu') }}</title>

        <script defer src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('bootstrape/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('slick/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/product.css') }}" />


        @yield('customCSS')






        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('slick/slick.min.js')}}"></script>
        @yield('customjs')

    </head>
    <body>

        {{-- @include('includes.navbar') --}}



        @yield('content')



        {{-- @include('includes.footer') --}}

    </body>
</html>
