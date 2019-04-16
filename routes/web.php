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
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    /*  MAIN*/

    Route::get('/dashboard','PagesController@dashboard')->name('dashboard');
    Route::get('/','PagesController@dashboard')->name('dashboard');
    Route::group(['prefix' => 'users'], function () {
        Route::get('/data', 'UsersController@anyData')->name('users.data');
        Route::get('/show/{id}', 'UsersController@show')->name('users.show');
        Route::post('/update', 'UsersController@update')->name('users.update');
        Route::get('/info/{id}', 'UsersController@info')->name('users.info');
        Route::get('/addForm', 'UsersController@addForm')->name('users.addForm');
        Route::post('/create', 'UsersController@create')->name('users.create');
        Route::get('/destroy/{id}', 'UsersController@destroy')->name('users.destroy');
    });
    Route::group(['prefix'=>'clients'],function (){
       Route::get('/data','ClientsController@anyData')->name('clients.data');
       Route::get('/show/{id}','ClientsController@show')->name('clients.show');
       Route::post('/update','ClientsController@update')->name('clients.update');
       Route::get('/addForm','ClientsController@addForm')->name('clients.addForm');
        Route::get('/destroy/{id}','ClientsController@info')->name('clients.destroy');
        Route::get('/addForm','ClientsController@addForm')->name('clients.addForm');
       Route::post('/create','ClientsController@create')->name('clients.create');
    });
    Route::group(['prefix'=>'objs'],function (){
       Route::post('/create','ObjsController@create')->name('objs.create');
        Route::post('/edit','ObjsController@edit')->name('objs.edit');
       Route::get('/addForm','ObjsController@addForm')->name('objs.addForm');
        Route::get('/destroy/{id}','ObjsController@destroy')->name('objs.destroy');
        Route::get('/index','ObjsController@index')->name('objs.index');
        Route::get('/show/{id}','ObjsController@show')->name('objs.show');
        Route::post('/search','ObjsController@search')->name('objs.search');
        Route::get('/searchAddress/{address}','ObjsController@searchAdd');
    });


    Route::get('/admin', function () {
    return view('users.index');
    });
    Route::group(['prefix' => 'leeds'], function () {
        Route::get('/new','LeedsController@show')->name('leeds.show');
    });
    Route::group(['prefix' => 'applications'], function () {
        Route::get('/index','ApplicationsController@index')->name('applications.index');
        Route::get('/addFormWithClient/{id}','ApplicationsController@addFormWithClient')->name('applications.addFormWithClient');
        Route::post('/create','ApplicationsController@create')->name('applications.create');
        Route::get('/show/{id}','ApplicationsController@show')->name('applications.show');
        Route::get('/destroy/{id}','ApplicationsController@destroy')->name('applications.destroy');
        Route::post('/edit','ApplicationsController@edit')->name('applications.edit');
    });
    Route::group(['prefix' => 'files'], function () {
        Route::get('/getAppFile/{Fileid}{AppID}','FilesController@getAppFile')->name('files.getAppFile');
        Route::get('/deleteAppFile/{Fileid}{AppID}','FilesController@deleteAppFile')->name('files.deleteAppFile');

    });
    Route::group(['prefix' => 'deals'], function () {
        Route::get('/addForm/{id}','DealsController@getAppFile')->name('deals.addform');
        Route::get('/deleteAppFile/{Fileid}{AppID}','FilesController@deleteAppFile')->name('files.deleteAppFile');

    });
    Route::get('/home', 'HomeController@index')->name('home');

});


