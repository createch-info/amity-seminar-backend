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
use App\Register;
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/seminar', 'SeminarController');
Route::resource('/register', 'RegisterController');
Route::delete('deletemultiple', 'RegisterController@deleteAll');
Route::patch('update_slots/{id}','SeminarController@updateSlots');
Route::get("seminar/link/{id}","SeminarController@genrateLink");