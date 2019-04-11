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

// Route::get('/studentlist', ['uses' => 'StudentController@index', 'as' => 'view-studenlist']);

Route::group(['prefix' => 'student', 'middleware' => 'checkrole' ], function(){
    Route::get('/studentlist', 'StudentController@index')->name('view-studentlist');

    //ImportExport
    Route::get('/export', 'StudentController@export')->name('export');
    Route::post('/import', 'StudentController@import')->name('import');
   
});

//view composer 
View::composer(['*'], function($view){
    
    $user = Auth::user();
    $view->with('user',$user);     //passes user information to every view page if 'user' is rendered.

});
