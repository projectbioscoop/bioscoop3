export default class UpdateAgenda {

    constructor() {
        this.start();
    }

    start() {
        console.log("1");
        let select = document.getElementById( 'selectionAmount' );
        console.log(select);

        select.addEventListener( "change", () => {
            let submit = document.getElementById( 'submitOption' );
            let updateForm = document.getElementById( 'updateForm' );
            let selected = select.options[select.selectedIndex].value;
            updateForm.innerHTML = "";
            for ( let i = 0; i < selected; i++ ) {
                updateForm.innerHTML += "<label for='movie'>Film</label>" +
                    "<select name='movie' id='movie'>" + "</select>" +
                    "<label for='date' id='date'>Datum</label>" +
                    "<input type='date' id='date' name='date'>" +
                    "<label for='startTime'>Start Tijd</label>" +
                    "<select name='startTime' id='startTime'>" +
                    "<option value=''>15:00 - 17:00</option>" +
                    "<option value=''>18:00 - 20:00</option>" +
                    "<option value=''>20:30 - 22:00</option>" +
                    "<option value=''>22:30 - 24:00</option>" +
                    "</select>" +
                    "<label for='theaterRoom'>Bioscoopzaal</label>" +
                    "<select name='theaterRoom' id='theaterRoom'>" +
                    "<option value=''>Zaal 1</option>" +
                    "</select>" +
                    "<span></span>";

            }

        } )

    }
}