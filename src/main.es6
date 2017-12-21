// import classen //
import AdminTheather from "./modules/AdminTheather.es6";
import Theather from "./modules/Theather.es6";

let location = window.location.href;
let locationArray = location.split('/');

if (locationArray[0] == "http:" && locationArray[1] == "")
{
    switch(locationArray[3])
    {
        // looks at your url en adds the right functions to the page. //
        case "chairselectadmin":
            new AdminTheather();
            break;
        case "chairselect":
            new Theather({
                "amountSeats" : 5,
                "loveSeats" : false
            });
            break;
    }
}
