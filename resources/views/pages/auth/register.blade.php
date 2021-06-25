


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



        <form action="{{route('registerPost')}}" method="post" id="loginForm">
            @csrf
            <h1>Register Now</h1>


            <div class="by-two">
                <div class="item-by-two">
                    <input type="text" placeholder="First Name" name="first_name"   value="{{old('first_name') }}"  required>
                </div>

                <div class="item-by-two">
                    <input type="text" placeholder="Last Name" name="last_name" value="{{old('last_name') }}"  required>
                </div>
            </div>


            <div class="by-one-half">
                <div class="item-by-half">
                    <input type="text"  name="country_code"  value="+91" readonly >
                </div>

                <div class="item-by-one-half">
                    <input type="tel" placeholder="Parent's Phone" name="parent_phone" value="{{old('parent_phone') }}"  required>
                </div>
            </div>

            <div class="by-three form-group">
                <div class="item-by-three">
                    <!-- <input type="number" placeholder="Birth date" name="" id=""> -->
                    <select name="birth_date" required>
                        <option disabled selected value>Birth Date</option>
                        @for($i =1; $i<= 31 ;$i++)
                        <option  value='{{$i}}'>{{$i}}</option>
                        @endfor 
                    </select>
                </div>

                <div class="item-by-three">
                    <select name="birth_month" required>
                        <option disabled selected value>Birth Month</option>
                        <option  value='01'>January</option>
                        <option  value='02'>February</option>
                        <option  value='03'>March</option>
                        <option  value='04'>April</option>
                        <option  value='05'>May</option>
                        <option  value='06'>June</option>
                        <option  value='07'>July</option>
                        <option  value='08'>August</option>
                        <option  value='09'>September</option>
                        <option  value='10'>October</option>
                        <option  value='11'>November</option>
                        <option  value='12'>December</option>
                        
                    </select>
                </div>

                <div class="item-by-three">
                    <select name="birth_year" required>
                        <option disabled selected value>Birth Year</option>
                        @for($i = now()->format("Y") ; $i>= 1970 ;$i--)
                        <option  value='{{$i}}'>{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="country">
                <input type="text" placeholder="Your School" name="school" value="{{old('school') }}" >
            </div>

            <div class="email">
                <input type="email" name="email" id="" placeholder="Enter Your Email"  required autocomplete="off"  value="{{old('email') }}">
            </div>

            <div class="by-two">
                <div class="item-by-two">
                    <input type="password" placeholder="Password" name="password" required autocomplete="off" >
                </div>

                <div class="item-by-two">
                    <input type="password" placeholder="Confirm Password" name="password_confirmation"  required > 
                </div>
            </div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session()->has('success'))
<div class="alert alert-success">
    @if(is_array(session('success')))
    <ul>
        @foreach (session('success') as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    @else
    {{ session('success') }}
    @endif
</div>
@endif


            <div class="send-btn text-center">
                <input class="btn-md" type="submit"  value="Register"/>
            </div>
        </form>


        </div>





    </section>

    </body>
</html>
