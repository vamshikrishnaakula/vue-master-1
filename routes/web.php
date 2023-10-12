<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\demoController;
use App\Http\Controllers\DemoRecordController;

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

Route::get('/items', 'App\Http\Controllers\demoController@index');
Route::post('/items', 'App\Http\Controllers\demoController@store');
Route::post('/items/ajax', 'App\Http\Controllers\demoController@storeAjax');
//ajax
Route::get('/ajax-example', 'App\Http\Controllers\demoController@ajax_index');
Route::post('/ajax-example', 'App\Http\Controllers\demoController@storeAjax');
//file-upload
Route::get('/upload', 'App\Http\Controllers\DemoRecordController@uploadForm');
Route::post('/upload', 'App\Http\Controllers\DemoRecordController@uploadFile');

Route::get('/records', 'DemoRecordController@showRecords');

//dial
Route::get('/dial','App\Http\Controllers\demoController@dial');
Route::post('/makecal22', 'App\Http\Controllers\demoController@makeCall');
