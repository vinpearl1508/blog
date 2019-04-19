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
    // Route::get('/posts', 'Api\PostController@index');
    // Route::get('/posts/show/{id}', 'PostController@show');
    // Route::post('/posts', 'Api\PostController@store')->middleware('can:post.create');
    // Route::put('/posts/{id}', 'Api\PostController@update')->middleware('can:post.update,post');
    // Route::delete('/posts/{id}', 'Api\PostController@destroy')->middleware('can:post.update,post');
    Route::get('/publish/{id}', 'Api\PostController@publish')->middleware('can:post.publish');
});
Route::get('/admin/{vue?}', function () {
    return view('dashboard');
})->where('vue', '[\/\w\.-]*')->middleware('auth');

// Route::get('/send', 'SendMessageController@index')->name('send');
Route::post('/postMessage', 'SendMessageController@sendMessage')->name('postMessage');
Route::post('/postComment', 'CommentController@store')->name('postComment');