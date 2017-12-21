@extends('master')


@section('links')
    <link rel="stylesheet" href="/css/PaymentComplete.css">
@endsection

@section('content')

    <div class="img_class">
        <img class="stockphoto" src="/img/bioscoop/ppl.jpg" alt="">
    </div>
    <div class="allText">
        <div class="text">
            <h1>Gefeliciteerd!</h1>
        </div>
        <div class="text2">
            <h3>Uw betaling is geslaagd, de tickets worden naar uw email verzonden.</h3>
        </div>
        <a href="/" class="button">< Home<i class="icon-chevron-right"></i></a>
    </div>




@endsection
