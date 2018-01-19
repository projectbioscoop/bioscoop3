@extends('master')

@section('links')
    <link rel="stylesheet" href="/css/chair.css">
@endsection
@section ('content')
<h2>{{ $movieData["theatherName"] }}</h2>
<div class="seats col-lg-12">
<?php $count = $movieData["capacity"]; $countLove = 0; ?>
@if (isset($movieData["rowsLoversSeats"]))
@for ($j = ($movieData["capacity"] / $movieData["amountOfChairsPerRow"] + count($movieData["rowsLoversSeats"])) - 1; $j > 0 ; $j--)
    <?php $bool = false; ?>
    @foreach($movieData["rowsLoversSeats"] as $mDRowsLoversSeats)
        @if ($j == $mDRowsLoversSeats["row_loveseat"])
            <div class="LoveSeat">
                @for($i = 0; $i <= ($movieData["amountOfLoverChairs"] % 2 == 0 ? $movieData["amountOfLoverChairs"] / 2 : floor($movieData["amountOfLoverChairs"] / 2 - ($countLove % 2 == 0 ? 0 : 1 )));$i++)
                    <img data-seat="<?= $count ?>" src="/img/bioscoop/loveseat.png" alt="seat" id="seat-<?php echo $count;?>" class="<?php (!isset($movieData["chairs"][0][$count]["used"])?print("chair") :($movieData["chairs"][0][$count]["used"] == 1 ?  print("bezet chair loveSeat") : print("chair loveSeat")));?>">
                    <?php $countLove++;  $count--; $bool = true;?>
                @endfor
            </div>
        @endif
    @endforeach
    @if (!$bool)
        <div class="seat">
            @for ($k = 0;$k < $movieData["amountOfChairsPerRow"];$k++)
                <img src="/img/bioscoop/seat.png" alt="seat" id="seat-<?php echo $count;?>" class="<?php (!isset($movieData["chairs"][0][$count]["used"])? print("chair") :($movieData["chairs"][0][$count]["used"] == 1 ? print("bezet chair") : print("chair")));?>">
                <?php $count--;?>                           
            @endfor
            </div>
    @endif
@endfor
@else
<div class="seat" id="NormalSeat">
    @for ($z = $movieData["capacity"] / $movieData["amountOfChairsPerRow"];$z > 0;$z--)
        @for ($k = 0;$k < $movieData["amountOfChairsPerRow"];$k++)
            <img src="/img/bioscoop/seat.png" alt="seat" id="seat-<?php echo $count;?>" class=<?php (!isset($movieData["chairs"][0][$count]["used"])? print("chair") :($movieData["chairs"][0][$count]["used"] == 1 ?  print("bezet chair") : print("chair")));?>>
        @endfor
    @endfor
</div>
@endif
</div>

<div class="scherm col-md-12">
    <img class="col-md-12" src="/img/bioscoop/scherm.png" alt="Tv-screen">
</div>

@endsection
@section('LeftBar')
    <div class="left_bar col-lg-12">
        <h2>Stoel Selector</h2>
        <p><span>
        Goedendag, </span></p><p><span>
        Hier naast ziet u de bioscoopzaal waar de film in afgespeeld wordt met alle stoelen die wij hebben. Wij zouden graag hebben dat u
        de stoelen die u wilt reserveren doet selecteren door er op te klikken om ze te reserveren. U selecteerd een stoel 
        door er boven te hangen met je muis en er dan op te klikken.
        </span></p>
    </div>
@endsection

@section('RightBar')
    <div class="right_bar col-lg-12">
        <h2>Kiezen</h2>
        <ul>
            <li><img src="/img/bioscoop/seat.png" alt="seat" class="chairS"> normale stoel..</li>
            <li><img src="/img/bioscoop/seat.png" alt="seat" class="bezet chairS"> bezette normale stoel..</li>
            <li><img src="/img/bioscoop/seatSelect.png" alt="seat" class="chairS"> geselecteerde normale stoel..</li>
            <li><img src="/img/bioscoop/loveseat.png" alt="loveseat" class="chairL"> liefdesstoel..</li>
            <li><img src="/img/bioscoop/loveseat.png" alt="loveseat" class="bezet chairL"> bezette liefdesstoel..</li>
            <li><img src="/img/bioscoop/loveseatSelect.png" alt="loveseat" class="chairL"> geselecteerde liefdesstoel..</li>
        </ul>
    </div>
    <form action="">
        <input type="hidden" name="loveSeat" id="loveSeat" value= {{ $movieData["seats"] }}>
        <input type="hidden" name="amountSeat" id="amountSeat" value= {{ $movieData["loveseat"] }}>
    </form>
@endsection