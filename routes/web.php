<?php
Route::get('/', 'BlogController@index');
Route::resource('blog', 'BlogController');
