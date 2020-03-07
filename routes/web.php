<?php

Route::get('/', function(){
	return redirect('home');
});
Route::get('login', 'frontend\AuthController@getLoginForm');
Route::post('login', 'frontend\AuthController@login')->name('auth.login');
Route::get('logout', 'frontend\AuthController@logout')->name('auth.logout');
Route::get('registration', 'frontend\AuthController@getRegistrationForm');
Route::post('registration', 'frontend\AuthController@Registration')->name('auth.registration');
Route::resource('home', 'frontend\HomeController');
Route::group(['middleware' => ['check_aut',],], function () {
Route::POST('store', 'frontend\UserController@store'); 
Route::get('my-post/{id}', 'frontend\UserController@my_post');
Route::get('new-post', 'frontend\UserController@new_post');
Route::POST('Save_Create_Post', 'frontend\UserController@Save_Create_Post');
Route::get('my-profile', 'frontend\UserController@my_profile');
Route::get('Edit_Profile', 'frontend\UserController@Edit_Profile');
Route::POST('Save_Edit_Profile', 'frontend\UserController@Save_Edit_Profile');
});
Route::group(['middleware' => [
    'check_role_admin',
],
], function () {
Route::resource('admin','backend\UserController');//users
Route::resource('categories','backend\CategoryController');//categories
Route::resource('posts','backend\PostController');//posts
Route::resource('comments','backend\CommentController');//comments
});
