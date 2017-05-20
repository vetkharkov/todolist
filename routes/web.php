<?php
Auth::routes();

Route::get('/', [
        'uses' => 'TasksController@index',
        'as' => 'home'
]);

Route::get('/task','TasksController@add');
Route::post('/task','TasksController@create');

Route::get('/task/{task}','TasksController@edit');
Route::post('/task/{task}','TasksController@update');

Route::get('/archive','ArchiveController@index');
Route::post('/archive','ArchiveController@day');
