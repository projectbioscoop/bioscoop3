@extends('master')

@section('hero-content')
<div class="welkom">
    <h3 class="welkomtext wttl">Welkom</h3>
    <p class="welkomtext">bij Bioscoop3.</p>
</div>
<img class="mySlides" src="img/hero_scherem_1.jpeg" alt="">
<img class="mySlides" src="img/hero_scherem_2.jpeg" alt="">
<img class="mySlides" src="img/hero_scherem_3.jpeg" alt="">
<img class="mySlides" src="img/hero_scherem_4.jpeg" alt="">

@endsection


@section("scripts")
    <script src="/js/slider.js" type="text/javascript"></script>
@endsection 