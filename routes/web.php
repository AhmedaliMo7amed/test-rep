<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin_panel/login', [AdminLoginController::class, 'login'])->name('view_admin_login');
Route::post('/admin_panel/login', [AdminLoginController::class, 'login_post'])->name('admin_login');
Route::get('/admin_panel/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');

Route::get('/', 'App\Http\Controllers\Website\PagesController@redirect');

Route::group(['middleware' => ['AuthAdmin:admin'], 'prefix' => 'admin_panel', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    require_once __DIR__ . '/admin.php';
});

Route::group(['middleware' => ['Localization:en'], 'prefix' => '/en', 'namespace' => 'App\Http\Controllers\Website'], function () {
    require_once __DIR__ . '/user_en.php';
});

Route::group(['middleware' => ['Localization:ar'], 'prefix' => '/ar', 'namespace' => 'App\Http\Controllers\Website'], function () {
    require_once __DIR__ . '/user_ar.php';
});

Route::group(['middleware' => ['Localization:de'], 'prefix' => '/de', 'namespace' => 'App\Http\Controllers\Website'], function () {
    require_once __DIR__ . '/user_de.php';
});

Route::group(['middleware' => ['Localization:ru'], 'prefix' => '/ru', 'namespace' => 'App\Http\Controllers\Website'], function () {
    require_once __DIR__ . '/user_ru.php';
});

Route::group(['middleware' => ['Localization:fr'], 'prefix' => '/fr', 'namespace' => 'App\Http\Controllers\Website'], function () {
    require_once __DIR__ . '/user_fr.php';
});