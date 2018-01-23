
@extends('master')

@section('links')
    <link rel="stylesheet" href="/css/payTicket.css">
@endsection

@section('content')
    <div class="main_content">
        <div class="img_section">
                <img class="poster" src="{{$data[0]->Poster}}">
        </div>
        <div class="second_content">
            <h1>Order info</h1>
            <div class="filmnaam">
                <h2>{{$data[0]->Title}}</h2>
            </div>
            <div class="zitplaats">
                @if($data[1] === false)
                <h4>Zitplaats:</h4>
                @else
                    <h4>Loveseats:</h4>
                @endif
                <ul>
                    @foreach($data[2] as $chair)
                        <li>{{ $chair }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="aanvangFilm">
                <h4>Aanvang film:</h4>
                <h5>{{$data[3]->time}}</h5>
            </div>
            <div class="filmduur">
                <h4>Filmduur:</h4>
                <h5>{{$data[0]->Runtime}}</h5>
            </div>
            <div class="filmzaal">
                <h4>Filmzaal:</h4>
                <h5> zaal {{$data[3]->theather_id}}</h5>
            </div>
            <div class="prijs">
                <h4>Prijs:</h4>
                <h5>&euro;{{$data[4]}} euro</h5>
            </div>

            <form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="fussia@outlook.com">
                <input type="hidden" name="currency_code" value="EUR">
                <input type="hidden" name="item_name" value="">
                <input type="hidden" name="amount" value="{{ $data[4]}}">
                <input type="hidden" name="return" value="https://www.youtube.com/c/fussiacs">
                <input type="image" src="https://www.paypalobjects.com/nl_NL/NL/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, de veilige en complete manier van online betalen.">
                <img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>
    </div>
@endsection