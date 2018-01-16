@extends('master')


@section('content')
    <h1>Bestelling gegevens</h1>
    <div class="filmnaam">
        <h2>Jumanji</h2>
    </div>
    <div class="zitplaats">
        <h4>Zitplaats:</h4>
        <h5>Rij 4, stoel 6,7,8,9</h5>
    </div>
    <div class="aanvangFilm">
        <h4>Aanvang film:</h4>
        <h5>16.30 Uur</h5>
    </div>
    <div class="filmduur">
        <h4>Filmduur:</h4>
        <h5>135 Minuten</h5>
    </div>
    <div class="filmzaal">
        <h4>Filmzaal:</h4>
        <h5>Zaal 3</h5>
    </div>
    <div class="prijs">
        <h4>Prijs:</h4>
        <h5>2x zitplaats €14,00 = €28,00</h5>
    </div>

    <form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="fussia@outlook.com">
        <input type="hidden" name="currency_code" value="EUR">
        <input type="hidden" name="item_name" value="Bioscoop Tickets">
        <input type="hidden" name="amount" value="28.00">
        <input type="image" src="https://www.paypalobjects.com/nl_NL/NL/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, de veilige en complete manier van online betalen.">
        <img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1">
    </form>

@endsection