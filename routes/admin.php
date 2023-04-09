<?php

Route::get('/', 'DashboardController@index')->name('admin_dashboard');

Route::get('settings', 'SettingController@get')->name('admin_panel.settings');
Route::post('settings', 'SettingController@update')->name('admin_panel.update_settings');

Route::get('users', 'UserController@index')->name('admin_panel.users.index');

Route::get('reservations', 'OrderController@index')->name('admin_panel.reservations.index');
Route::get('reservations/{reservation_number}', 'OrderController@getOrderDetails')->name('admin_panel.get_order_details');

Route::resource('categories', 'CategoryController', ['names' => 'admin_panel.categories']);
Route::resource('sub_categories', 'SubCategoryController', ['names' => 'admin_panel.sub_categories']);
Route::get('sub_category/{id}/{slider_no}', 'SubCategoryController@remove_slider')->name('admin_panel.sub_category.remove_slider');


Route::resource('sliders', 'SliderController', ['names' => 'admin_panel.sliders']);
Route::resource('profiles', 'ProfileController', ['names' => 'admin_panel.profiles']);
Route::resource('activities', 'ActivityController', ['names' => 'admin_panel.activities']);
Route::resource('sub_activities', 'SubActivityController', ['names' => 'admin_panel.sub_activities']);
Route::resource('blogs', 'NewsController', ['names' => 'admin_panel.blogs']);

Route::get('banner', 'BannerController@get')->name('admin_panel.banner');
Route::post('banner', 'BannerController@update')->name('admin_panel.update_banner');

Route::get('details', 'AboutUsDetailsController@get')->name('admin_panel.details');
Route::post('details', 'AboutUsDetailsController@update')->name('admin_panel.update_details');

Route::resource('why_choose_us', 'WhyChooseUsController', ['names' => 'admin_panel.why_choose_us']);
Route::resource('what_we_offer', 'WhatWeOfferController', ['names' => 'admin_panel.what_we_offer']);
Route::resource('team', 'TeamController', ['names' => 'admin_panel.team']);
Route::resource('partners', 'PartnersController', ['names' => 'admin_panel.partners']);

Route::resource('contact_requests', 'ContactUsRequestsController', ['names' => 'admin_panel.contact_requests']);

Route::resource('feedbacks', 'FeedbackController', ['names' => 'admin_panel.feedbacks']);

?>