@extends('includes.app')
@section('content')




<header id="contactUsHeader">
    <div class="contactheader">
        <div class="txts">
            <h1>Contact Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur <br/>adipisicing elit. Animi, repudiandae.</p>
        </div>
        <div class="img">
            <img src="{{ asset('images/contactus/group.1808db14.png') }}" alt="learnedu">
        </div>
    </div>
</header>

<section class="the-form-section">
    <div class="contents">

            <form action="" method="get" id="ContactUsform">
                <h1>Contact Us</h1>
                <div class="names">
                    <input type="text" placeholder="Enter Your Name">
                </div>

                <div class="email">
                    <input type="email" name="" id="" placeholder="Enter Your Email">
                </div>



                <div class="text-area">
                    <textarea name="" id="" cols="30" rows="5" placeholder="Enter Your Message"></textarea>
                </div>
                <div class="send-btn">
                    <input type="submit" value="Send Value">
                </div>
            </form>

            <div class="img">
                <img src="{{ asset('images/contactus/93-933568_ginger-talking-tom-and-friends-ginger.png') }}" alt="learnedu">
            </div>
    </div>
    <h2>Find Us On</h2>
    <div class="social-icons">
        <div class="icon">
            <i  class="fab fa-facebook-f"></i>
        </div>

        <div class="icon">
           <i class="fab fa-youtube"></i>
        </div>

        <div class="icon">
            <i  class="fab fa-twitter"></i>
        </div>

        <div class="icon">
            <i  class="fab fa-linkedin-in"></i>
        </div>

    </div>
</section>


@endsection