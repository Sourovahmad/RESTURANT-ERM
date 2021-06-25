
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ config('app.name', 'LearnEdu') }}</title>


        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <script defer src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/price.css') }}" />


        @yield('customCSS')

    </head>
    <body >

        @yield('content')

 
        @include('includes.footer')
        <!-- all script tags here -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        @yield('customjs')

    </body>
</html>
