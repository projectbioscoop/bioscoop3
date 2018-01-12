@extends('master')

@section('hero-content')

<img class="mySlides" src="img/hero_scherem_1.jpeg" alt="">
<img class="mySlides" src="img/hero_scherem_2.jpeg" alt="">
<img class="mySlides" src="img/hero_scherem_3.jpeg" alt="">
<img class="mySlides" src="img/hero_scherem_4.jpeg" alt="">

@endsection

@section('content')
    <div class="welkom">
        <h1 class="welkomtext">Welkom</h1>
        <p class="welkomtext">Welkom bij de bioscoop van Bioscoop3.</p>
    </div>
@endsection

@section("scripts")
    <script src="/js/slider.js" type="text/javascript"></script>
@endsection