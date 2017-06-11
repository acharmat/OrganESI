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


Route::prefix('administration')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::post('/logout', 'Auth\AdminloginController@logout')->name('admin.logout');



    Route::prefix('/admins')->group(function() {
        Route::get('/', 'AdminController@index');
        Route::get('/ajouter', 'AdminController@ajouter');
        Route::post('/', 'AdminController@store');
        Route::get('{user}/modifier', 'AdminController@modifier');
        Route::post('/update', 'AdminController@update');
        Route::get('{user}/supprimer', 'AdminController@supprimer');
        Route::post('/changemdp', 'AdminController@modifiermdp');
        Route::post('/changetof', 'AdminController@modifierphoto');
        Route::get('/data',['as' => 'administration.admins.data' , 'uses' =>'AdminController@anyData']);


    });

    Route::prefix('/enseignants')->group(function() {
        Route::get('/', 'EnseignantsController@index');
        Route::get('/ajouter', 'EnseignantsController@ajouter');
        Route::post('/', 'EnseignantsController@store');
        Route::get('{user}/modifier', 'EnseignantsController@modifier');
        Route::post('/update', 'EnseignantsController@update');
        Route::get('{user}/supprimer', 'EnseignantsController@supprimer');
        Route::get('{user}/visioner', 'EnseignantsController@visioner');
        Route::post('/changemdp', 'EnseignantsController@modifiermdp');
        Route::post('/changetof', 'EnseignantsController@modifierphoto');
        Route::post('/stor_diplome', 'EnseignantsController@store_diplome');
        Route::post('/store_grade', 'EnseignantsController@store_grade');
        Route::post('/store_echelon', 'EnseignantsController@store_echelon');
        Route::post('/changefonc', 'EnseignantsController@modifierfonc');
        Route::get('/data',['as' => 'administration.enseignants.data' , 'uses' =>'EnseignantsController@anyData']);



    });

    Route::prefix('/conge')->group(function() {
        Route::get('/', 'CongeController@index');
        Route::get('/ajouter', 'CongeController@ajouter');
        Route::post('/', 'CongeController@store');
        Route::get('{conge}/modifier', 'CongeController@modifier');
        Route::post('/update', 'CongeController@update');
        Route::get('{conge}/supprimer', 'CongeController@supprimer');
        Route::get('/data',['as' => 'administration.conge.data' , 'uses' =>'CongeController@anyData']);
        Route::get('{conge}/visioner', 'CongeController@visioner');


    });

    Route::prefix('/decisions')->group(function() {
        Route::get('/', 'DecisionController@index');
        Route::get('/ajouter', 'DecisionController@ajouter');
        Route::post('/', 'DecisionController@store');
        Route::get('{decision}/visioner', 'DecisionController@visioner');
        Route::get('{decision}/modifier', 'DecisionController@modifier');
        Route::post('/update', 'DecisionController@update');
        Route::get('{decision}/supprimer', 'DecisionController@supprimer');
        Route::get('/data',['as' => 'administration.decision.data' , 'uses' =>'DecisionController@anyData']);
    });



    Route::prefix('/diplomes')->group(function() {
        Route::get('/{id}', 'DiplomeController@index');
        Route::get('{/ajouter/', 'DiplomeController@ajouter');
        Route::post('{/', 'DiplomeController@store');
        Route::get('{diplome}/modifier', 'DiplomeController@modifier');
        Route::post('/update', 'DiplomeController@update');
        Route::get('{diplome}/supprimer', 'DiplomeController@supprimer');
        Route::get('/data/{id}',['as' => 'administration.diplomes.data' , 'uses' =>'DiplomeController@anyData']);

    });

    Route::prefix('/grades')->group(function() {
        Route::get('/{id}', 'GradeController@index');
        Route::get('{grade}/modifier', 'GradeController@modifier');
        Route::post('/update', 'GradeController@update');
        Route::get('{grade}/supprimer', 'GradeController@supprimer');
        Route::get('/data/{id}',['as' => 'administration.grades.data' , 'uses' =>'GradeController@anyData']);

    });

    Route::prefix('/echelons')->group(function() {
        Route::get('/{id}', 'EchelonController@index');
        Route::get('{titularisation}/modifier', 'EchelonController@modifier');
        Route::post('/update', 'EchelonController@update');
        Route::get('{titularisation}/supprimer', 'EchelonController@supprimer');
        Route::get('/data/{id}',['as' => 'administration.echelons.data' , 'uses' =>'EchelonController@anyData']);

    });

    Route::prefix('/importexport')->group(function() {
        Route::get('/', 'ImportExportController@index');
        Route::get('/downloadExcel/{type}', 'ImportExportController@downloadExcel');
        Route::post('/importExcel', 'ImportExportController@importExcel');
        Route::get('/exportPDF', 'ImportExportController@exportPDF');

    });


});

Route::prefix('enseignant')->group(function() {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
    Route::get('/', 'EnseignantController@index');
    Route::post('/logout', 'Auth\LoginController@Elogout')->name('enseignant.logout');
    Route::get('/data',['as' => 'enseignant.decision.data' , 'uses' =>'EnseignantController@anyData']);


    Route::prefix('/decisions')->group(function() {
        Route::get('{decision}/visioner', 'EnseignantController@visioner');
    });


    Route::prefix('/compte')->group(function() {
        Route::get('/', 'CompteController@index');
        Route::post('/changemdp', 'CompteController@modifiermdp');
        Route::get('/test', 'CompteController@modifiermdp');

    });

    Route::prefix('/conge')->group(function() {
        Route::get('/', 'DCongeController@index');
        Route::post('/', 'DCongeController@store');
        Route::get('/data',['as' => 'enseignant.conge.data' , 'uses' =>'DCongeController@anyData']);


    });

});



