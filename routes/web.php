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

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'agent'],function(){
    Route::get('/', 'AgentController@index');
    Route::get('/create', 'AgentController@create');
    Route::post('/store', 'AgentController@store');
    Route::get('/delete/{id}', 'AgentController@destroy');
});

Route::group(['prefix' => 'lead'],function(){
    Route::get('/', 'LeadController@index');
    Route::get('/create', 'LeadController@create');
    Route::post('/store', 'LeadController@store');
    Route::get('/delete/{id}', 'LeadController@destroy');
    Route::post('/assign', 'LeadController@AssignLead');
});
