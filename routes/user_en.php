<?php

use App\Http\Controllers\Website\AuthController;

Route::get('/', 'PagesController@home')->name('home');
Route::get('/discover', 'PagesController@discover')->name('discover');
Route::get('/rest', 'PagesController@rest')->name('rest');
Route::get('/rest/{sub_category}', 'PagesController@restDetails')->name('restDetails');
Route::get('/restore', 'PagesController@restore')->name('restore');
Route::get('/play', 'PagesController@play')->name('play');
Route::get('/inspire', 'PagesController@inspire')->name('inspire');
Route::get('/connect', 'PagesController@connect')->name('connect');
Route::get('/sustainability', 'PagesController@sustainability')->name('sustainability');
Route::get('/cancellations', 'PagesController@cancellations')->name('cancellations');
Route::get('/contact-us', 'PagesController@contactUs')->name('contactUs');
Route::get('/coming-soon', 'PagesController@comingSoon')->name('comingSoon');
Route::post('/contact-us-request', 'PagesController@contactUsRequest')->name('contactUsRequest');







/********* Auth Routes **********/

Route::get('/login', [AuthController::class, 'view_login'])->name('view_login');

Route::post('/login', [AuthController::class, 'post_login'])->name('post_login');

Route::get('/register', [AuthController::class, 'view_register'])->name('view_register');

Route::post('/register', [AuthController::class, 'post_register'])->name('post_register');

Route::get('/reset-password', [AuthController::class, 'view_reset_password'])->name('view_reset_password');

Route::post('/reset-password', [AuthController::class, 'post_reset_password'])->name('post_reset_password');

Route::get('/change-password', [AuthController::class, 'view_change_password'])->name('view_change_password');

Route::post('/change-password', [AuthController::class, 'post_change_password'])->name('post_change_password');

?>
