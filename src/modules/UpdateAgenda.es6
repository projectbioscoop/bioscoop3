export default class UpdateAgenda {

    constructor() {
        this.start();
    }

    start() {
        const select = document.getElementById( 'selectionAmount' );
        console.log( select );

        select.addEventListener( "change", () => {
            const updateForm = document.getElementById( 'updateForm' );
            const options = document.getElementById( "options" ).value;
            let selected = select.options[ select.selectedIndex ].value;
            updateForm.innerHTML = "";
            updateForm.style = "border: 2px #aaaaaa solid;";


            for ( let i = 0; i < selected; i++ ) {
                updateForm.innerHTML += "<div class='movie-form'>" +
                    "<label for='movie'>Film</label>" +
                    "<select name='movie' id='movie'>" +
                    "<option></option>" +
                    options +
                    "</select>" +
                    "<label for='date' id='date'>Datum</label>" +
                    "<input type='date' id='date' name='date'>" +
                    "<label for='startTime'>Start Tijd</label>" +
                    "<select name='startTime' id='startTime'>" +
                    "<option value='1'>15:00 - 17:00</option>" +
                    "<option value='2'>18:00 - 20:00</option>" +
                    "<option value='3'>20:30 - 22:00</option>" +
                    "<option value='4'>22:30 - 24:00</option>" +
                    "</select>" +
                    "<label for='theaterRoom'>Bioscoopzaal</label>" +
                    "<select name='theaterRoom' id='theaterRoom'>" +
                    "<option value='1'>Zaal 1</option>" +
                    "<option value='2'>Zaal 2</option>" +
                    "<option value='3'>Zaal 3</option>" +
                    "</select>" +
                    "</div>" +
                    "<br>";

            }
            const movie = document.getElementById("movie");

            movie.addEventListener("change", () => {
                console.log()
            })

        } );

    }
}