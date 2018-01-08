@extends('master')

@section('content')

    <div class="movie-top">
        <div class="movie-left">
            <h1>{{$movie->Title}}</h1>
            <p>{{$movie->Plot}}</p>
            <p>{{$movie->Runtime}}</p>
            <p>{{$movie->Genre}}</p>
        </div>
        <div class="movie-right">
            <img src="{{$movie->Poster}}" alt="Movie-poster">
        </div>
    </div>
    <div class="movie-bot">
        <h3 id="test">Tijden voor {{$movie->Title}}</h3>
        @foreach($displays as $display)
            <div class="display">
                <p>{{$display->date}}</p>
                <p>{{$display->time}}</p>
            </div>
        @endforeach
    </div>

@endsection