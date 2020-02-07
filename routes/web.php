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
Route::get('/', "HomeController@index")->name("home");

//AUTH
Route::get('login', 'Auth\LoginController@login')->name("login");
Route::post('login', 'Auth\LoginController@authenticate');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('getlogout', 'Auth\LoginController@logout');

Route::prefix('kedai')->group(function() {
    Route::resource('tentang', 'Kedai\TentangController', ['except' => []]);

    Route::resource('menu', 'Kedai\MenuController', ['except' => []]);

    Route::get('kedai-datatable/{status}', 'Input\KedaiController@datatableData');
    Route::get('kedai/getfiles/{id}','Input\KedaiController@getFiles');

});


//ABOUT
Route::get('about', 'About\AboutController@index');
Route::get('log', 'About\LogController@index');
Route::get('contact', 'About\ContactController@index');

//ADMINISTRATOR
Route::prefix('administrator')->group(function() {
    Route::get('menu/datatabledata/{level}', 'Administrator\MenuController@datatableData');
    Route::get('group/datatabledata', 'Administrator\GroupController@datatableData');
    Route::get('user/datatabledata', 'Administrator\UserController@datatableData');
    Route::get('user/getlevel/{unitid}', 'Administrator\UserController@getLevel');
    Route::get('user/getbidang/{levelid}/{unitid}', 'Administrator\UserController@getBidang');
    Route::get('user/getbyunit/{unitap}', 'Administrator\UserController@getByUnit');
    Route::post('user/update/{id}', 'Administrator\UserController@update');
    Route::resource('menu', 'Administrator\MenuController');
    Route::resource('group', 'Administrator\GroupController');
    Route::resource('user', 'Administrator\UserController');
});

