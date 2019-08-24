<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("admin/login",'LoginController@login');

Route::prefix('admin')->group(function () {
    Route::post("checkValidashion","SeminarController@checkValidashion");
    Route::resource("seminar","SeminarController");
    Route::post("seminar/booking","SeminarController@booking");
    Route::post("seminar/updateslot/{id}","SeminarController@updateslot");
    Route::get("seminar/registrants/{id}","SeminarController@registrants");
    Route::get("seminar/link/{id}","SeminarController@genrateLink");
    Route::delete('seminar/registran/{id}','SeminarController@deleteregistran');
    Route::get("checkMail","SeminarController@checkEmail");
    Route::get("sendemails","CronController@remindermail");
    Route::get("houremails","CronController@hour_reminder");

});