<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('home');

Route::get("/categories/{category}", [App\Http\Controllers\CategoryController::class, 'show'])->name("category.show");
Route::get("/news/{news}", [App\Http\Controllers\NewsController::class, 'show'])->name("news.show");

Route::group(['prefix' => 'admin', 'as' => "admin.", "middleware" => ["auth", "can:is_admin"]], function () {
  Route::get("/", [App\Http\Controllers\Admin\AdminController::class, 'index'])->name("dashboard");
  Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
  Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
});

