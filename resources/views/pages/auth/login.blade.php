
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
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
        
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>


  
    </head>
    <body id="fullSection" >



<section class="login-register-otp pt-5 pb-5">

    <div class="newloginform">



    <form action="" method="get" id="loginForm">
        <h1>Login</h1>


        <div class="email">
            <input type="email" name="" id="" placeholder="Email">
        </div>

        <div class="password">
            <input type="password" placeholder="Password">
        </div>

        <div class="send-btn text-center">
            <button class="btn-md" type="submit" > Login </button>
        </div>
    </form>


    </div>





</section>

    </body>
</html>
