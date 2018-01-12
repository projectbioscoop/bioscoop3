@extends('master')

@section ('content')
<?php
    $links = [
        ["link" => "/chairselectadmin", "title" => "zaal overzicht"],
    ];
?>
<div class="inline">
    @foreach ($links as $link)
        <a href= {{ $link["link"] }} class="card"> {{ $link["title"] }} </a>
    @endforeach
</div>
@endsection