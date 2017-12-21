@extends('master')

@section('links')
    <link rel="stylesheet" href="/css/chair.css">
@endsection
<?php $count2 = 0;?>
@section ('content')
    @foreach ($data as $movieData)
    <?php $count = $movieData["capacity"]; $countLove = 0; ?>
        <div class="titleItems bar">
            <h2>{{ $movieData["theatherName"] }} || {{$movieData["movieName"]}} || {{ $movieData["movieTime"] }}</h2>
            <img src="/img/bioscoop/Arrow.png" alt="Arrow" class="Arrow" id=<?php echo "$count";?>>
        </div>
        <div class="movieItems" id=<?php echo "item-$count";?>>
            <div class="seats col-lg-12 seat2">
            @if (isset($movieData["rowsLoversSeats"]))
                @for ($j = ($movieData["capacity"] / $movieData["amountOfChairsPerRow"] + count($movieData["rowsLoversSeats"])) - 1; $j > 0 ; $j--)
                    <?php $bool = false; ?>
                    @foreach($movieData["rowsLoversSeats"] as $mDRowsLoversSeats)
                        @if ($j == $mDRowsLoversSeats["row_loveseat"])
                            <div class="LoveSeat">
                                @for($i = 0; $i <= ($movieData["amountOfLoverChairs"] % 2 == 0 ? $movieData["amountOfLoverChairs"] / 2 : floor($movieData["amountOfLoverChairs"] / 2 - ($countLove % 2 == 0 ? 0 : 1 )));$i++)
                                    <img src="/img/bioscoop/loveseat.png" alt="seat" id="seat-<?php echo $count;?>" class="<?php (!isset($movieData["chairs"][0][$count]["used"])? null :($movieData["chairs"][0][$count]["used"] == 1 ?  print("bezet chair") : print("chair")));?>">
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
                            <img src="/img/bioscoop/seat.png" alt="seat" id="seat-<?php echo $count;?>" class=<?php (!isset($movieData["chairs"][0][$count]["used"])? null :($movieData["chairs"][0][$count]["used"] == 1 ?  print("bezet chair") : print("chair"))); $count--;?>>
                        @endfor
                    @endfor
                </div>
            @endif
            </div>
        </div>
        <?php $count2++;?>
    @endforeach
@endsection