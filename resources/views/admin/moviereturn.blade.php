@extends("master")

@section("content")

<?php
    echo "<h5><b>Titel</b></h5>". $data["Title"]."<hr>";
    echo "<h5><b>Minumum Leeftijd</h5></b>". $data["Rated"]."<hr>";
    echo "<h5><b> Release datum</b> </h5>". $data["Year"];
?>

<form method="POST" action= {{ action('MovieController@store')}}>
    {{csrf_field()}}
    <input type="hidden" value= {{ $data["imdbID"] }} name="id">
    <input type="hidden" value="<?php echo $data["Title"] ;?>" name="title">
    <input value="Deze film opslaan" type="submit">
</form>

@endsection