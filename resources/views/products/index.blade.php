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


    <section class="theConditionSearch">
        <div class="theSearch">
            <input type="text" placeholder="Search a food You Like">
        </div>
        
        <div class="condition">

            <div class="conditionBox">
                <div class="theTimeIcon">
                    <i class="far fa-clock"></i>
                </div>
                <div class="timeAndTitle">
                    <div class="time">
                        <b>1: 59 min</b>
                    </div>
                    <div class="title">
                        <span>Time</span>
                    </div>
                </div>
            </div>

            <div class="conditionBox">
                <div class="theTimeIcon">
                    <i class="far fa-clock"></i>
                </div>
                <div class="timeAndTitle">
                    <div class="time">
                        <b>1: 59 min</b>
                    </div>
                    <div class="title">
                        <span>Time</span>
                    </div>
                </div>
            </div>

            <div class="conditionBox">
                <div class="theTimeIcon">
                    <i class="far fa-clock"></i>
                </div>
                <div class="timeAndTitle">
                    <div class="time">
                        <b>1: 59 min</b>
                    </div>
                    <div class="title">
                        <span>Time</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- product section here -->
    <section class="productSection">

        

        <div class="theCategoryTitle">
            <b>Categories and Foods</b>
        </div>

        <!-- catagory slider code  -->
        <div class="swiper-container catagory-slider-swiper-slider">
            <div class="swiper-wrapper">
                <div data-tab-caller="catagory-tab-1" class="swiper-slide activetab">Drinks</div>
                <div data-tab-caller="catagory-tab-2" class="swiper-slide">Foods</div>
                <div data-tab-caller="catagory-tab-3" class="swiper-slide">Soops</div>
                <div data-tab-caller="catagory-tab-2" class="swiper-slide">Foods</div>
                <div data-tab-caller="catagory-tab-3" class="swiper-slide">Soops</div>
                <div data-tab-caller="catagory-tab-3" class="swiper-slide">Soops</div>
                <div data-tab-caller="catagory-tab-2" class="swiper-slide">Foods</div>
                <div data-tab-caller="catagory-tab-3" class="swiper-slide">Soops</div>
                <div data-tab-caller="catagory-tab-3" class="swiper-slide">Soops</div>
                <div data-tab-caller="catagory-tab-3" class="swiper-slide">Soops</div>
                <div data-tab-caller="catagory-tab-2" class="swiper-slide">Foods</div>
                <div data-tab-caller="catagory-tab-3" class="swiper-slide">Soops</div>
            </div>
        </div>

        <div class="CategoryWisedProducts">
            <div class="tab-container-wrapper">

                <!-- tab items here -->
                <!-- tab item -->
                <div data-tab-content="catagory-tab-1" class="tab-content fade">
                    

                    <div class="product" data="1">
                        <div class="productImg">
                            <img src="{{ asset('images/images-removebg-preview.png') }}" alt="">
                        </div>

                        <div class="infoPart">
                            <div class="productName">
                                <h5>Name: <span>Pepsi Cola</span></h5>
                            </div>

                            <div class="productPriceAndNumber">
                                <div class="thePrice">
                                    <span><b>$3.5</b></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div class="productImg">
                            <img src="images/images-removebg-preview.png" alt="">
                        </div>

                        <div class="infoPart">
                            <div class="productName">
                                <h5>Name: <span>Pepsi Cola</span></h5>
                            </div>

                            <div class="productPriceAndNumber">
                                <div class="thePrice">
                                    <span><b>$3.50</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tab items -->
                <div data-tab-content="catagory-tab-2" class="tab-content fade">
                    <div class="product">
                        <div class="productImg">
                            <img src="images/images-removebg-preview.png" alt="">
                        </div>

                        <div class="infoPart">
                            <div class="productName">
                                <h5>Name: <span>Pepsi Cola</span></h5>
                            </div>

                            <div class="productPriceAndNumber">
                                <div class="thePrice">
                                    <span><b>$3.5</b></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div class="productImg">
                            <img src="images/images-removebg-preview.png" alt="">
                        </div>

                        <div class="infoPart">
                            <div class="productName">
                                <h5>Name: <span>Pepsi Cola</span></h5>
                            </div>

                            <div class="productPriceAndNumber">
                                <div class="thePrice">
                                    <span><b>$3.50</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tab items -->

                <div data-tab-content="catagory-tab-3" class="tab-content fade">
                    <div class="product">
                        <div class="productImg">
                            <img src="images/chicken-noodle-soup-nutrition-and-description-chick-fil-15.ashx" alt="">
                        </div>

                        <div class="infoPart">
                            <div class="productName">
                                <h5>Name: <span>Pepsi Cola</span></h5>
                            </div>

                            <div class="productPriceAndNumber">
                                <div class="thePrice">
                                    <span><b>$3.5</b></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div class="productImg">
                            <img src="images/images-removebg-preview.png" alt="">
                        </div>

                        <div class="infoPart">
                            <div class="productName">
                                <h5>Name: <span>Pepsi Cola</span></h5>
                            </div>

                            <div class="productPriceAndNumber">
                                <div class="thePrice">
                                    <span><b>$3.50</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- the pop up product view section here -->

    <section class="theProductView">
        <div class="theProductViewLayOut">
            <div class="tab-content">
                <div class="theCros" onclick="theProductViewHider()">
                    <i class="fas fa-times"></i>
                </div>
                <div class="theProductImage">
                    <img class="theProductImageSrc" src="images/images-removebg-preview.png" alt="">
                </div>
                <div class="productNameAndPrice">
                    <div class="productName">
                        <h6>Pepsi Max</h6>
                    </div>
                    <div class="productPrice">
                        <h6><b>$3.50</b></h6>
                    </div>
                </div>

                <div class="quantityAndTotalPrice">
                    <div class="quantity">
                        2
                    </div>
                    <div class="totalPrice">
                        <b>$6</b>
                    </div>
                </div>

                <div class="theButton">
                    <button class="addToOrder" onclick="theProductViewAdder()">ADD TO ORDER</button>
                </div>
            </div>
        </div>
    </section>

  

     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    {{-- <script src="../js/"></script> --}}


 <script>
   
// the home page funtions

const allProducts = document.querySelectorAll(".product");
const theProductView = document.querySelector(".theProductView");
let addToOrder = document.querySelector("button.addToOrder");

for (var i = 0; i <= allProducts.length; i++) {
    allProducts[i]?.addEventListener("click", function (event) {
        theProductView.classList.add("theProductVisible");
    });
}

function theProductViewHider() {
    theProductView.classList.remove("theProductVisible");
}
function theProductViewAdder() {
    theProductView.classList.remove("theProductVisible");
    alert("1 Product Added To Order");
}

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

function theOrderPopUpHide() {
    let theOrderPopUp = document.querySelector(".theOrderPopUp");
    theOrderPopUp.classList.remove("theProductShow");
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


 </script>


@endsection