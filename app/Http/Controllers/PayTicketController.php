<?php

namespace App\Http\Controllers;

use App\tbl_displays;
use App\tbl_movies;
use App\tbl_price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chairs;
        $SL = $_POST["chairL"];
        for ($i = 0; $i < $SL; $i++)
        {
            $temp = "seat".$i;
            if ($i == 0)
            {
                $chairs = [$_POST[$temp]];
            }
            else
            {
                $chairs = array_merge($chairs, [$_POST[$temp]]);
            }
        }    
        $movie = "tt4468740";
        $id = tbl_movies::where('movie_id','=', $movie)->select('id')->first();
        //        dd($id);
        $display = tbl_displays::find(4);
        $loveseats = $_POST["LSB"];

        if ($loveseats == "true")
        {
            $price = DB::table('tbl_price')->select('price')->where ('seatname', '=', 'loveseat')->get();
        }
        else
        {
            $price = DB::table('tbl_price')->select('price')->where ('seatname', '=', 'normalseat')->get();
        }
        $price = $price[0]->price * count($chairs);

        $movie = file_get_contents("http://www.omdbapi.com/?apikey=31d16dc7&i=" . $movie . "&plot=full=json");
        $movie = json_decode($movie);
        $data = [
            $movie,
            $loveseats,
            $chairs,
            $display,
            $price
        ];
        return view('Payment.payTicket', compact('data','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
