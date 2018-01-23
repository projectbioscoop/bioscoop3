@extends('master')

@section('content')
    {{--{{dd($displayinfo)}}--}}
    <h1>{{$displayinfo[0]->Title}}</h1>
    <ul>
        <li>{{$displayinfo[1]->date}}</li>
        <li>{{$displayinfo[1]->time}}</li>
    </ul>
    <form action="{{action('BioscoopZaalController@index')}}" method="post">
        {{csrf_field()}}
        <table class="table">
            <tr>
                <th>Type</th>
                <th>Prijs</th>
                <th>Aantal</th>
            </tr>
            <tr>
                <td>Normaal</td>
                <td>€{{$displayinfo[2]->normalprice}}.-</td>
                <td>
                    <select name="seat" id="normalselect">
                        @for($i = 0; $i < 13; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <input type="hidden" name="displayid" value="{{$displayinfo[1]->id}}">
                </td>
            </tr>
            @if($displayinfo[1]->theater_id == 3)
            <tr>
                <td>Loveseat</td>
                <td>€{{$displayinfo[2]->loveseatprice}}.-</td>
                <td>
                    <select name="seat" id="loveseatselect">
                        @for($i = 0; $i < 13; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </td>
            </tr>
            @endif
        </table>
        <input type="hidden" name="loveseat" value="false" id="loveseat">
            
        <input type="submit" value="Bestel tickets">
    </form>
@endsection