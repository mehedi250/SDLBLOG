<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers'], function(){
    Route::get('dashboard', 'HomeController@dashboard')->name('admin.dashboard');
   

});
