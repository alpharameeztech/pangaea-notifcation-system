<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('topic', 'App\Http\Controllers\TopicController@store')->name('topic.store');
Route::post('/subscribe/{topic}', 'App\Http\Controllers\TopicController@subscribe')->name('topic.susbcribe');
Route::post('/publish/{topic}', 'App\Http\Controllers\TopicController@publishMessage')->name('topic.publisj.message');
