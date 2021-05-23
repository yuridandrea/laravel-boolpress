<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/','HomeController@index')->name('guest-homepage');
route::get('/posts', 'PostController@index')->name('posts.index');
route::get('/posts/{slug}', 'PostController@show')->name('posts.show');

route::get('/categories', 'CategoryController@index')->name('category.index');
route::get('/categories/{slug}', 'CategoryController@show')->name('category.show');

Auth::routes();

Route::prefix('admin')
  ->namespace('Admin')
  ->middleware('auth')
  ->group(function () {
    Route::get('/', 'HomeController@index')
    ->name('admin-homepage');
    Route::resource('/posts', PostController::class)->names([
      'index' => 'admin.posts.index',
      'create' => 'admin.posts.create',
      'update' => 'admin.posts.update',
      'edit' => 'admin.posts.edit',
      'show' => 'admin.posts.show',
      'store' => 'admin.posts.store',
      'destroy' => 'admin.posts.destroy'
    ]);
  });

// Route::get('/admin', 'HomeController@index')->name('admin-homepage')->middleware('auth');
