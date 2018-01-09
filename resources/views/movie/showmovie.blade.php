@extends('master')

@section('content')

    <div class="movie-top">
        <div class="movie-left">
            <h1>{{$movie->Title}}</h1>
            <p>Speeltijd: {{$movie->Runtime}}</p>
            <p>Genre: {{$movie->Genre}}</p>
            <p>{{$movie->Plot}}</p>
        </div>
        <div class="movie-right">
            <img src="{{$movie->Poster}}" alt="Movie-poster">
        </div>
    </div>
    <div class="movie-bot">
        <h3 id="test">Tijden voor {{$movie->Title}}</h3>
        @foreach($displays as $display)
            <div class="display">
                <a href="{{action('DisplayController@show', $display->id)}}">
                    <p>{{$display->date}}</p>
                    <p>{{$display->time}}</p>
                </a>
            </div>
        @endforeach
    </div>

@endsection