<?php
    
    namespace App\Http\Controllers;
    
    use App\tbl_displays;
    use App\tbl_movies;
    use Illuminate\Http\Request;
    use App\User;
    
    class AgendaController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return view('admin.Agenda.index');
        }
        
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $mvs[] = 0;
            $i = 0;
            $movies = tbl_movies ::all();
            foreach ( $movies as $movie ) {
                $mvs[ $i ] = file_get_contents("http://www.omdbapi.com/?apikey=31d16dc7&i=" . $movie -> movie_id . "&plot=full=json");
                $mvs[ $i ] = json_decode($mvs[ $i ]);
                $i++;
            }
            
            return view('admin.Agenda.UpdateAgenda', compact('mvs', 'mvs'));
        }
        
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }
        
        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }
        
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            return view('agenda.edit', compact('agenda'));
        }
        
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            request() -> validate([
                'movie' => 'required|string',
                'date' => 'required|date',
                'startTime' => 'required',
                'theaterRoom' => 'required'
            ]);
            $id -> update($request -> all());
            
            return redirect() -> route('admin.Agenda.index')
                              -> with('success', 'agenda updated successfully');
        }
        
        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
    }
