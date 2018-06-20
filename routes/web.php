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
    'as' => 'register',
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout',
]);

Route::get('/login', function () {
    return redirect()->to('/welcome');
})->name('login');

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    //only authorized users can access these routes
    Route::post('/like', [
        'uses' => 'PostController@postLikePost',
        'as' => 'like',
    ]);

    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'home',
    ]);

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home',
    ]);

    Route::get('/subir', [
        'uses' => 'PostController@getUpload',
        'as' => 'subir',
    ]);

    Route::get('/explora', [
        'uses' => 'ExploraController@getExplora',
        'as' => 'explora',
    ]);

    Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'account',
    ]);

    Route::get('/userimage/{filename}', [
        'uses' => 'UserController@getUserImage',
        'as' => 'account.image',
    ]);

    Route::post('/createpost', [
        'uses' => 'PostController@postCreatePost',
        'as' => 'post.create',
    ]);

    Route::get('/delete-post/{post_id}', [
        'uses' => 'PostController@getDeletePost',
        'as' => 'post.delete',
    ]);

    Route::post('/edit', [
        'uses' => 'PostController@postEditPost',
        'as' => 'edit',
    ]);

    Route::post('/like', [
        'uses' => 'PostController@postLikePost',
        'as' => 'like',
    ]);

    Route::post('/buscar', [
        'uses' => 'UserController@buscarUser',
        'as' => 'buscar',
    ]);

    Route::get('/perfil/{username}', [
        'uses' => 'ProfileController@show',
        'as' => 'perfil',
    ]);
    
    Route::post('perfil/follow', 'ProfileController@followUser')->name('user.follow');

    Route::post('perfil/unfollow', 'ProfileController@unFollowUser')->name('user.unfollow');

    Route::post('/account/username', [
        'uses' => 'UserController@changeUserName',
        'as' => 'account.changeUserName',
    ]);
    Route::post('/account/avatar', [
        'uses' => 'UserController@changeAvatar',
        'as' => 'account.changeAvatar',
    ]);
    Route::post('/account/biografia', [
        'uses' => 'UserController@postBiografia',
        'as' => 'account.biografia',
    ]);
    Route::get('/account/borrar', [
        'uses' => 'UserController@getBorrar',
        'as' => 'account.borrar',
    ]);
});

Route::group(['middleware' => ['guest']], function () {
    //only guests can access these routes
    Route::get('/welcome', function () {
        return view('welcome')->with('welcome', '1');
    })->name('welcome');
});
