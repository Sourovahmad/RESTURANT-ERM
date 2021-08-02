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
        <div class="theTopImages">
            <img src="images/pexels-engin-akyurt-2673353.jpg" alt="">
        </div>
    </header>

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



    <section class="bills">
        <div class="billTitle">
            <h2>Your Bills</h2>
        </div>

        <div class="billItems">

            <div class="item">
                <div class="itemCount">
                    <i>X1</i>
                </div>
                <div class="itemName">
                    <h5>Chicken Biriyani</h5>
                </div>
                <div class="totalCost">
                    <b>8$</b>
                </div>
            </div>

            <div class="item">
                <div class="itemCount">
                    <i>X1</i>
                </div>
                <div class="itemName">
                    <h5>Chicken Biriyani</h5>
                </div>
                <div class="totalCost">
                    <b>8$</b>
                </div>
            </div>

            <div class="item">
                <div class="itemCount">
                    <i>X1</i>
                </div>
                <div class="itemName">
                    <h5>Chicken Biriyani</h5>
                </div>
                <div class="totalCost">
                    <b>8$</b>
                </div>
            </div>

            <div class="item">
                <div class="itemCount">
                    <i>X1</i>
                </div>
                <div class="itemName">
                    <h5>Chicken Biriyani</h5>
                </div>
                <div class="totalCost">
                    <b>8$</b>
                </div>
            </div>

            <div class="item">
                <div class="itemCount">
                    <i>X1</i>
                </div>
                <div class="itemName">
                    <h5>Chicken Biriyani</h5>
                </div>
                <div class="totalCost">
                    <b>8$</b>
                </div>
            </div>

            <div class="item">
                <div class="itemCount">
                    <i>X1</i>
                </div>
                <div class="itemName">
                    <h5>Chicken Biriyani</h5>
                </div>
                <div class="totalCost">
                    <b>8$</b>
                </div>
            </div>
        </div>

        <div class="subTotal">
            <div class="total">
                <div class="price">
                    <h3>Your Total Bill is: </h3>
                </div>
                <div class="amount">
                    <b>35$</b>
                </div>
            </div>
        </div>
    </section>







 <script>

// the home page funtions



 </script>



@endsection