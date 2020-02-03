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
Route::view('/dashboard/index', 'maindashboard.index')->middleware('verified', 'checkactive')->name('indexdosen');
Route::get('/dashboard/index/view/asdos/bimbel/{gender}','AsdosController@viewAsdosBimbel')->name('viewAsdosBimbel');
Route::get('/dashboard/index/hrd/persetujuan/view', 'PersetujuanController@view')->name('viewpersetujuan');
Route::get('/dashboard/index/hrd/persetujuan/update/{id}', 'PersetujuanController@update')->name('updatepersetujuan');
Route::get('/registerasdos', function () {
    return view('backupmain.register2');
});
Route::post('/registerasdos/kirim', 'Auth\RegisterController@registerasdos')->name('registerasdos');
Route::get('/registerasdos/statusakun', function () {
    return view('auth.notactive');
})->name('notactive');

Route::get('/test', function () {
    return view('maindashboard.index');
});


