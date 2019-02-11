<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Auth::routes();
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/ajax/country', 'ProjectController@getCountry')->name('ajax.country');
Route::get('/project/add-project', 'ProjectController@index')->name('project.add-project');
Route::post('/project/save', 'ProjectController@store')->name('project.save');
Route::post('/project/update/{id}', 'ProjectController@update')->name('project.update');
Route::get('/project/edit/{id}', 'ProjectController@edit')->name('project.edit');
Route::get('/project/view/{id}', 'ProjectController@show')->name('project.view');
Route::get('/project/pdf/{id}', 'ProjectController@generatePdf')->name('project.pdf');
Route::get('/project/delete/{id}', 'ProjectController@destroy')->name('project.delete');
Route::get('/project/ajax/{tool_id}', 'HomeController@filteredProject')->name('project.ajax');
Route::get('/project/download/{id}', 'ProjectController@download')->name('project.download');

Route::get('/project-type/{id}', 'RapidController@projectType')->name('rapid.projectType');
Route::get('/decision-tree/{id}', 'RapidController@index')->name('rapid.dashboard');

Route::group(['middleware' => 'sessionAuth'], function()
{
   
    Route::post('/project-type/save', 'RapidController@projectTypeStore')->name('rapid.projectType.save');
    Route::post('/project-type/update/{id}', 'RapidController@projectTypeUpdate')->name('rapid.projectType.update');
    Route::post('/decision-tree/update/{id}', 'RapidController@update')->name('rapid.update');
    //For all steps
    Route::get('/decision-tree/{id}/{stepname}', 'RapidController@decisionTreeSteps')->name('rapid.steps');
});
