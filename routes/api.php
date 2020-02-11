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
Route::get('/transaction/update/{id}/{status}','TransactionController@updatestatus')->name('transactionstatusupdate');
Route::get('/transaction/detil/{id}','TransactionController@detil')->name('transactiondetil');
Route::get('/profile/user/{id}','AsdosController@profile')->name('completeProfile');
Route::post('/transaction/cost/store/{id}','CostController@store')->name('addcost');
Route::get('/transaction/cost/sum/{id}','CostController@sumcost');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
