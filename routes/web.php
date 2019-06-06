<?php

Route::get('/', 'PostsController@index');
Route::get('post/create', 'PostsController@createForm');
Route::get('post/{post}', 'PostsController@show');
Route::post('post', 'PostsController@store');
