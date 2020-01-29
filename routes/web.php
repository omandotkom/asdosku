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
Route::view('/dashboard','dashboard')->name('dashboard')->middleware('verified','checkactive');

Route::get('/registerasdos', function(){
    return view('backupmain.register2');
});
Route::post('/registerasdos/kirim','Auth\RegisterController@registerasdos')->name('registerasdos');
Route::get('/registerasdos/statusakun',function(){
    return view('auth.notactive');
})->name('notactive');
Route::prefix('blog')->group(function () {
    Route::get('/', 'BlogController@getPosts')->name('blog.index');
    Route::middleware('Canvas\Http\Middleware\ViewThrottle')->get('{slug}', 'BlogController@findPostBySlug')->name('blog.post');
    Route::get('tag/{slug}', 'BlogController@getPostsByTag')->name('blog.tag');
    Route::get('topic/{slug}', 'BlogController@getPostsByTopic')->name('blog.topic');
});

Route::get('/test',function(){
    return view('maindashboard.index');
});
