@extends("master")

@section("content")

<?php
    $data = trim($data, '{"');
    $data = trim($data, '"}');
    $moviedata = explode('","', $data);
    $totalArray;
    $temp2 = null;
    foreach ($moviedata as $movieData)
    {
        $temp = explode('":"',$movieData);
        for ($i = 1;$i < count($temp);$i++)
        {
            isset($temp2)?$temp2 = $temp2 + $temp[$i]:$temp2 = $temp[$i];
        }
        $Array = [
            $temp[0] => $temp2
        ];
        $temp2 = null;
        if(!isset($totalArray))
        {
            $totalArray = $Array;
        }
        else
        {
            $totalArray = array_merge($totalArray, $Array);
        }
    }
    // echo "<img src=''"
    echo "<h5><b>Titel</b></h5>". $totalArray["Title"]."<hr>";
    echo "<h5><b>Minumum Leeftijd</h5></b>". $totalArray["Rated"]."<hr>";
    echo "<h5><b> Release datum</b> </h5>". $totalArray["Year"];
?>

<form methode="POST" action={{action("MovieController@store")}}>
    <input type="hidden" value="$data">
    <input value="Save this movie" type="submit">
</form>

@endsection