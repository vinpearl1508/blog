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

Route::get('/', 'IndexController@index');
Route::get('search',['as'=>'search', 'uses'=>'IndexController@search']);
Route::get('/postList/{id}', 'IndexController@posts')->name('postList');
Route::get('/singlePost/{id}', 'IndexController@show')->name('singlePost');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('api')->group(function () {
    Route::apiResources([
        'categories' => 'Api\CategoryController',
        'posts' => 'Api\PostController',
        'users' => 'Api\UserController',
        'tags'  => 'Api\TagController',
    ]);
    Route::get('/draft', 'Api\PostController@draft');
    Route::get('/publish/{id}', 'Api\PostController@publish');
});
Route::get('/admin/{vue?}', function () {
    return view('dashboard');
})->where('vue', '[\/\w\.-]*')->middleware('auth');

// Route::get('/posts', 'HomeController@index')->name('list_posts');
// Route::group(['prefix' => 'posts'], function () {
//     Route::get('/drafts', 'HomeController@drafts')
//         ->name('list_drafts')
//         ->middleware('auth');
//     Route::get('/show/{id}', 'HomeController@show')
//         ->name('show_post');
//     Route::get('/create', 'HomeController@create')
//         ->name('create_post')
//         ->middleware('can:post.create');
//     Route::post('/create', 'HomeController@store')
//         ->name('store_post')
//         ->middleware('can:post.create');
//     Route::get('/edit/{post}', 'HomeController@edit')
//         ->name('edit_post')
//         ->middleware('can:post.update,post');
//     Route::post('/edit/{post}', 'HomeController@update')
//         ->name('update_post')
//         ->middleware('can:post.update,post');
//     Route::get('/publish/{post}', 'HomeController@publish')
//         ->name('publish_post')
//         ->middleware('can:post.publish');
// });

