@extends('master')

@section('links')
    <link rel="stylesheet" href="./css/updateAgenda.css">
@endsection

@section('content')
    {{--{{dd($mvs)}}--}}
    <div class="agenda-planning">
        <h2>Agenda planning</h2>
        <select name="selectionAmount" id="selectionAmount">
            @for($i = 0; $i <= 20; $i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>

        <form action="" method="POST" class="form-group ">
            <div id="updateForm">

                {{--<label for="movie">Film</label>--}}
                {{--<select name="movie" id="movie">--}}

                {{--</select>--}}

                {{--<label for="date" id="date">Datum</label>--}}
                {{--<input type="date" id="date" name="date">--}}

                {{--<label for="startTime">Start Tijd</label>--}}
                {{--<select name="startTime" id="startTime">--}}
                {{--<option value="">15:00 - 17:00</option>--}}
                {{--<option value="">18:00 - 20:00</option>--}}
                {{--<option value="">20:30 - 22:00</option>--}}
                {{--<option value="">22:30 - 24:00</option>--}}
                {{--</select>--}}

                {{--<label for="theaterRoom">Bioscoopzaal</label>--}}
                {{--<select name="theaterRoom" id="theaterRoom">--}}
                {{--<option value="">Zaal 1</option>--}}

                {{--</select>--}}

            </div>
            <input type="submit" value="Update" class="btn">
        </form>
    </div>
    <?php
    $options = "";

    foreach ( $mvs as $mv ) {
        $options = "<option>" . $mv -> Title . "</option>" . $options;
    }
    ?>
    <input type="hidden" name="Options" value="{{ $options }}" id="options">
@endsection