<?php

Route::get('register', 'RegisterController@showForm');
Route::post('register', 'RegisterController@register');
Route::get('login', 'LoginController@showForm');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');

/**
 * Social login
 */
Route::get('redirect', 'SocialLoginController@redirectToProvider');
Route::get('auth/facebook/callback', 'SocialLoginController@handleProviderCallback');
//==========================================================


/**
 * Topics
 */
Route::get('/', 'TopicsController@index');
Route::get('topics/{topic}/show', 'TopicsController@show');
Route::get('topics/create', 'TopicsController@create');
Route::post('topics/create', 'TopicsController@store');


/**
 * Comments
 */
Route::post('comments/{topic}', 'CommentsController@store');


/**
 * Likes
 */
Route::post('liked/topics/{topic}', 'LikesController@likedTopic');
Route::post('liked/comments/{comment}', 'LikesController@likedComment');
