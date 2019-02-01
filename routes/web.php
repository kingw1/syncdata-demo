<?php
Route::get('/', 'BlogController@index');
Route::resource('blog', 'BlogController');
Route::get('/data/push', 'BlogController@pushData');
Route::post('/data/sync', 'BlogController@syncData');
