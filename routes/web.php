<?php
use Illuminate\Support\Facades\Auth;
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
Route::get('/dashboard/index/view/asdos/{type}/{activity?}/{gender?}/{semester?}/{kampus?}/','AsdosController@viewFilteredAsdos')->name('filteredAsdos');

Route::get('/dashboard/index/hrd/persetujuan/view', 'PersetujuanController@view')->name('viewpersetujuan');
Route::get('/dashboard/index/hrd/persetujuan/update/{id}', 'PersetujuanController@update')->name('updatepersetujuan');
Route::get('/registerasdos', 'Auth\RegisterController@registerasdosShow');
Route::post('/registerasdos/kirim', 'Auth\RegisterController@registerasdos')->name('registerasdos');
Route::get('/registerasdos/statusakun','UserActivationController@show')->name('notactive');
Route::get('/dashboard/index/asdos','DashboardIndexController@indexasdos')->name('indexasdos');

Route::get('/dashboard/index/asdos/profile', 'AsdosController@profileAsdos')->name('profileAsdos');


Route::post('/dashboard/index/asdos/profile/uploadprofilepic','UploadProfileImageController@upload')->name('uploadProfileAsdos');
Route::post('/dashboard/index/asdos/profile/updateprefer','AsdosController@updatePreferAsdos')->name('updatePreferAsdos');
Route::get('/dashboard/index/asdos/currentransaction/view/{status}','TransactionController@viewtransactionasdosbystatus')->name('viewpesananasdosbystatus');
Route::get('/dashboard/index/asdos/commentrating/{user_id?}','CommentController@viewasdoscomments')->name('viewcommentratingbyuser');

Route::get('/dasbboard/index/dosen/payout/all','PayoutController@viewallpayouts')->name('showallpayout');
Route::post('/dashboard/index/dosen/payout/store/{transaction_id}','PayoutController@store')->name('storepayout');
Route::get('/dashboard/index/dosen/payout/download/{payout_id}','PayoutController@downloadpayment')->name('downloadpayout');
Route::get('/dashboard/index/dosen/payout/{transaction_id}/','PayoutController@viewpage')->name('showPayoutPage');
Route::get('/dashboard/index/dosen/order/{activity}/{asdos}','TransactionController@show')->name('showOrderPage');
Route::get('/dashboard/index/dosen/order/list','TransactionController@showUserOrder')->name('showUserOrder');
Route::post('/dashboard/index/dosen/order/{activity}/{asdos}','TransactionController@store')->name('storeTransaction');
Route::get('/dashboard/index/dosen/order/list/delete/{id}','TransactionController@delete')->name('deleteTransaction');
Route::get('/dashboard/index/operational/pendingtransaction/view','TransactionController@pendingtransaction')->name('viewpendingtransaction');
Route::get('/dashboard/index/operational/currentransaction/view','TransactionController@currenttransaction')->name('viewpesananberjalan');
Route::get('/dashboard/index/operational/pendingpayouts/view','PayoutController@showconfirpayouts')->name('viewpendingpayout');
Route::get('/dashboard/index/operational/transaction/cost/{id}','TransactionController@showcosthistory')->name('showcosthistory');

Route::get('/bimbinganbelajar/{activity?}/{gender?}','FilterAsdosController@bimbinganbelajarview')->name('viewbimbinganbelajar');
Route::get('/matakuliah/{activity?}/{kampus?}/{semester?}/{jurusan?}/{gender?}','FilterAsdosController@matakuliahview')->name('viewmatakuliah');
Route::get('/general/{activity?}','FilterAsdosController@generalview')->name('viewgeneral');