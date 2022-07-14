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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', 'App\Http\Controllers\API\AuthController@logout');
    Route::post('/profile/update', 'App\Http\Controllers\API\AuthController@update');
});

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/booking/all', 'App\Http\Controllers\API\BookingController@all');
    Route::post('/booking/store','App\Http\Controllers\API\BookingController@store');
    Route::post('/booking/reschedule','App\Http\Controllers\API\BookingController@reschedule');
    Route::delete('/booking/delete','App\Http\Controllers\API\BookingController@destroy');
});

Route::post('/login', 'App\Http\Controllers\API\AuthController@login');
Route::post('/register', 'App\Http\Controllers\API\AuthController@register');

Route::get('/blog/alam', 'App\Http\Controllers\API\DestinationController@alam')->name('api.blog.alam');
Route::get('/blog/kuliner', 'App\Http\Controllers\API\DestinationController@kuliner')->name('api.blog.kuliner');
Route::get('/blog/hotel', 'App\Http\Controllers\API\DestinationController@hotel')->name('api.blog.hotel');
Route::get('/blog/hiburan', 'App\Http\Controllers\API\DestinationController@hiburan')->name('api.blog.hiburan');
Route::get('/blog/cari', 'App\Http\Controllers\API\DestinationController@cari')->name('api.blog.cari');