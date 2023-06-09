<?php

use App\Http\Controllers\Admin\CategoryNewsController as AdminCategoryNewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomePageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Welcome Page --routes
Route::get('/', [WelcomePageController::class, 'welcome']);

//News Categories --routes
Route::get('/categories', [CategoriesNewsController::class, 'list']);

//All News --routes
Route::get('/categories/all', [NewsController::class, 'index']);

//News by category --routes
Route::get('/categories/{category}', [NewsController::class, 'indexByCategory'])
  ->where('category', '\d+');

//News --routes
Route::get('/categories/{category}/{id}', [NewsController::class, 'show'])
  ->where('category', '\d+')
  ->where('id', '\d+');

//Admin --group routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function () {
  Route::get('/', AdminController::class)->name('index');
  Route::resource('categories', AdminCategoryNewsController::class);
  Route::resource('news', AdminNewsController::class);
});
