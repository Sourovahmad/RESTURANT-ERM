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

                    <li class="navbar_service_need" data-service-name="need_waiter"><a>IK WILL GRAAG EEN OBER</a></li>
                    <li class="navbar_service_need" data-service-name="need_bill"><a>Bill</a></li>
                    <li class="navbar_service_need" data-service-name="need_wasabi"><a>Wasabi</a></li>
                    <li class="navbar_service_need" data-service-name="need_gember"><a>GEMBER</a></li>
                    <li class="navbar_service_need" data-service-name="need_soyasauce"><a>SOYASAUS</a></li>

                </ul>
            </div>
        </div>
    </section>




    <section class="traySection">
        <div class="theTitle">
            <h3>Your Tray</h3>
        </div>

        <div class="allTrayItems">



            @if ($tableData->count() != 0)
                @foreach ($tableData as $table)


                    <div class="trayItem">
                        <div class="quantity">
                            <div class="minus">
                                <button data-item-id="{{ $table->id }}"
                                    data-item-price="{{ $table->products[0]->price }}"
                                    class="quantityMinusButton">-</button>
                            </div>
                            <div class="number">
                                <h5 id="currentQuantity_{{ $table->id }}">{{ $table->quantity }}</h5>
                            </div>
                            <div class="plus">
                                <button data-item-id="{{ $table->id }}"
                                    data-item-price="{{ $table->products[0]->price }}"
                                    class="quantityPlusButton">+</button>
                            </div>
                        </div>


                        <div class="productName">
                            <h5>{{ $table->products[0]->name }}</h5>
                        </div>



                        <div class="plus">
                            <h5>${{ $table->products[0]->price }}</h5>
                        </div>


                        <div class="plus">
                            <a href="{{ route('deleteOrder', $table->id) }}">
                                <button id="deleteButtonForOrderPage" style="border:none"
                                    class="text-danger font-weight-bold"> <span><i class="fas fa-trash"></i></span></button>
                            </a>
                        </div>


                    </div>

                @endforeach

            @else

                <p class="m-4"> looks like there is no Product in Cart. Add some and Order</p>
            @endif


        </div>
    </section>


    <section class="subTotalAndOrderBtn">
        <div class="theSubTotal">
            <h5 id="">Subtotal: $<span id="subtotalPriceOfAll">{{ $totalPrice }} </span> </h5>
        </div>
        @if ($tableData->count() != 0)
            <div class="theOrderButton">
                <button class="theOrderStarter" onclick="theOrderPopUpShow()">SEND ORDER</button>
            </div>
        @endif

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
            <a href="bill.html">
                <div class="icon">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <div class="iconName">
                    <h6>Bill</h6>
                </div>
            </a>
        </div>


        <div class="iconBox">
            <a href="#">
                <div class="icon">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="iconName">
                    <h6>Order (<span id="total_orderd_item"> {{ $tableOrderlimit->total_orderd }}</span> / <span
                            id="total_order_limit">{{ $tableOrderlimit->order_limit }} </span> ) </h6>
                </div>
            </a>
        </div>
        <div class="iconBox" onclick="theAppend()">
            <a>
                <div class="icon position-relative">
                    <i class="fas fa-user-alt"></i> <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                99+
                <span class="visually-hidden">unread messages</span>
            </span>
                </div>
                <div class="iconName">
                    <h6>Service</h6>

                </div>
            </a>
        </div>

       

    </footer>

    {{-- *********************** All popUp SMS**************************** --}}

    {{-- popup for order limitCross --}}
    <section class="theOrderPopUp" id="PopupForOrderLimitCross">
        <div class="allContentsOrder">
            <div class="theDesc">
                <p>You Have Reached The limit of Order For This Round</p>
            </div>
            <div class="theOrderAlert">
                <h5></h5>
            </div>
            <div class="orderChangerBtn">
                <button onclick="theOrderPopUpHide()">OK</button>
            </div>
        </div>
    </section>


    {{-- ************** All hidden Forms ********************* --}}
    <form id="form_for_tableHasProduct" hidden>

        @csrf

        <input type="text" name="table_product_id" id="id_for_tablehasproduct_update">
        <input type="text" name="quantity" id="quantity_for_tablehasproduct_update">
        <input type="text" name="table_id" value="{{ $table_id }}">
        <input type="text" name="request_for" id="request_for" value="addition">


    </form>

    <form id="form_for_send_order" method="POST" action="{{ route('tableOrderStore') }}" hidden>
        @csrf
        <input type="text" name="table_id" id="table_id_for_send_order" value="{{ $table_id }}">
        <button type="submit" id="send_order_submit_button"></button>
    </form>

    <form id="form_for_sending_service" hidden>
        <input type="text" name="table_id" id="input_for_table_id" value="{{ $requestedTable->id }}">
        <input type="text" name="service_for" id="input_for_service_for">
        <button type="submit" id="send_service_submit_button"></button>

    </form>

    <script>
        // the home page funtions
        let addToOrder = document.querySelector("button.addToOrder");


        $(document).ready(function() {


            // ************************* Service Function Start Here ***************************


            $('.navbar_service_need').on('click', function() {
                $(this).addClass('navbar_service_clicked');
                var el = $(".navbar_service_clicked");
                var needService = el.data('service-name');

                alert(needService)

                $('.navbar_service_clicked').removeClass('navbar_service_clicked');

            })


            // ************************* Service Function End Here ***************************




            // order limit functtion start here

            var OrderderLimit = parseInt($('#total_order_limit').text());
            var orderdItem = parseInt($('#total_orderd_item').text());



            // order limit function end here




            // ************************** Quantity calculation Start Here ***********************

            var totalPrices = parseInt($('#subtotalPriceOfAll').text());


            $('.quantityPlusButton').click(function() {

                if (orderdItem >= OrderderLimit) {
                    $('#PopupForOrderLimitCross').addClass("theProductShow");
                } else {
                    $(this).addClass('quantity-button-clicked');
                    var el = $(".quantity-button-clicked");
                    var currentTableId = el.data('item-id');


                    var currentQuantity = parseInt($('#currentQuantity_'.trim() + currentTableId).text());
                    var CurrentproductPrice = el.data('item-price');
                    var updatedQuantity = currentQuantity += 1;


                    $('#id_for_tablehasproduct_update').val(currentTableId);
                    $('#quantity_for_tablehasproduct_update').val(updatedQuantity)


                    var route = '{{ route('updateTableProduct') }}';
                    var data = $('#form_for_tableHasProduct').serialize();


                    $.ajax({
                        type: 'POST',
                        url: route,
                        data: data,
                        success: function(data) {
                            console.log("quantity add success");

                            var updatedTotalPrice = totalPrices += CurrentproductPrice;
                            $('#currentQuantity_'.trim() + currentTableId).text(updatedQuantity)
                            $('#subtotalPriceOfAll').text(updatedTotalPrice);
                            var updatedTotalOrderd = orderdItem += 1;
                            $('#total_orderd_item').html(updatedTotalOrderd);

                        }
                    });

                    $('.quantity-button-clicked').removeClass('quantity-button-clicked');
                }

            });


            $('.quantityMinusButton').click(function() {


                $(this).addClass('quantity-button-clicked');
                var el = $(".quantity-button-clicked");
                var currentTableId = el.data('item-id');

                var currentQuantity = parseInt($('#currentQuantity_'.trim() + currentTableId).text());

                if (currentQuantity == 0) {
                    alert('You Reached The Minimum Quantity');
                } else {

                    var CurrentproductPrice = el.data('item-price');
                    var updatedQuantity = currentQuantity -= 1;

                    var updatedTotalPrice = totalPrices -= CurrentproductPrice;

                    $('#id_for_tablehasproduct_update').val(currentTableId);
                    $('#quantity_for_tablehasproduct_update').val(updatedQuantity)
                    $('#request_for').val('minus');

                    var route = '{{ route('updateTableProduct') }}';
                    var data = $('#form_for_tableHasProduct').serialize();


                    $.ajax({
                        type: 'POST',
                        url: route,
                        data: data,
                        success: function(data) {
                            console.log("quantity minus success");

                            $('#currentQuantity_'.trim() + currentTableId).text(updatedQuantity)
                            $('#subtotalPriceOfAll').text(updatedTotalPrice);
                            var updatedTotalOrderd = orderdItem -= 1;
                            $('#total_orderd_item').html(updatedTotalOrderd);
                            $('.quantity-button-clicked').removeClass(
                            'quantity-button-clicked');

                        }
                    });

                    $('.quantity-button-clicked').removeClass('quantity-button-clicked');


                }

            });

            // ************************** Quantity calculation end Here ***********************






        });



        // the order page functions
        var theNumber = 15;

        function theOrderPopUpShow(theNumberChanger) {
            theNumber = 5;
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
                    $('#send_order_submit_button').trigger('click');


                }
            }
            theOrderPopUp.classList.add("theProductShow");

            var setIt = setInterval(theNumberChanger, 1000);

            var changeOrderBtn = document.querySelector(".orderChangerBtn");
            changeOrderBtn.addEventListener("click", function() {
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

        function theOrderPopUpHide() {
            let theOrderPopUp = document.querySelector(".theOrderPopUp");
            theOrderPopUp.classList.remove("theProductShow");
        }

        function theOrderPopUpHide() {
            $('.theProductShow').removeClass('theProductShow');
        }
    </script>


@endsection
