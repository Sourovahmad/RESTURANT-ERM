@extends('includes.app')

@section('content')



<section class="question_area">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <div class="question_content">
                    <span>QUIZ</span>
                    <h1>Sharks</h1>
                    <p>Sink your teeth into this quiz all about sharks.</p>
                    <hr>


                    <div class="question_part">
                        <div class="question_pcon">
                            <span class="qpcspan">1/10</span><br>
                            <a style="margin-top: 20px; font-family: 'Lato', sans-serif; font-weight: 600; color: #000; background: #fff; border: none; padding: 10px 10px;"
                                class="float-right btn btn-primary" href="#">Next Question</a>
                            <h2>Which is the largest of all sharks?</h2>


                            <img class="qpimg" src="{{ asset('images/Sharks.jpg') }}" alt="learnedu">

                            <div class="radio_container">
                                <input type="radio" id="shark" name="sh" class="radio_input">
                                <label for="shark" class="radio_label"> Great White Shark</label>
                                <br>
                                <hr>
                                <input type="radio" id="whale" name="sh" class="radio_input">
                                <label class="radio_label" for="whale"> Whale Shark</label>
                                <br>
                                <hr>
                                <input type="radio" id="bull" name="sh" class="radio_input">
                                <label class="radio_label" for="bull"> Bull Shark</label>
                                <br>
                                <hr>
                                <input type="radio" id="tiger" name="sh" class="radio_input">
                                <label class="radio_label" for="tiger"> Tiger Shark</label>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="queLastCon">
                        <p>PHOTO CREDITS: DAVID DOUBLIET; ONAIA, DREAMSTIME; DREAM69, DREAMSTIME; JONMILNES,
                            DREAMSTIME; JAGRONICK, DREAMSTIME; FIONA AYERST, DREAMSTIME; VLADISLAV GAJIC,
                            DREAMSTIME; RUTH BLACK, DREAMSTIME; SOREN EGEBERG, DREAMSTIME; PETERNILE, DREAMSTIME;
                            FRANTISEKHOJDYSZ, SHUTTERSTOCK; ALL OTHERS, PIXABAY</p>
                        <div class="line"></div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- question_area end -->
<section class="moregames_area">

    <div class="container">
        <div class="row">
            <div class="more_contect">
                <h2>MORE GAMES!</h2>
            </div>
            <a class="moreancor" href="#">
                <div class="row">
                    <div class="col-md-8">
                        <div class="moreimg">
                            <img class="img-fluid w-100" src="{{ asset('images/quizwhiz_ngkhub_3x2 (1).webp') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="more_content2">
                            <h2>Quizzes</h2>
                            <span>Test your smarts with these fun quizzes <br> about frogs, holidays, and
                                more!</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
<!-- moregames_area end -->
<div class="moregame_part2">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a class="morep2ancor" style="display: flex;" href="#">
                    <img src="{{ asset('images/more1.webp') }}" alt="">
                    <span>Funny Fill-Ins</span>
                    <hr>
                </a>
            </div>
            <div class="col-md-4">
                <a class="morep2ancor" style="display: flex;" href="#">
                    <img src="{{ asset('images/more2.webp') }}" alt="">
                    <span>Action and Adventure</span>
                </a>
            </div>
            <div class="col-md-4">
                <a style="display: flex; " href="#">
                    <img src="{{ asset('images/more3.webp') }}" alt="">
                    <span>Personality quizzes</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- moregame_part2 area end -->








@endsection
