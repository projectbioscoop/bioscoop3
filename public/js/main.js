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
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__modules_Display_es6__ = __webpack_require__(3);
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
                "amountSeats" : document.getElementById("amountSeat").value,
                "loveSeats" : document.getElementById("loveSeat").value
            });
            break;
        case "display":
            new __WEBPACK_IMPORTED_MODULE_2__modules_Display_es6__["a" /* default */]();
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
        this.loveSeats = (options.loveSeats == "true" ? true : false);
        this.HoverEvent();
        this.ClickEvent();
    }

    HoverEvent()
    {
        this.chairs = document.getElementsByClassName("chair");
        for (let i = 0; i < this.chairs.length; i++)
        {
            console.log(this.loveSeats);
            if (!this.loveSeats)
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
            else if (this.loveSeats)
            {
                this.chairs[i].addEventListener("mouseover", () => {
                    if (!this.chairs[i].classList.contains("bezet") && this.chairs[i].classList.contains("loveSeat"))
                    {
                        this.colorChangeSeat(this.chairs[i]);
                        this.setSeatCompanion(this.chairs[i]);
                    }
                });

                this.chairs[i].addEventListener("mouseout", () => {
                    if (!this.chairs[i].classList.contains("bezet") && this.chairs[i].classList.contains("loveSeat"))
                    {
                        this.colorChangeSeat(this.chairs[i]);
                        this.setSeatCompanion(this.chairs[i]);
                    }
                });
            }

        }
    }

    ClickEvent()
    {
        // zet scripts uit als je click
        document.getElementById("conS").addEventListener("click", ()=>{
            console.log(1);
            // make form
            let conForm;
            conForm = "<input type=\"hidden\" id=\"chairL\" value=\""+this.chairs.length+"\"></input>";
            for (let i = 0; i < this.chairs.length; i++)
            {
                conForm = conForm + "<input type=\"hidden\" id=\"seat"+i+"\" value=\""+this.chairs[i]+"\"></input>";
            }
            conForm = conForm + "<input type=\"hidden\" id=\"LSB\" value=\""+this.loveSeats+"\"></input>";
            document.getElementById('formSD').innerHTML = conForm;
            // send form
            document.formSDname.submit();
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
            seat.src = "/img/bioscoop/loveseatSelect.png";
            break;
            case "/img/bioscoop/seatSelect.png":
            seat.src = "/img/bioscoop/seat.png";
            break;
            case "/img/bioscoop/loveseatSelect.png":
            seat.src = "/img/bioscoop/loveseat.png";
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
                if (this.loveSeats)
                {
                    if (document.getElementById("seat-" + i).classList.contains("loveSeat"))
                    {
                        if (!document.getElementById("seat-" + i).classList.contains("bezet"))
                        {
                            this.colorChangeSeat(document.getElementById("seat-" + i));
                            this.selected = "seat-" +i;
                        }
                        else
                        {
                            amountSeatsMax++;
                        }
                    }
                }
                else
                {
                    if (!document.getElementById("seat-" + i).classList.contains("loveSeat"))
                    {
                        if (!document.getElementById("seat-" + i).classList.contains("bezet"))
                        {
                            this.colorChangeSeat(document.getElementById("seat-" + i));
                            this.selected = "seat-" + i;
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

    
}
/* harmony export (immutable) */ __webpack_exports__["a"] = Theather;


/***/ }),
/* 3 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
class Display

{
    constructor()
    {
        this.loveseat = document.getElementById("loveseatselect");
        this.loveseat.disabled = false;
        this.loveseatbool = document.getElementById("loveseat");
        this.normal = document.getElementById("normalselect");
        this.normal.disabled = false;
        this.start();
    }

    start()
    {
        this.loveseat.addEventListener("change", () => {
            let selected = this.loveseat.options[this.loveseat.selectedIndex].value;
            if(selected != 0)
            {
                this.normal.disabled = true;
                this.loveseatbool.value = "true";
            }
            else
            {
                this.normal.disabled = false;
            }
        })

        this.normal.addEventListener("change", () => {
            let selected = this.normal.options[this.normal.selectedIndex].value;
            console.log(selected);
            if(selected != 0)
            {
                this.loveseat.disabled = true;
                this.loveseatbool.value = "false";
            }
            else
            {
                this.loveseat.disabled = false;
            }
        })
    }
}
/* harmony export (immutable) */ __webpack_exports__["a"] = Display;





/***/ })
/******/ ]);