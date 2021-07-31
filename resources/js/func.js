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
