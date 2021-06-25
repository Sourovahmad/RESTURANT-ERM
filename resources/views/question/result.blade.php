@extends('includes.app')

@section('customCSS')

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

@endsection 

@section('content')

<section id="result-page">
<nav class="hnazmul-navbar">
            <div class="hnazmul-navbar-container ">
                <div class="hnazmul-nav-brand col-10 col-lg-7 row align-items-center ">
                   
                    <h4 class="col-6" >{{ config('app.name', 'LearnEdu') }}</h4>
                    
                    <h2 class="col-6 text-center text-lg-end">Result</h2>
                </div>
                <div class="hnazmul-nav-toggle-btn">
                    <button><img class="toggler-btn" src="images/toggler-icon.svg" alt="" /></button>
                </div>

                <div class="hnazmul-navbar-content">
                    <div class="hnazmul-navbar-content-wrapper">
                        <ul class="navbar-list align-items-center">
                           
                            <li class="navbar-list-item">
                                <div href="#" class="navbar-list-link p-0">
                                <div id="hnazmul-toogle-content-area">
                                            <div class="hnazmul-toggler-icon">
                                                <span class="iconify" data-icon="carbon:user-avatar-filled-alt" data-height="40px" data-inline="false"></span>
                                            </div>
                                            <div class="hnazmul-toggler-content">
                                                <nav class="nav flex-column">

                                                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{{ auth()->user()->name }}</a> -->
                                                    <div class="dropdown-divider"></div>
                                                    <a class="nav-link active" aria-current="page" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">Logout</a>
                                                   
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                </nav>
                                            </div>
                                        </div>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-closer-icon">
                            <img class="navbar-closer" src="images/times-navbar-clouser-icon.svg" alt="" />
                        </button>
                    </div>
                </div>
            </div>
        </nav>


        <div class="container mb-5">
            <div class="result-box">
                <div class="row p-1 p-md-3 align-items-center">
                    <div class="col-6 px-0 px-md-2">
                        <ul class="p-0 list-unstyled mark-list ps-lg-3">
                            <li class="">Your score      : {{ $result['points']}}</li>
                            <li class="">total questions : {{ $result['total_question']}}</li>
                            <li class="">Correct answer  : {{$result['correct_answer']}}</li>
                            <li class="">Wrong answer    : {{$result['wrong_answer']}}</li>
                        </ul>
                    </div>
                    <div class="col-6 px-0 px-md-2 py-3">
                        <div class="bee-flip-right-resultBox" >
                            <img class="img-fluid" src="images/bee-logo.png" alt="" >
                        </div>
                        @if( $paid)
                        <a href="{{ route('analysis') }}" style="text-decoration: none;">
                        <button class="analytics mt-3 ">analysis</button>
                        </a>
                        @else
                        <button class="analytics mt-3 "  data-toggle="modal" data-target="#priceModal">analysis</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mx-auto justify-content-center mt-5 ">
                <div class="col-5 text-center">
                    <h2 class="reverse-text">Thank Your</h2>
                </div>
                <div class="col-5 text-center">
                    <a href="{{route('home')}}">
                    <button class="theme-btn rounded px-5">Go Home</button></a>
                </div>
            </div>
        </div>    
</section>




@endsection

@section('customjs')

        <script>


        </script>

@endsection 