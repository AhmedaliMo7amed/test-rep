<?php

Route::get('/', 'PagesController@home')->name('home');
Route::get('/rest', 'PagesController@rest')->name('rest');
Route::get('/rest/{sub_category}', 'PagesController@restDetails')->name('restDetails');
Route::get('/restore', 'PagesController@restore')->name('restore');
Route::get('/play', 'PagesController@play')->name('play');
Route::get('/inspire', 'PagesController@inspire')->name('inspire');
Route::get('/connect', 'PagesController@connect')->name('connect');

?>