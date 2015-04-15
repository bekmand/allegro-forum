<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Get Routes*/

Route::get('/', [
    'as' => 'home', 'uses' => 'ForumController@index'
]);
Route::get('forum/{post}/comments', [
    'as' => 'post_path', 'uses' => 'ForumController@post'
]);
Route::get('home', 'ForumController@index');

Route::get('user/{current_user}', ['middleware' => 'user',
    'as' => 'user_edit', 'uses' => 'UserController@index'
]);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('foo', ['middleware' => 'user', function()
{
    return 'this page may only be viewed by the correct user';
}]);


/*Post routes*/
Route::post('/', [
    'as' => 'create_post', 'uses' => 'ForumController@store'
]);

Route::post('forum/{id}/comments', [
    'as' => 'create_comment', 'uses' => 'ForumController@storeComment'
]);

Route::post('user/{id}', [
    'as' => 'user_update', 'uses' => 'UserController@userUpdate'
]);

