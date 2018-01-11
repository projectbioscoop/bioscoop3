@extends('master')

@section('content')

    <h2>Agenda planning</h2>
    <form action="" method="post">
        <label for="selectionAmount">Selecteer hoeveel films je wilt toevoegen</label>
        <select name="selectionAmount" id="selectionAmount">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
        </select>
    </form>


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
            <option value="">Zaal 1</option>
        </select>

        <input type="submit" value="Update">
    </form>

@endsection