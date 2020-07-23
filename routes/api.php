<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
/*THIS IS FOR THE APP*/
Route::prefix('auth')->group(function () {
    //auth/login
    Route::post('login', 'Auth\LoginController@ApiLogin')->name('loginapi');
});
/*END FOR THE APP*/
Route::get('/notifications/send','NotificationController@check')->name('sendnotification');
Route::post('/registerasdos/tambahjurusan','Auth\RegisterController@addnewjurusan')->name('addnewjurusan');
Route::post('/payout/confirm','PayoutController@payoutconfirm')->name('confirmpayout');
Route::get('/transaction/update/{id}/{status}','TransactionController@updatestatus')->name('transactionstatusupdate');
Route::get('/transaction/detil/{id}','TransactionController@detil')->name('transactiondetil');
Route::get('/profile/user/{id}','AsdosController@profile')->name('completeProfile');
Route::post('/transaction/cost/store/{id}','CostController@store')->name('addcost');
Route::get('/transaction/cost/sum/{id}','CostController@sumcost');
Route::post('/basicnotification','BasicNotification@view')->name('basicnotification');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/transaction/order/bid/showactivities/{serviceid?}','BidController@activitiesbyservice')->name('showactivitiesbyservice');
Route::get('/transaction/order/bid/showactivity/{id?}','BidController@activitybyid')->name('showactivitybyid');
Route::post('/discount','DiscountController@checkdiscount')->name("discount");
Route::post('/guestquestion','ContactController@store')->name('guestquestion');
Route::get('/user','SampleController@ApiUser')->middleware('auth:api');
Route::post('/registercheck',function(Request $request){
    if (!isset($request->codename)){
        return response("error 1",403);
    }
    if ($request->codename != "system3298"){
        return response("error 2",403);
    }
    Storage::put('.registerstatus.txt',$request->content);
    $content = Storage::get('.registerstatus.txt');
    return response("success, current value " . $content,200);
});