@extends("master")

@section("content")

<?php
    $movieid = $data;
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
    echo "<h5><b>Titel</b></h5>". $totalArray["Title"]."<hr>";
    echo "<h5><b>Minumum Leeftijd</h5></b>". $totalArray["Rated"]."<hr>";
    echo "<h5><b> Release datum</b> </h5>". $totalArray["Year"];
?>

<form method="POST" action= {{ action('MovieController@store')}}>
    {{csrf_field()}}
    <input type="hidden" value="$movieid">
    <input value="Deze film opslaan" type="submit">
</form>

@endsection