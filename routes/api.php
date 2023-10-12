<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\demoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//
Route::get('/dial', 'App\Http\Controllers\demoController@dial');
// Route::post('make-call', 'App\Http\Controllers\demoController@makeCall');
Route::post('/submit-phone-number', 'App\Http\Controllers\demoController@makeCall');
