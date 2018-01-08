@extends('master')

@section('content')
    <div class="movie-top">
        <div class="movie-left">
            <h1>{{$movie->Title}}</h1>
            <p>{{$movie->Plot}}</p>
        </div>
        <div class="movie-right">
            <img src="{{$movie->Poster}}" alt="Movie-poster">
        </div>
    </div>
    <div class="displays">

    </div>

@endsection