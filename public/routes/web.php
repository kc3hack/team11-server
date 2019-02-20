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

use App\Models\Score;
use App\Http\Resources\ScoreResource;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/scores', 'ScoresController@get');
Route::post('/scores', 'ScoresController@post');
