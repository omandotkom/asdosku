<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
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
})->middleware('guest')->name('rumah');
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/dashboard', 'home')->name('dashboard')->middleware('auth','verified', 'checkactive', 'checkrole');
Route::get('/dashboard/index/hrd', 'DashboardIndexController@indexhrd')->name('indexhrd')->middleware('auth','hrd');
Route::get('/dashboard/index/operational','DashboardIndexController@indexoperational')->middleware('auth','verified','operational')->name('indexoperational');
Route::get('/dashboard/index/dosen', 'DashboardIndexController@indexDosen')->middleware('auth','verified', 'checkactive','dosen')->name('indexdosen');
Route::get('/dashboard/index/marketing','DashboardIndexController@indexmarketing')->name('indexmarketing')->middleware('auth','verified','marketing');
Route::post('/dashboard/index/view/asdos/bimbel','AsdosController@viewAsdosBimbel')->name('viewAsdosBimbel')->middleware('auth','dosen');
Route::get('/dashboard/index/view/asdos/{type}/{activity?}/{gender?}/{semester?}/{kampus?}/','AsdosController@viewFilteredAsdos')->name('filteredAsdos')->middleware('auth','dosen');

Route::get('/dashboard/index/hrd/persetujuan/view', 'PersetujuanController@view')->name('viewpersetujuan')->middleware('auth','hrd');
Route::get('/dashboard/index/hrd/persetujuan/view/search/{name?}','PersetujuanController@viewbyfirstname')->name('viewpersetujuanbyname')->middleware('auth','hrd');
Route::get('/dashboard/index/hrd/persetujuan/update/{id}', 'PersetujuanController@update')->name('updatepersetujuan')->middleware('auth','hrd');
Route::get('/dashboard/index/hrd/persetujuan/reject/{id?}','PersetujuanController@reject')->name('rejectpersetujuan')->middleware('auth','hrd');
Route::get('/registerasdos', 'Auth\RegisterController@registerasdosShow')->middleware('guest')->name('registerasdosshow');
Route::post('/registerasdos/kirim', 'Auth\RegisterController@registerasdos')->name('registerasdos');
Route::get('/registerasdos/statusakun','UserActivationController@show')->name('notactive')->middleware('auth','active');
Route::get('/registerasdos/pengumuman',function(){
    return view('auth.rejected');
})->name('rejected')->middleware('auth');
Route::get('/dashboard/index/asdos','DashboardIndexController@indexasdos')->name('indexasdos')->middleware('auth','asdos');

Route::get('/dashboard/index/asdos/profile', 'AsdosController@profileAsdos')->name('profileAsdos')->middleware('auth','asdos');


Route::post('/dashboard/index/asdos/profile/uploadprofilepic','UploadProfileImageController@upload')->name('uploadProfileAsdos')->middleware('auth','asdos');
Route::post('/dashboard/index/asdos/profile/updateprefer','AsdosController@updatePreferAsdos')->name('updatePreferAsdos')->middleware('auth','asdos');
Route::get('/dashboard/index/asdos/currentransaction/view/{status}','TransactionController@viewtransactionasdosbystatus')->name('viewpesananasdosbystatus')->middleware('auth','asdos');
Route::get('/dashboard/index/asdos/requestorder/view','TransactionController@pendingtransactionbyasdos')->name('asdosrequestorder')->middleware('auth');
Route::get('/dashboard/index/asdos/commentrating/{user_id?}','CommentController@viewasdoscomments')->name('viewcommentratingbyuser')->middleware('auth');

Route::get('/dasbboard/index/dosen/payout/all','PayoutController@viewallpayouts')->name('showallpayout')->middleware('auth','dosen');
Route::post('/dashboard/index/dosen/payout/store/{transaction_id}','PayoutController@store')->name('storepayout')->middleware('auth','dosen');
Route::get('/dashboard/index/dosen/payout/download/{payout_id}','PayoutController@downloadpayment')->name('downloadpayout');
Route::get('/dashboard/index/dosen/payout/{transaction_id}/','PayoutController@viewpage')->name('showPayoutPage')->middleware('auth');
Route::get('/dashboard/index/dosen/order/{activity}/{asdos}/{url?}','TransactionController@show')->name('showOrderPage')->middleware('auth','dosen');
Route::get('/dashboard/index/dosen/order/list','TransactionController@showUserOrder')->name('showUserOrder')->middleware('auth');
Route::get('/dashboard/index/dosen/order/list/request/{id?}','TransactionController@requestSelesai')->name('requestselesai')->middleware('auth','dosen');
Route::get('/dashboard/index/dosen/services/list','ServiceActivitiesController@show')->name('viewservices')->middleware('auth');
Route::post('/dashboard/index/dosen/order/{activity}/{asdos}','TransactionController@store')->name('storeTransaction')->middleware('auth','dosen');
Route::get('/dashboard/index/dosen/order/list/delete/{id}','TransactionController@delete')->name('deleteTransaction')->middleware('auth');
Route::get('/dashboard/index/operational/pendingtransaction/view','TransactionController@pendingtransaction')->name('viewpendingtransaction')->middleware('auth','operational');
Route::get('/dashboard/index/operational/currentransaction/view','TransactionController@currenttransaction')->name('viewpesananberjalan')->middleware('auth');
Route::get('/dashboard/index/operational/payoutransaction/view','TransactionController@payouttransaction')->name('viewpesananpayout')->middleware('auth');
Route::get('/dashboard/index/operational/pendingpayouts/view','PayoutController@showconfirpayouts')->name('viewpendingpayout')->middleware('auth','operational');
Route::get('/dashboard/index/operational/transaction/cost/{id}','TransactionController@showcosthistory')->name('showcosthistory')->middleware('auth');
Route::get('/dashboard/index/operational/transaction/change/{id?}','TransactionController@changetransaction')->name('changetransaction')->middleware('auth','operational');
Route::get('/dashboard/index/operational/transaction/change/asdos/by/{activity?}','FilterAsdosController@filterbyactivity')->name('filterbyactivity')->middleware('auth','operational');
Route::post('/dashboard/index/operational/transaction/change/save','TransactionController@savechangedtransaction')->name('savechangedtransaction')->middleware('auth','operational');
Route::get('/dashboard/index/operational/view/dosen','DosenController@view')->name('viewdosen')->middleware('auth','operational');
Route::get('/dashboard/index/operational/view/asdps','FilterAsdosController@showAll')->name('viewasdos')->middleware('auth','operational');

Route::get('/bimbinganbelajar/{activity?}/{gender?}','FilterAsdosController@bimbinganbelajarview')->name('viewbimbinganbelajar')->middleware('auth');
Route::get('/matakuliah/{activity?}/{kampus?}/{jurusan?}/{semester?}/{gender?}','FilterAsdosController@matakuliahview')->name('viewmatakuliah')->middleware('auth');
Route::get('/general/{activity?}/{kampus?}/{jurusan?}','FilterAsdosController@generalview')->name('viewgeneral')->middleware('auth');
Route::get('/dashboard/index/marketing/filterasdos/{kampus_id?}','FilterAsdosController@filterbycampus')->name('filterasdosmarketing')->middleware('auth','marketing');

Route::get('/pass/{p?}',function($p){
    return Hash::make($p);
});


