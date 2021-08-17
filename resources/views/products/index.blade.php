@extends('includes.app')

@section('content')



    <header class="userMenuePageHeader">
        <nav>
            <div class="hamBurgerIcon">
                <i onclick="theAppend()" class="fas fa-bars"></i>
            </div>

            <x-webSiteNameComponent> </x-webSiteNameComponent>

        </nav>
        <div class="theTopImages">
            <img src="{{ asset('images/pexels-engin-akyurt-2673353.jpg') }}" alt="">
        </div>
    </header>




    <section class="theAppentSection">
        <div class="containerc">
            <div class="topIconSection">
                <i onclick="theAppendRemove()" class="fas fa-times"></i>
            </div>
            <div class="theAppendBody">
                <ul>

                    <li class="navbar_service_need" data-service-name="need waiter"><a>IK WILL GRAAG EEN OBER</a></li>
                    <li class="navbar_service_need" data-service-name="need bill"><a>Bill</a></li>
                    <li class="navbar_service_need" data-service-name="need wasabi"><a>Wasabi</a></li>
                    <li class="navbar_service_need" data-service-name="need gember"><a>GEMBER</a></li>
                    <li class="navbar_service_need" data-service-name="need soyasauce"><a>SOYASAUS</a></li>

                </ul>
            </div>
        </div>
    </section>



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




    <section class="theConditionSearch">
        <div class="theSearch">
            <input type="text" id="search-product" placeholder="Search a food You Like">
            <div class="product-suggestion">



                <!-- <div class="row bg-light rounded mb-2 suggested-product" product-id="1">
                            <div class="col-3 suggestion-image">
                                <img src="http://127.0.0.1:8000/images/1628323939.small.techbot gig (1).png" alt="PRODUCT"
                                   >
                            </div>
                            <div class="col-7 font-weight-bold">
                                product one two three four
                            </div>
                            <div class="col-2 p-2 suggestion-price">
                                <span>12</span>
                            </div>
                        </div> -->

                <!-- <div class="row bg-light rounded mb-2 suggested-product" product-id="1">
                            <div class="col-3 suggestion-image">
                                <img src="http://127.0.0.1:8000/images/1628323939.small.techbot gig (1).png" alt="PRODUCT"
                                   >
                            </div>
                            <div class="col-7 font-weight-bold">
                                product one two three four
                            </div>
                            <div class="col-2 p-2 suggestion-price">
                                <span>12</span>
                            </div>
                        </div> -->



            </div>
        </div>

        <div class="condition">

            <div class="conditionBox">
                <div class="theTimeIcon">
                    <i class="far fa-clock"></i>
                </div>
                <div class="timeAndTitle">
                    <div class="time">
                        <b class="time-remaining">00:00:00</b>
                    </div>
                    <div class="title">
                        <span class="font-weight-bold">Time</span>
                    </div>
                </div>
            </div>

            <div class="conditionBox">
                <div class="theTimeIcon">
                   <i class="fas fa-utensils"></i>
                </div>
                <div class="timeAndTitle">
                    <div class="time">
                        <b >  {{ $current_round }} /--</b>
                    </div>
                    <div class="title">
                        <span class="font-weight-bold">Round</span>
                    </div>
                </div>
            </div>


             <div class="conditionBox">
                <div class="theTimeIcon">
                   <i class="fas fa-bell"></i>
                </div>
                <div class="timeAndTitle">
                    <div class="time">
                      <span id="total_orderd_item" class="font-weight-bold h1" style="font-size: 18px"> {{ $tableOrderLimit->total_orderd }}</span>/ <span
                            id="total_order_limit" class="font-weight-bold h1" style="font-size: 18px">{{ $tableOrderLimit->order_limit }} </span>
                    </div>
                    <div class="title">
                        <span class="font-weight-bold">Orders</span>
                    </div>
                </div>
            </div>



        </div>
    </section>

    <!-- product section here -->
    <section class="productSection">


        <!-- catagory slider code  -->
        <div class="swiper-container catagory-slider-swiper-slider mb-4">
            <div class="swiper-wrapper">

                @foreach ($categories as $category)

                    <a href="#category_tab_{{ $category->id }}" class="classForlinkCategory">

                        <div class="swiper-slide activetab" id="swapperDliderActiveTab">
                            {{ $category->name }}

                        </div>
                    </a>
                @endforeach


            </div>
        </div>

        <div class="CategoryWisedProducts">
            <div class="tab-container-wrapper">

                <!-- tab items here -->
                <!-- tab item -->

                @foreach ($categories as $category)

                    <div class="theCategoryTitle" id="category_tab_{{ $category->id }}">
                        <b>{{ $category->name }}</b>
                    </div>

                    @php
                        $categoryWisedProducts = $category->products;
                    @endphp



                    @if ($categoryWisedProducts->count() != 0)

                        @foreach ($categoryWisedProducts as $categoryWisedProduct)

                            @if ($categoryWisedProduct->active_status != 2)
                                <div class="product" id="singleProduct" data="1"
                                    data-item-id="{{ $categoryWisedProduct->id }}">
                                    <div class="productImg">
                                        <img src="{{ asset($categoryWisedProduct->image_small) }}" alt="">
                                    </div>


                                    <div class="infoPart">
                                        <div class="productName">
                                            <h5>
                                                Name: <span>{{ $categoryWisedProduct->name }}</span></h5>
                                        </div>

                                        <div class="productPriceAndNumber">
                                            <div class="thePrice">
                                                <span><b>{{ $categoryWisedProduct->price }}</b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        @endforeach



                    @else
                        <div class="alertforNoProduct text-center">
                            <div class="alert alert-warning" role="alert">
                                Sorry ! There is no Product on this category
                            </div>
                        </div>


                    @endif




                @endforeach
            </div>

        </div>

    </section>

    <!-- the pop up product view section here -->

    <section class="theProductView">
        <div class="theProductViewLayOut">
            <div class="tab-content">
                <div class="theCros" onclick="theProductViewHider()">
                    <span class="font-weight-bold" style="cursor: pointer"> X</span>
                </div>
                <div class="theProductImage mb-4">
                    <img class="theProductImageSrc" alt="">
                </div>
                <div class="productNameAndPrice">
                    <div class="productName">
                        <h6>Name</h6>
                    </div>
                    <div class="productPrice">
                        <h6 id="productViewName"></h6>
                    </div>
                </div>

                <div class="quantityAndTotalPrice">
                    <div class="quantity">
                        Price
                    </div>
                    <div class="totalPrice">
                        <b id="productViewPrice"></b>
                    </div>
                </div>


                <div class="quantityAndTotalPrice">
                    <div class="quantity">
                        Quantity
                    </div>
                    <div class="totalPrice">
                      <button class="ProductQuantityminusbutton btn mr-2"> <i class="fas fa-minus"></i> </button> <span class="totalProductQuantity "> 1 </span>    <button class="productaddQuanityPlus btn ml-2"><i class="fas fa-plus"></i></button>
                    </div>
                </div>


                <div class="theButton">
                    <button class="addToOrder" onclick="theProductViewAdder()">ADD TO ORDER</button>
                </div>
            </div>
        </div>
    </section>




    <!-- The Footer start here -->
    <footer class="userFooter">

        <div class="iconBox">


            <a href="">

                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="iconName">
                    <h6>Menu</h6>
                </div>
            </a>
        </div>

        <div class="iconBox">


            <a id="billPageLink">


                <div class="icon">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <div class="iconName">
                    <h6>Bill</h6>
                </div>
            </a>
        </div>

        <div class="iconBox">

            <a id="orderPageLink">

                <div class="icon position-relative ">
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
                    <div class="icon  position-relative">
                        <i class="fas fa-user-alt"></i>
                    </div>
                    <div class="iconName">
                        <h6>Service</h6>
                    </div>
                </a>
            </div>
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



    {{-- popup for order limit remaining --}}
    <section class="theOrderPopUp" id="PopupForOrderTimeRemains">
        <div class="allContentsOrder">
            <div class="theDesc">
                <p>You Have Reached Last 30 min of Order For This Round</p>
            </div>
            <div class="theOrderAlert">
                <h5></h5>
            </div>
            <div class="orderrBtn">
                <button onclick="theOrderTimeWarningHide()">OK</button>
            </div>
        </div>
    </section>




    {{-- popup for product added to cart --}}
    <section class="theOrderPopUp" id="PopupForaddedtoCart">
        <div class="allContentsOrder">
            <div class="theDesc">
                <p>Product has been added To your cart</p>
            </div>
            <div class="theOrderAlert">
                <h5></h5>
            </div>
            <div class="orderChangerBtn">
                <button onclick="theOrderPopUpHideTwo()">OK</button>
            </div>
        </div>
    </section>







    {{-- popup for service --}}
    <section class="theOrderPopUp" id="popup_for_service">
        <div class="allContentsOrder">
            <div class="theDesc">
                <p>Do you Need The following ?</p>
            </div>
            <div class="theOrderAlert">
                <h5 id="servicePopUpNeed"></h5>
            </div>
            <div class="orderChangerBtn">

                <button class="btn btn-success" onclick="ServiceSend()">Confirm</button>
                <button onclick="theOrderPopUpHide()">Cancel</button>
            </div>
        </div>
    </section>








    {{-- ***************** All hidden Forms ************** --}}

    <form id="form_for_add_cart" hidden>
        @csrf
        <input type="text" name="table_id" id="cart_input_for_table_id" value="{{ $requestedTable->id }}">
        <input type="text" name="product_id" id="cart_input_for_table_product_id">
        <input type="text" name="quantity" id="cart_input_for_table_quantity" >

    </form>



    <form method="POST" action="{{ route('bills') }}" hidden>
        @csrf
        <input type="number" name="table_id"  value="{{ $requestedTable->id }}" required>
        <button type="submit" id="submit_button_for_bill_form">butotn</button>
    </form>


    <form method="POST" action="{{ route('need-service') }}" id="needService" hidden>
        @csrf
        <input type="number" name="table_id"  value="{{ $requestedTable->id }}" required>
        <input type="text" name="service" id="servieName">
    </form>



    <form method="POST"  id="orderSend" action="{{ route('orders') }}"  hidden>
        @csrf
        <input type="number" name="table_id"  value="{{ $requestedTable->id }}" required>
        <button id="orderSendFormButton"></button>
    </form>

    <form method="POST" id="form_for_round">
        @csrf
        <input type="number" name="table_id"  value="{{ $requestedTable->id }}" required>
        <input type="number" name="current_round" value="{{ $current_round }}">
    </form>

    <script>




        // order limit functtion start here

        var OrderderLimit = parseInt($('#total_order_limit').text());
        var orderdItem = parseInt($('#total_orderd_item').text());




        // product quantity function

        var totalCurrentQuantity = parseInt($('.totalProductQuantity').text());

        $('#cart_input_for_table_quantity').val(totalCurrentQuantity);

        $('.ProductQuantityminusbutton').on('click',function () {
            if(totalCurrentQuantity != 1){
                var updateProductQuantity = totalCurrentQuantity -= 1;
               $('.totalProductQuantity').text(updateProductQuantity);
               $('#cart_input_for_table_quantity').val(updateProductQuantity);
            }
        });


        $('.productaddQuanityPlus').on('click',function () {

            var limit = OrderderLimit - orderdItem;
            if(totalCurrentQuantity < limit){
                var updateProductQuantity = totalCurrentQuantity += 1;
               $('.totalProductQuantity').text(updateProductQuantity);
                $('#cart_input_for_table_quantity').val(updateProductQuantity);
            }

        });



        // ******************* orders function here ****************


            $('#orderPageLink').on('click',function () {
                $('#orderSendFormButton').trigger('click');
            })

            // ************************* Service Function Start Here ***************************


            $('.navbar_service_need').on('click', function() {
                $(this).addClass('navbar_service_clicked');
                var el = $(".navbar_service_clicked");
                var needService = el.data('service-name');

                theAppendRemove();

                $('#popup_for_service').addClass('theProductShow');
                $('#servicePopUpNeed').html(needService);
                $('#servieName').val(needService);




            });

            function ServiceSend() {
                    $('#needService').submit();

            }


            // ************************* Service Function End Here ***************************





        // the home page funtions

        const allProducts = document.querySelectorAll(".product");
        const theProductView = document.querySelector(".theProductView");
        let addToOrder = document.querySelector("button.addToOrder");




        // order limit function end here







        function theAppend() {
            var theElement = document.querySelector(".theAppentSection");
            theElement.classList.add("theAppendCome");
        }

        function theAppendRemove() {
            var theElement = document.querySelector(".theAppentSection");
            theElement.classList.remove("theAppendCome");
        }

        $(document).ready(function() {
            var end_time = @json($requestedTable->end_time);

            var start = new Date(end_time);

            console.log(start)
            setInterval(function() {
                var total_seconds = (start - new Date) / 1000;

                var hours = Math.floor(total_seconds / 3600);
                total_seconds = total_seconds % 3600;

                var minutes = Math.floor(total_seconds / 60);
                total_seconds = total_seconds % 60;

                var seconds = Math.floor(total_seconds);

                if(hours == 0 && minutes == 30 && seconds ==0){
                    $('#PopupForOrderTimeRemains').addClass('theProductShow');
                };

                if(hours == 0 && minutes == 00 && seconds == 0){

                var data = $('#form_for_round').serialize();
                var route = '{{ route('Roundupdate') }}'.trim();

                $.ajax({
                    url: route,
                    type: "post",
                    data: data,
                    success: function() {
                        console.log('Round Updated');
                        location.reload();
                    },
                    error: function(jqXHR, exception) {
                        console.log(jqXHR);
                    }
                });


                }


                if (hours < 10) {
                    hours = '0' + hours;
                }
                if (minutes < 10) {
                    minutes = '0' + minutes;
                }
                if (seconds < 10) {
                    seconds = '0' + seconds;
                }

                var html = hours + ':' + minutes + ':' + seconds
                $('.time-remaining').text(html)
            }, 1000);
        });


        var products = @json($products);
        console.log(products)

        $(document).on('click', '#singleProduct', function() {

            $(this).addClass('cliecked_on_product');
            var el = $('.cliecked_on_product');
            var itemId = el.data('item-id');

            $('.theProductView').addClass("theProductVisible");

            $.each(products, function(key) {

                if (products[key].id == itemId) {

                    $('#productViewName').html(products[key].name);
                    $('#productViewPrice').html(products[key].price);
                    $('#cart_input_for_table_product_id').val(products[key].id);

                    var route = '{{ route('dashboard') }}';
                    var image = route.trim() + '/' + products[key].image_big;
                    $('.theProductImageSrc').attr('src', image);

                }

            })

            $('.cliecked_on_product').removeClass('cliecked_on_product');


        });


        $(document).ready(function() {
            $('#billPageLink').on('click', function() {
              $('#submit_button_for_bill_form').trigger('click');
            });

        });


        // product suggestion
        $('.product-suggestion').hide();
        $(document).on('input', '#search-product', function() {
            var inputData = $('#search-product').val();
            if (!inputData) {
                $('.product-suggestion').hide();
            } else {

                var expression = new RegExp(inputData, "i");
                var count = 0;
                var html = '';
                var home = '{{ route('dashboard') }}';
                $.each(products, function(key, value) {


                    if (value.name.search(expression) != -1) {
                        if (count == 10) {
                            return false;
                        }
                        count++;
                        html += ' <div class="row bg-light rounded mb-2 suggested-product" product-id="' +
                            value.id + '">';
                        html += '     <div class="col-3 suggestion-image"> <img src="' + home.trim() + '/' +
                            value.image_small + '" alt="' + value.name + '"> </div>';
                        html += '     <div class="col-7 font-weight-bold"> ' + value.name + ' </div>';
                        html += '     <div class="col-2 p-2 suggestion-price"> <span>' + value.price +
                            '</span>  </div>';
                        html += ' </div>';
                    }

                });

                $('.product-suggestion').html(html);

                $('.product-suggestion').show();


            }
        });

        //click on suggestion
        $(document).on('click', '.suggested-product', function() {
            var product_id = $(this).attr('product-id');
            $('#singleProduct').attr('data-item-id')
            var target = $('div[id="singleProduct"][data-item-id="' + product_id + '"]');
            target.trigger("click");
        });


        // bill page form functions






        function theProductViewHider() {
            theProductView.classList.remove("theProductVisible");

        }

        function theProductViewAdder() {

            if (orderdItem >= OrderderLimit) {
                theProductViewHider();
                $('#PopupForOrderLimitCross').addClass("theProductShow");
            } else {

                var data = $('#form_for_add_cart').serialize();
                var route = '{{ route('addtocart') }}'.trim();

                $.ajax({
                    url: route,
                    type: "post",
                    data: data,
                    success: function(data) {

                        var updatedTotalOrderd = orderdItem += 1;
                        $('#total_orderd_item').html(updatedTotalOrderd);
                        $('#PopupForaddedtoCart').addClass('theProductShow');
                    },
                    error: function(jqXHR, exception) {
                        console.log(jqXHR);
                    }
                });

                theProductView.classList.remove("theProductVisible");
            }
        }




        /* catagory slider here */

        try {
            var swiper = new Swiper(".catagory-slider-swiper-slider", {
                slidesPerView: "auto",
                spaceBetween: 10,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        } catch (err) {
            console.log(err);
        }

        /* tab for catagory */
        try {
            const allTabs = document.querySelectorAll("[data-tab-caller]");
            const allTabsContent = document.querySelectorAll("[data-tab-content]");
            let activetab = "";

            allTabs.forEach((element, index) => {
                element.onclick = () => {
                    allTabs.forEach((x) => x.classList.remove("activetab"));
                    element.classList.add("activetab");
                    selectingActiveTab();
                    showingtab();
                };
            });

            const selectingActiveTab = () => {
                allTabs.forEach((x) => {
                    if (x.classList.contains("activetab")) {
                        activetab = x.dataset.tabCaller;
                    }
                });
            };
            selectingActiveTab();

            const showingtab = () => {
                allTabsContent.forEach((x) => {
                    if (x.dataset.tabContent === activetab) {
                        x.classList.add("active", "show");
                    } else {
                        x.classList.remove("active", "show");
                    }
                });
            };
            showingtab();
        } catch (err) {}



        function theOrderPopUpHide() {
            $('.theProductShow').removeClass('theProductShow');
        }

        function theOrderTimeWarningHide(){
            $('#PopupForOrderTimeRemains').removeClass('theProductShow');
        }


        function theOrderPopUpHideTwo() {
            $('.theProductShow').removeClass('theProductShow');
            location.reload();
        }


    </script>


@endsection
