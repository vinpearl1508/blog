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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostController@index');
Route::get('/singlePost/{id}', 'PostController@show')->name('singlePost');
Route::group(['prefix' => 'posts'], function () {
    Route::get('/drafts', 'HomeController@drafts')
        ->name('list_drafts')
        ->middleware('auth');
    Route::get('/show/{id}', 'HomeController@show')
        ->name('show_post');
    Route::get('/create', 'HomeController@create')
        ->name('create_post')
        ->middleware('can:post.create');
    Route::post('/create', 'HomeController@store')
        ->name('store_post')
        ->middleware('can:post.create');
    Route::get('/edit/{post}', 'HomeController@edit')
        ->name('edit_post')
        ->middleware('can:post.update,post');
    Route::post('/edit/{post}', 'HomeController@update')
        ->name('update_post')
        ->middleware('can:post.update,post');
    Route::get('/publish/{post}', 'HomeController@publish')
        ->name('publish_post')
        ->middleware('can:post.publish');
});

Route::prefix('api')->group(function () {
    Route::apiResources([
        'categories' => 'Api\CategoryController',
        'posts' => 'Api\PostController',
        'users' => 'Api\UserController',
    ]);
});

