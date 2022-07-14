<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'App\Http\Controllers\HomepageController@index')->name('hompage');

Route::get('/blog/alam', 'App\Http\Controllers\BlogController@alam')->name('blog.alam');
Route::get('/blog/kuliner', 'App\Http\Controllers\BlogController@kuliner')->name('blog.kuliner');
Route::get('/blog/hotel', 'App\Http\Controllers\BlogController@hotel')->name('blog.hotel');
Route::get('/blog/hiburan', 'App\Http\Controllers\BlogController@hiburan')->name('blog.hiburan');

// Route::get('/blog/tambah', 'App\Http\Controllers\BlogController@create')->name('blog.create');
// Route::get('/blog/edit/{id}', 'App\Http\Controllers\BlogController@edit')->name('blog.edit');
Route::post('/blog/tambah', 'App\Http\Controllers\BlogController@store')->name('blog.store');
Route::put('/blog/edit/{id}', 'App\Http\Controllers\BlogController@update')->name('blog.update');
Route::delete('/blog/hapus/{id}', 'App\Http\Controllers\BlogController@destroy')->name('blog.destroy');

Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
Route::get('/profile/edit', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
Route::put('/profile', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
Route::delete('/profile', 'App\Http\Controllers\ProfileController@destroy')->name('profile.destroy');

Route::get('/paket', 'App\Http\Controllers\BookingController@index')->name('booking.index');
Route::post('/paket', 'App\Http\Controllers\BookingController@payment')->name('booking.payment');
Route::get('/paket/bayar', 'App\Http\Controllers\BookingController@create')->name('booking.create');
Route::post('/paket/bayar', 'App\Http\Controllers\BookingController@store')->name('booking.store');

Route::get('/paket/edit/{id}', 'App\Http\Controllers\BookingController@edit')->name('booking.edit');
Route::put('/paket/edit/{id}', 'App\Http\Controllers\BookingController@update')->name('booking.update');
Route::delete('/paket/hapus/{id}', 'App\Http\Controllers\BookingController@destroy')->name('booking.destroy');

Route::get('/kontak', function () {
    return view('layouts.kontak.index');
})->name('kontak.index');