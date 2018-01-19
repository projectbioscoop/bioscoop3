<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>'auth'], function(){

    Route::post('/chairselect/1', "BioscoopZaalController@index");
    Route::get('/chairselectadmin', "BioscoopZaalController@indexAdmin");
    Route::resource('movie', 'MovieController');
    Route::resource('display', 'DisplayController');
    Route::get("/moviedetails", "MovieController@details");
    Route::post("/moviereturn", "MovieController@check");
    Route::post("/savemovie", "MovieController@store");

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/agenda', 'AgendaController@index')->name('agenda');
        Route::get('/hub', function(){
            return view('admin.hub');
        });
        Route::get('/chairselectadmin', "BioscoopZaalController@indexAdmin");
    });
});

Route::resource('price', 'PriceController');

Route::post('/scanticket', 'TicketController@check');
Route::resource('ticket', 'TicketController');

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/paymentcomplete', 'PaymentController@index');
Route::get('/payment', function () {
    return view('PaymentComplete.PaymentComplete');
})->name('PaymentComplete');


Route::post('/payTicket', 'PayTicketController@index');
//Route::get('/payTicket', function () {
//    return view('Payment.payTicket');
//})->name('payTicket');


if(env('APP_ENV') == 'production')
{
    Auth::routes();
}
elseif (env('APP_ENV') == 'local') 
{
    Route::get('/login', function(){return view('debug.login');});
    Route::post('/login', function(){

        $id = 1;
		$user = \App\User::find($id);

		if(!$user){
			$user = new \App\User();
			$user->id = $id;
            $user->email = 'test_Acount@rocwb.nl';
            $user->password = "1234567890";
            $user->firstname = "test";
            $user->lastname = "ettete";
            $user->insertion = "";
            $user->gender = "man";
            $user->mobileNumber = 1234567;
            $user->age = 35;
            $user->role = "admin";
			$user->save();
		}

        \Auth::login($user);
		return redirect()->route('home');
    })->name('login');

	Route::get('logout', function(){
		Auth::logout();
		return redirect()->route('login');
	});
}