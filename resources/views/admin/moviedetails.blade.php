@extends("master")

@section("content")
    <h3>De stappen voor het toevoegen van een film</h3>
    <div class="addsteps">
        <ul class="movieaddsteps">
            <li>Ga naar http://www.imdb.com/</li>
            <li>Zoek in de searchbar bovenin naar de film die je wilt toevoegen aan de database(bijvoorbeeld: jumanji: Welcome to the jungle</li>
            <li>Kopieer vervolgens het ID dat in de URL staat ( begint met tt)</li>
            <li>Plak het ID in de searchbar hieronder en klik op Search ID</li>
        </ul>
    </div>
<form class="addmovie" method="POST" action={{ action('MovieController@check') }}>
{{csrf_field()}}
    <input type="text" name="id" value="tt2283362">
    <input value="Search ID" type="submit">
</form>

@endsection