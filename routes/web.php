<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/cc', function() {
    // Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});

Route::get('/testdb', function() {
  try {
      echo DB::connection()->getPdo();;
  } catch (\Exception $e) {
      die("Could not connect to the database.  Please check your configuration. error:" . $e );
  }
});

/*Route::get('/',[
	'uses' => 'LoginController@viewLogin',
	'as' => 'viewLogin'
]);*/
Route::get('/', 'App\Http\Controllers\LoginController@viewLogin')->name("viewLogin");
Route::get('proses_login', 'App\Http\Controllers\LoginController@prosesLogin')->name("prosesLogin");
Route::get('proses_logout', 'App\Http\Controllers\LoginController@prosesLogout')->name("prosesLogout");
// <---------------------- Admin Controller ---------------------->
Route::group(["middleware" => 'login'],function(){
	Route::get('/view_category/{id?}', 'App\Http\Controllers\AdminController@viewCategory')->name("viewCategory");
	Route::post('/actionCUCategory/{id?}', 'App\Http\Controllers\AdminController@actionCUCategory')->name("actionCUCategory");

	Route::get('/view_articles/{id?}', 'App\Http\Controllers\AdminController@viewArticles')->name("viewArticles");
	Route::post('/actionCUArticles/{id?}', 'App\Http\Controllers\AdminController@actionCUArticles')->name("actionCUArticles");
});