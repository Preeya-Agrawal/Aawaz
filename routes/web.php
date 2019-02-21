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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::match(['get','post'], '/admin','AdminController@index');
Route::group(['middleware' =>['auth']],function(){
    Route::get('admin/dashboard','DashboardController@dashboard'); 
    Route::get('admin/settings','AdminController@settings'); 
    
    //category Route(admin)
    Route::match(['get','post'], '/admin/add-category','CategoryController@addcategory');

});
Route::get('/logout','AdminController@logout');