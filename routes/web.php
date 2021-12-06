<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers'], function(){
    Route::get('dashboard', 'HomeController@dashboard')->name('admin.dashboard');
    Route::resource('languages', 'SdlblogLanguageController');
    Route::resource('catagories', 'SdlblogCatagoryController');
    Route::resource('comments', 'SdlblogCommentController');
    Route::resource('reply-comments', 'SdlblogReplyCommentController');
    Route::resource('blog-configarations', 'SdlblogLanguageController');
    Route::resource('posts', 'SdlblogPostController');
    Route::resource('tags', 'SdlblogTagController');
    Route::resource('post-tags', 'SdlblogPostTagController');
   

});
