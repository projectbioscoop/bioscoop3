/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__modules_AdminTheather_es6__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__modules_Theather_es6__ = __webpack_require__(2);
// import classen //



let location = window.location.href;
let locationArray = location.split('/');

if (locationArray[0] == "http:" && locationArray[1] == "")
{
    switch(locationArray[3])
    {
        // looks at your url en adds the right functions to the page. //
        case "chairselectadmin":
            new __WEBPACK_IMPORTED_MODULE_0__modules_AdminTheather_es6__["a" /* default */]();
            break;
        case "chairselect":
            new __WEBPACK_IMPORTED_MODULE_1__modules_Theather_es6__["a" /* default */]({
                "amountSeats" : 5,
                "loveSeats" : false
            });
            break;
    }
}


/***/ }),
/* 1 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
class AdminTheather
{
    constructor()
    {
        this.arrow = document.getElementsByClassName("Arrow");
        
        for (let i = 0; i<this.arrow.length; i++)
        {
            this.arrow[i].addEventListener('click', ()=>{
                if (this.arrow[i].classList.contains("activeClass"))
                {
                    let id = this.arrow[i].id;
                    this.arrow[i].className = "Arrow"
                    this.arrow[i].style.transform = "rotate(0deg)";
                    document.getElementById("item-"+id).style.display = "none"; 
                }
                else
                {
                    let id = this.arrow[i].id;
                    this.arrow[i].className += " activeClass"
                    this.arrow[i].style.transform = "rotate(180deg)";
                    document.getElementById("item-"+id).style.display = "block"; 
                }
            });
        }
    }
}
/* harmony export (immutable) */ __webpack_exports__["a"] = AdminTheather;


/***/ }),
/* 2 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
class Theather
{
    constructor(options)
    {
        this.chairs;
        this.selected;
        this.amountSeats = options.amountSeats;
        this.loveSeats = options.loveSeats;
        this.HoverEvent()
    }

    HoverEvent()
    {
        this.chairs = document.getElementsByClassName("chair");
        for (let i = 0; i < this.chairs.length; i++)
        {
            this.chairs[i].addEventListener("mouseover", () => {
                if (!this.chairs[i].classList.contains("bezet") && !this.chairs[i].classList.contains("loveSeat"))
                {    
                    this.colorChangeSeat(this.chairs[i]);
                    this.setSeatCompanion(this.chairs[i]);
                }
            });

            this.chairs[i].addEventListener("mouseout", () => {
                if (!this.chairs[i].classList.contains("bezet") && !this.chairs[i].classList.contains("loveSeat"))
                {
                    this.colorChangeSeat(this.chairs[i]);
                    this.setSeatCompanion(this.chairs[i]);
                }
            });
        }
    }

    ClickEvent()
    {
        document.getElementsByClassName("chair").addEventListener("click", ()=>{
            fetch("google.com/"+this.selected);//url
        });
    }

    colorChangeSeat(seat)
    {
        switch(seat.src.split("000")[1])
        {
            case "/img/bioscoop/seat.png":
            seat.src = "/img/bioscoop/seatSelect.png";
            break;
            case "/img/bioscoop/loveseat.png":
            seat.src = "/img/bioscoop/loveseatSelect.png"
            break;
            case "/img/bioscoop/seatSelect.png":
            seat.src = "/img/bioscoop/seat.png";
            break;
            case "/img/bioscoop/loveseatSelect.png":
            seat.src = "/img/bioscoop/loveseat.png"
            break;
        }
    }

    setSeatCompanion(seat)
    {
        let amountSeatsMin = Math.floor(parseInt(seat.id.split("-")[1]) - ((this.amountSeats - 1 ) / 2));
        (amountSeatsMin < 0 ? amountSeatsMin = 0 : null );
        let amountSeatsMax = parseInt(seat.id.split("-")[1]) + (this.amountSeats / 2);
        for (let i = amountSeatsMin; i < amountSeatsMax;  i++)
        {
            if (seat.id != ("seat-" + i) && i >= 0)
            {
                if (!document.getElementById("seat-" + i).classList.contains("loveSeat"))
                {
                    if (!document.getElementById("seat-" + i).classList.contains("bezet"))
                    {
                        this.colorChangeSeat(document.getElementById("seat-" + i));
                    }
                    else
                    {
                        amountSeatsMax++;
                    }   
                }
            }
        }
    }

    
}
/* harmony export (immutable) */ __webpack_exports__["a"] = Theather;


/***/ })
/******/ ]);