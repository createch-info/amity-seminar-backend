<?php

use App\Mail\DeleteSem;
use App\Seminar;
use Illuminate\Http\Request;

use App\Mail\RegistranRegister;
use App\Register;

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


Route::get('/email',function (){
    $semnier=Seminar::find(65);
    return new RegistranRegister($semnier,'paypal','ACCMODATION CONTENT');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("admin/login",'LoginController@login');

Route::prefix('admin')->group(function () {
    Route::get("seminar/eventlist","SeminarController@eventList");
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


Route::get('/preview',function ()
{
    $semnier=\App\Seminar::find(58);
//    return $semnier;
    return new \App\Mail\ReminderEmail($semnier,'paypal','Subject','lahsdouiasj');
});
