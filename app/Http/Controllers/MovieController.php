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
        $this->validate($request, [
            'movieid' => 'required|string|min:2'
        ]);

        $movie = new \App\Movie();
        $movie->movieid = $request->movieid;
        $movie->save();
        return redirect("admin.moviedetails");
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
        $data = file_get_contents("http://www.omdbapi.com/?apikey=31d16dc7&i=".$movieid."&plot=full");
        return view("admin.moviereturn", compact("data", "movieid"));
    }
}
