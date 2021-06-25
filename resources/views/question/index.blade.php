@extends('includes.app')

@section('customCSS')

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="{{ asset('css/question.css') }}" />

@endsection 

@section('content')

<header id="header-part-page-2" style="background: rgb(12, 136, 109);">
<nav class="hnazmul-navbar">
                <div class="hnazmul-navbar-container">
                    <div class="hnazmul-nav-brand d-flex align-items-center">
                        <h4>{{ config('app.name', 'LearnEdu') }}</h4>
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
                                <li class="navbar-list-item ms-lg-3">
                                    <div href="#" class="navbar-list-link p-0">
                                        <p class="small m-0">{{ auth()->user()->name }}</p>
                                        <p class="small m-0">Score: <span id="score">{{ $score }}</span> </p>
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


</header>



@foreach($questions as $question)

@if(!is_null( $question->answer))
    @continue
@endif

<section class="question-header">
        <div class="total-page">
            <div class="topsection">
                <div class="category">
                    <h4>Category: {{$question->question->category->name }}</h4>
                </div>
                <div class="audio-mute-button">
                    <div class="ion">
                        <i class="fas fa-volume-mute"></i>
                    </div>
                </div>
            </div>
            <div class="qt-section">
                <div class="qt" id="question" question-serial='{{$question->serial_no}}' question-id='{{$question->id}}'><h2 id="question-h1">{{ $question->serial_no . ". ". $question->question->question }}?</h2></div>
                <div class="options-and-img">

                    
                    <div class="qt-related-img" id="question-image-section">
                        @if(!is_null($question->question->image))
                        <img class="image-or-video qt-image" src="{{ asset($question->question->image ) }}" alt="question">
                        @endif

                        @if(!is_null($question->question->video))
                        <video class="image-or-video qt-video" src="{{ asset($question->question->video ) }}" controls></video>
                        @endif
                    </div>
                     <!-- all the answers -->
                    <div class="qt-answers responsive-flex">
                        <div class="qt-option qt1" data-answer='A'>
                            <div class="qt-number"><h1>A</h1></div>
                            <div class="qt-ans"><h3 id="option-a">{{ $question->question->options[0]->option }}</h3></div>
                        </div>
                        <div class="qt-option qt2" data-answer='B'>
                            <div class="qt-number"><h1>B</h1></div>
                            <div class="qt-ans"><h3 id="option-b">{{ $question->question->options[1]->option }}</h3></div>
                        </div>
                        <div class="qt-option qt3" data-answer='C'>
                            <div class="qt-number"><h1>C</h1></div>
                            <div class="qt-ans"><h3 id="option-c">{{ $question->question->options[2]->option }}</h3></div>
                        </div>
                        <div class="qt-option qt4" data-answer='D'>
                            <div class="qt-number"><h1>D</h1></div>
                            <div class="qt-ans"><h3 id="option-d">{{ $question->question->options[3]->option }}</h3></div>
                        </div>
                    </div>
                    <div class="submit-and-next-buttons ">
                        <div class="button">
                            <button class="submitButton disabled" style="float: right;"  disabled> SUBMIT</button>
                        </div>
                        
                    </div> 
                </div>
            </div>
        </div>
    </section>

    @break
@endforeach

    <audio id="myAudio" src="{{ asset('audio/audio.mp3') }}"></audio>



    <form action="{{ route('check-answer') }}" method="POST" id="hidden-form">
    @csrf
        <input type="text" name="student_has_question_id" id="modal-hiden-question-id" hidden>
        <input type="text" name="answer" id="modal-hiden-answer" hidden>
    </form>





<!-- Attachment Modal -->

<div class="modal " id="check-answer-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title text-dark">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body text-center">
        <h2 class="text-dark text-center" id="modal-answer-status"></h2>
        <p class="text-dark text-center" id="modal-answer-details"></p>
        <div id="modal-image-video-section"></div>
        <button type="button" class="nextBtn" data-dismiss="modal">NEXT</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('customjs')

        <script>


// the audio control here
const audioOne = document.querySelector('audio');
document.getElementById("myAudio").loop = true;
const stopeR = document.querySelector('.audio-mute-button')
    function playUd(){
        audioOne.play()
        stopeR.addEventListener('click', function(){
            audioOne.pause()
        })
    }
playUd()

// qt option color changer


var loopElements = document.querySelectorAll('.qt-option');

loopElements.forEach(function(x){
    x.addEventListener('click', function(){
        for(var i = 0; i <= loopElements.length; i++){
            if(loopElements[i].classList.contains('bg-color-changer')){
                loopElements[i].classList.remove('bg-color-changer');
                x.classList.add('bg-color-changer')
            }
            else{
                x.classList.add('bg-color-changer')
            }
        }
    })
})


// the pop us msg here

const theBox = document.querySelector('.thePopUp')
var theTitleDiv = document.querySelector('.theMsg')
var theBtnDiv = document.querySelector('.theBtn')

const submitButton = document.querySelector('.submitButton')
const theBoxCss = {
    width: '300px',
    height: '200px',
    background: '#fff',
    padding: '25px',
    position: 'fixed',
    margin: 'auto',
    top: '0',
    bottom: '0',
    left: '0',
    right: '0',
    opacity: '1 !important',
    transition: '0.8s'
}
const theTitleCss = {
    color: '#00393b',
    fontWeight: '600' 
}
submitButton.addEventListener('click', function(){
    // the popUp title here here
    var theTitle = document.createElement('h2')
    theTitle.style.display = 'block'
    var theMgsTxt = document.createTextNode('Correct Answer')
    theTitle.appendChild(theMgsTxt);
    theTitleDiv.appendChild(theTitle)
    Object.assign(theBox.style, theBoxCss)
    Object.assign(theTitle.style, theTitleCss)

    // thepopup btn here
    var theOkButton = document.createElement('button')
    theOkButton.innerHTML = 'OK';
    theOkButton.style.margin = '50px 0';
    theBtnDiv.appendChild(theOkButton);
    theOkButton.addEventListener('click', function(){
        theBox.style.opacity = '0'
    })
})



        $(document).ready(function(){
            var questions = @json($questions);
            var score = @json($score);
            var last_index = @json($last_index);
            var category = @json($category);
            var date = @json($date);
            var current_index = $('#question').attr('question-serial');

            var index_route = "{{ route('index') }}";
            console.log(questions)
            current_index--;
            var answer,question_id;

            $('.qt-option').on('click',function(){
                answer = $(this).attr('data-answer');
                question_id = $('#question').attr('question-id');
                $('.submitButton').removeClass('disabled');
                $('.submitButton').prop('disabled', false);

                $('#modal-hiden-answer').val(answer);
                $('#modal-hiden-question-id').val(question_id);
            });


            $('.submitButton').on('click',function(){
                
                $('.submitButton').addClass('disabled');
                $('.submitButton').prop('disabled', true);

                var options = {
                'backdrop': 'static'
                };
                $('#check-answer-modal').modal(options);
            });


        // on modal show
        $('#check-answer-modal').on('show.bs.modal', function () {
            var data= $('#hidden-form').serialize();
            console.log(data);
            var url = $('#hidden-form').attr('action');
            $.ajax({
                url: url,
                type: "post",
                data: data,
                success: function(data){
                    $('#modal-answer-status').text(data.status);
                    $('#modal-answer-details').text(data.answer);
                    if(data.status == 'Correct Answer'){
                        score = score + 10;
                        $('#score').text(score);
                    }
                    html = '';
                    if(data.image){
                        html+= '<img class="modal-answer-image" src="'+index_route+ '/'+data.image+'" alt="answer">';
                    }
                    if(data.video){
                        html += '<video class="image-or-video qt-video" src="'+index_route+ '/'+data.video+'" controls></video>';
                    }
                    $('#modal-image-video-section').html(html);

                },
                error: function (jqXHR, exception) {
                    console.log(jqXHR);
                    // Your error handling logic here..
                }
            });




        });

        


        // on modal shown
        $('#check-answer-modal').on('shown.bs.modal', function () {
            console.log(current_index , last_index)
            current_index = current_index +1 ;
            if(current_index <= last_index){
                
                var current_question = questions[current_index];
                $('#question').attr('question-serial', current_question.serial_no);
                $('#question').attr('question-id', current_question.id);
                $('#question-h1').text( current_question.serial_no + ". " + current_question.question.question + '?');

                html = '';
                if(current_question.question.image){
                    html+= '<img class="image-or-video qt-image" src="'+index_route+ '/'+current_question.question.image+'" alt="Question">';
                }
                if(current_question.question.video){
                    html += '<video class="modal-answer-image" src="'+index_route+ '/'+current_question.question.video+'" controls></video>';
                }
                $('#question-image-section').html(html);

                $('#option-a').text(current_question.question.options[0].option);
                $('#option-b').text(current_question.question.options[1].option);
                $('#option-c').text(current_question.question.options[2].option);
                $('#option-d').text(current_question.question.options[3].option);
                $('.bg-color-changer').removeClass('bg-color-changer');





            }
        });

        // on modal hide
        $('#check-answer-modal').on('hide.bs.modal', function () {
            console.log(current_index, last_index);
            if(current_index > last_index){
                var redirect_location = index_route + '/result?category='+category +'&date=' + date;
                window.location.href = redirect_location;
            }
        });





        });
        </script>

@endsection 