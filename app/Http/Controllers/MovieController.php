<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $movie = new \App\tbl_movies();
        $movie->movie_id = $request->id;
        $movie->movie_title = $request->title;
        $movie->save();
        return view("admin.moviedetails");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
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

    public function details()
    {
        return view("admin.moviedetails");
    }

    public function check()
    {
        $movieid = $_POST["id"];
        $movieid = urlencode($movieid);
        $json = file_get_contents("http://www.omdbapi.com/?apikey=31d16dc7&i=".$movieid."&plot=short&r=json");
        $tmp = json_decode($json, true);
        $data = array_reverse($tmp);
        return view("admin.moviereturn", compact("data", "movieid"));
    }
}
