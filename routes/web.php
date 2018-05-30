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
Route::post('/register', [ 
    'uses' => 'Auth\RegisterController@register',
    'as' => 'register'
]);
Auth::routes();

Route::get('/welcome', function () {
    return view('welcome')->with('welcome', '1');
})->name('welcome');

Route::get('/login', function () {
    return redirect()->to('/welcome');
})->name('login');



Route::post('/like', [ 
    'uses' => 'PostController@postLikePost',
    'as' => 'like'
]);

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('/dashboard', [
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard'
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);


Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account'
]);

Route::post('/updateaccount', [
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save'
]);

Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image'
]);

Route::post('/createpost', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create'
]);

Route::get('/delete-post/{post_id}', [
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete'
]);

Route::post('/edit', [ 
    'uses' => 'PostController@postEditPost',
    'as' => 'edit'
]);

Route::post('/like', [ 
    'uses' => 'PostController@postLikePost',
    'as' => 'like'
]);

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');