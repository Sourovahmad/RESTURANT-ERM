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
    @if (is_array(session('success')))
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

    <section class="traySection">
        <div class="theTitle">
            <h3>Your Tray</h3>
        </div>

        <div class="allTrayItems">

        @foreach ($tableData as $table)

            <div class="trayItem">
                <div class="quantity">
                    <div class="minus">
                        <button>-</button>
                    </div>
                    <div class="number">
                        <h5>1</h5>
                    </div>
                    <div class="plus">
                        <button>+</button>
                    </div>
                </div>

                <div class="productName">
                    <h5>{{ $table->products[0]->name }}</h5>
                </div>


                   <div class="plus">
                       <a href="{{ route('deleteOrder',$table->id) }}">
                        <button id="deleteButtonForOrderPage" >Delete</button>
                    </a>
                    </div>


            </div>

        @endforeach

        </div>
    </section>


    <section class="subTotalAndOrderBtn">
            <div class="theSubTotal">
                <h5>Subtotal: $5.50</h5>
            </div>
            <div class="theOrderButton">
                <button class="theOrderStarter" onclick="theOrderPopUpShow()">SEND ORDER</button>
            </div>
    </section>

    <!-- the order page pop up -->

    <section class="theOrderPopUp">
        <div class="allContentsOrder">
            <div class="theDesc">
                <p></p>
            </div>
            <div class="theOrderAlert">
                <h5></h5>
            </div>
            <div class="orderChangerBtn">
                <button onclick="theOrderPopUpHide()"></button>
            </div>
        </div>
    </section>



        <!-- The Footer start here -->
    <footer class="userFooter">

        <div class="iconBox">
            <a href="../index.html">
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="iconName">
                    <h6>Menu</h6>
                </div>
            </a>
        </div>

        <div class="iconBox">
            <a href="service.html">
                <div class="icon">
                    <i class="fas fa-user-alt"></i>
                </div>
                <div class="iconName">
                    <h6>Service</h6>
                </div>
            </a>
        </div>

        <div class="iconBox" >
            <a href="order.html">
                <div class="icon">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="iconName">
                    <h6>Order</h6>
                </div>
            </a>
        </div>

        <div class="iconBox">
            <a href="bill.html">
                <div class="icon">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <div class="iconName">
                    <h6>Bill</h6>
                </div>
            </a>
        </div>
    </footer>



 <script>

// the home page funtions
let addToOrder = document.querySelector("button.addToOrder");



// the order page functions
var theNumber = 15;

function theOrderPopUpShow(theNumberChanger) {
    theNumber = 15;
    var theOrderPopUp = document.querySelector(".theOrderPopUp");
    var p = document.querySelector(".theOrderPopUp .theDesc p");
    var h5 = document.querySelector(".theOrderPopUp .theOrderAlert h5");
    var button = document.querySelector(
        ".theOrderPopUp .orderChangerBtn button"
    );
    function theNumberChanger() {
        theNumber--;
        if (theNumber > 0) {
            p.innerHTML =
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. A, inventore.";
            h5.innerHTML = `The Order will be started in ${theNumber} seconds`;
            button.innerHTML = "Change Order";
        } else {
            p.innerHTML = "Success!";
            h5.innerHTML = "Your Order Has Been Placed";
            button.innerHTML = "Thank You";
        }
    }
    theOrderPopUp.classList.add("theProductShow");

    var setIt = setInterval(theNumberChanger, 1000);

    var changeOrderBtn = document.querySelector(".orderChangerBtn");
    changeOrderBtn.addEventListener("click", function () {
        clearInterval(setIt);
    });
}



// all page append section function

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