@extends('master')

@section('content')

<h2>Agenda planning</h2>

<form action="" class="form-control form-group">

    <label for="movie">Film</label>
    <select name="" id="">

    </select>

    <label for="date" id="date">Datum</label>
    <input type="date" id="date" name="date">

    <label for="startTime">Start Tijd</label>
    <select name="startTime" id="startTime">
        <option value="">15:00 - 17:00</option>
        <option value="">18:00 - 20:00</option>
        <option value="">20:30 - 22:00</option>
        <option value="">22:30 - 24:00</option>
    </select>

    <label for="theaterRoom">Bioscoopzaal</label>
    <select name="" id="">
        <option value="">Zaal 1 </option>
    </select>
</form>

@endsection