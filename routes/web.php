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

//Route::get('/', 'HomeController@index');

Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('home');
})->middleware('guest');
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware('verified', 'checkactive', 'checkrole');
Route::get('/dashboard/index/hrd', 'DashboardIndexController@indexhrd')->name('indexhrd');
Route::get('/dashboard/index/operational','DashboardIndexController@indexoperational')->name('indexoperational');
Route::get('/dashboard/index/dosen', 'DashboardIndexController@indexDosen')->middleware('verified', 'checkactive')->name('indexdosen');
Route::post('/dashboard/index/view/asdos/bimbel','AsdosController@viewAsdosBimbel')->name('viewAsdosBimbel');
Route::post('/dashboard/index/view/asdos/{type}','AsdosController@viewFilteredAsdos')->name('filteredAsdos');

Route::get('/dashboard/index/hrd/persetujuan/view', 'PersetujuanController@view')->name('viewpersetujuan');
Route::get('/dashboard/index/hrd/persetujuan/update/{id}', 'PersetujuanController@update')->name('updatepersetujuan');
Route::get('/registerasdos', 'Auth\RegisterController@registerasdosShow');
Route::post('/registerasdos/kirim', 'Auth\RegisterController@registerasdos')->name('registerasdos');
Route::get('/registerasdos/statusakun', function () {
    return view('auth.notactive');
})->name('notactive');

Route::get('/test', function () {
    return view('maindashboard.index');
});

Route::get('/dashboard/index/asdos/profile', 'AsdosController@profileAsdos')->name('profileAsdos');


Route::post('/dashboard/index/asdos/profile/uploadprofilepic','UploadProfileImageController@upload')->name('uploadProfileAsdos');
Route::post('/dashboard/index/asdos/profile/updateprefer','AsdosController@updatePreferAsdos')->name('updatePreferAsdos');

Route::get('/dashboard/index/dosen/order/{activity}/{asdos}','TransactionController@show')->name('showOrderPage');
Route::get('/dashboard/index/dosen/order/list','TransactionController@showUserOrder')->name('showUserOrder');
Route::post('/dashboard/index/dosen/order/{activity}/{asdos}','TransactionController@store')->name('storeTransaction');
Route::get('/dashboard/index/dosen/order/list/delete/{id}','TransactionController@delete')->name('deleteTransaction');
Route::get('/dashboard/index/operational/pendingtransaction/view','TransactionController@pendingtransaction')->name('viewpendingtransaction');
Route::get('/dashboard/index/operational/currentransaction/view','TransactionController@currenttransaction')->name('viewpesananberjalan');
Route::get('/dashboard/index/operational/transaction/cost/{id}','TransactionController@showcosthistory')->name('showcosthistory');