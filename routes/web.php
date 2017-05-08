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

Route::get('/home', 'HomeController@index');

  Route::get('administration/admins/data',['as' => 'administration.admins.data' , 'uses' =>'AdminController@anyData']);

Route::prefix('administration')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::prefix('/enseignants')->group(function() {
            Route::get('/', 'EnseignantsController@index');
            Route::get('/ajouter', 'EnseignantsController@ajouter');
            Route::post('/', 'EnseignantsController@store');
            Route::get('{user}/modifier', 'EnseignantsController@modifier');

    });
    Route::prefix('/admins')->group(function() {
            Route::get('/', 'AdminController@index');
            Route::get('/ajouter', 'AdminController@ajouter');
            Route::post('/', 'AdminController@store');
            Route::get('{user}/modifier', 'AdminController@modifier');
            Route::post('/update', 'AdminController@update');
            Route::get('{user}/supprimer', 'AdminController@supprimer');
            Route::post('/changemdp', 'AdminController@modifiermdp');
            Route::post('/changetof', 'AdminController@modifierphoto');

    });
});

