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
            <h2>Your Orders</h2>
        </div>

        @foreach ($orders as $order)

        <div class="billItems">

            <div class="item">
                <div class="itemCount">
                    <i>X{{ $order->quantity }}</i>
                </div>
                <div class="itemName">
                    <h5>{{ $order->products->name }}</h5>
                </div>
                <div class="totalCost">
                    <b>${{ $order->products->price }}</b>
                </div>
            </div>


        </div>

        @endforeach


        <div class="subTotal">
            <div class="total">
                <div class="price">
                    <h5>Your Total Bill is: </h5>
                </div>
                <div class="amount">
                    <b>${{ $totalPrice }}</b>
                </div>
            </div>
        </div>
    </section>



    <!-- The Footer start here -->
    <footer class="userFooter">

        <div class="iconBox">


            <a href="{{ $requestedTable->table_url }}">

                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="iconName">
                    <h6>Menu</h6>
                </div>
            </a>
        </div>

        <div class="iconBox">


            <a>


                <div class="icon">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <div class="iconName">
                    <h6>Bill</h6>
                </div>
            </a>
        </div>

        <div class="iconBox">

            <a id="orderPageLink" href="{{ route('orders', $requestedTable->id) }}">

                <div class="icon position-relative">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger iconSectionForbadge">
                        <span id="total_orderd_item"> {{ $tableOrderLimit->total_orderd }}</span>/ <span
                            id="total_order_limit">{{ $tableOrderLimit->order_limit }} </span>

                    </span>
                    <i class="fas fa-bell"></i>


                </div>
                <div class="iconName">
                    <h6>Order </h6>
                </div>
            </a>
        </div>

        <div class="iconBox">


            <div class="iconBox" onclick="theAppend()">
                <a>
                    <div class="icon">
                        <i class="fas fa-user-alt"></i>
                    </div>
                    <div class="iconName">
                        <h6>Service</h6>
                    </div>
                </a>
            </div>
        </div>

    </footer>





 <script>


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