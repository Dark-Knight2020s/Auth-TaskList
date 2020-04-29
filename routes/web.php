<?php

use App\Task;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('tasks','TaskController@index');
Route::get('edit/{task_edit}','Taskcontroller@ShowEditTask');
Route::get('ShowDetailsTask/{task_show}','TaskController@show')->name('task');
Route::post('StoreToTaskController','TaskController@store')->name('store');
Route::delete('delete/{task_delete}','Taskcontroller@destroy');
Route::patch('update/{task_update}','TaskController@Update');



//*Route middleware can be used to only allow authenticated users to access a given route.Laravel ships with an auth middleware
// Route::get('tasks','TaskController@index')->middleware('auth');

// we can use it to protect from unautherised to a group of routes By user type (auther ,admin ) or auth
// Route::group(['middleware' => 'auth'], function () { ***** });