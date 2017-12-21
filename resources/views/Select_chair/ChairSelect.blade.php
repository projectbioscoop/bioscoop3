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
                    <img data-seat="<?= $count ?>" src="/img/bioscoop/loveseat.png" alt="seat" id="seat-<?php echo $count;?>" class="<?php (!isset($movieData["chairs"][0][$count]["used"])? null :($movieData["chairs"][0][$count]["used"] == 1 ?  print("bezet chair loveSeat") : print("chair loveSeat")));?>">
                    <?php $countLove++;  $count--; $bool = true;?>
                @endfor
            </div>
        @endif
    @endforeach
    @if (!$bool)
        <div class="seat">
            @for ($k = 0;$k < $movieData["amountOfChairsPerRow"];$k++)
                <img src="/img/bioscoop/seat.png" alt="seat" id="seat-<?php echo $count;?>" class="<?php (!isset($movieData["chairs"][0][$count]["used"])? null :($movieData["chairs"][0][$count]["used"] == 1 ? print("bezet chair") : print("chair")));?>">
                <?php $count--;?>                           
            @endfor
            </div>
    @endif
@endfor
@else
<div class="seat" id="NormalSeat">
    @for ($z = $movieData["capacity"] / $movieData["amountOfChairsPerRow"];$z > 0;$z--)
        @for ($k = 0;$k < $movieData["amountOfChairsPerRow"];$k++)
            <img src="/img/bioscoop/seat.png" alt="seat" id="seat-<?php echo $count;?>" class=<?php (!isset($movieData["chairs"][0][$count]["used"])? null :($movieData["chairs"][0][$count]["used"] == 1 ?  print("bezet chair") : print("chair")));?>>
        @endfor
    @endfor
</div>
@endif
</div>

<div class="scherm col-lg-12">
    <img src="/img/bioscoop/scherm.png" alt="Tv-screen">
</div>

@endsection
@section('LeftBar')
    <div class="left_bar col-lg-12">
        <h2>Stoel Selector</h2>
        <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem, deleniti dolor doloribus error esse ipsum laboriosam laudantium libero minima modi nulla, quam quis recusandae sint tempora ullam, vitae voluptatibus.</span><span>Magni minus possimus rem suscipit. Inventore minus nisi numquam totam. Atque delectus inventore itaque, iure iusto nemo nihil nisi, nostrum obcaecati odit pariatur placeat, porro quae rerum similique tempore voluptates?</span><span>Animi consequuntur dolore exercitationem inventore itaque nisi nulla possimus quam voluptate.
               A assumenda at autem consequatur consequuntur dolorem doloremque ea, fugiat ipsum iste laborum minima, nobis, temporibus veniam voluptatum. Eaque?</span></p>
    </div>
@endsection

@section('RightBar')
    <div class="right_bar col-lg-12">
        <h2>Kiezen</h2>
    </div>
@endsection