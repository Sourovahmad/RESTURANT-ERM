@extends('includes.app')

@section('content')

    <header class="userMenuePageHeader">
        <nav>
            <div class="hamBurgerIcon">
                <i onclick="theAppend()" class="fas fa-bars"></i>
            </div>
            <div class="theHeadLine">
                <h5>Royal Fook Long Amsterdam - 53</h5>
            </div>
        </nav>
    </header>
    <!-- the append section here -->
    <section class="theAppentSection">
        <div class="containerc">
            <div class="topIconSection">
                <i onclick="theAppendRemove()" class="fas fa-times"></i>
            </div>
            <div class="theAppendBody">
                <ul>
                    <li><a href="">IK WILL GRAAG EEN OBER</a></li>
                    <li><a href="">WASBI</a></li>
                    <li><a href="">GEMBER</a></li>
                    <li><a href="">SOYASAUS</a></li>
                    <li><a href="">LEAVE LOCATION</a></li>
                    <li><a href="">PRIVACY POLICY</a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- the main service section here -->

    <section class="theServiceSection">

        <div class="servicesTitle">
            <h2>Choose a service</h2>
        </div>

        <div class="allServices">
            <button class="service">
                <h4>Call for bil</h4>
            </button>

            <button class="service" id="needExtraSauseButton">
                <h4>Need extra soya sause</h4>
            </button>

            <button class="service">
                <h4>Call for bil</h4>
            </button>

            <button class="service">
                <h4>Need extra soya sause</h4>
            </button>

            <button class="service">
                <h4>Call for bil</h4>
            </button>

            <button class="service">
                <h4>Need extra soya sause</h4>
            </button>
        </div>
    </section>


    <section class="theOrderPopUp">
        <div class="allContentsOrder">
            <div class="theDesc">
                <p class="font-weight-bold text-dark">Are You Sure Want To Send The Following ?</p>
            </div>
            <div class="theOrderAlert">
                <h5>Gimber</h5>
            </div>
            <div class="orderChangerBtn">
                <button id="ServiceHiderButton">Ok</button>
            </div>
        </div>
    </section>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Order Services</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    <section class="theServiceSection">

        <div class="servicesTitle">
            <h2>Choose a service</h2>
        </div>

        <div class="allServices">
            <button class="service">
                <h4>Call for bil</h4>
            </button>

            <button class="service" id="needExtraSauseButton">
                <h4>Need extra soya sause</h4>
            </button>

            <button class="service">
                <h4>Call for bil</h4>
            </button>

            <button class="service">
                <h4>Need extra soya sause</h4>
            </button>

            <button class="service">
                <h4>Call for bil</h4>
            </button>

            <button class="service">
                <h4>Need extra soya sause</h4>
            </button>
        </div>
    </section>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
    <script>
        $(document).ready(function() {

            $('#needExtraSauseButton').on('click', function() {

                $('.theOrderPopUp').addClass('theProductShow');

            })

            $('#ServiceHiderButton').on('click', function() {

                $('.theProductShow').removeClass('theProductShow');

            })


        });


        function theAppend() {
            var theElement = document.querySelector(".theAppentSection");
            theElement.classList.add("theAppendCome");
        }

        function theAppendRemove() {
            var theElement = document.querySelector(".theAppentSection");
            theElement.classList.remove("theAppendCome");
        }
    </script>

@endsection
