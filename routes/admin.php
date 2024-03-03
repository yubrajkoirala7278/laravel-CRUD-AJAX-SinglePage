<?php

// use App\Http\Controllers\Admin\BlogController;

use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;


Route::get('/blogs',[BlogController::class,'home'])->name('blog');
Route::post('/blogs/store', [BlogController::class, 'store'])->name('blog.store');
Route::put('/blogs/update', [BlogController::class, 'update'])->name('blog.update');
Route::get('/blogs/index', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/{slug}', [BlogController::class, 'view'])->name('blog.view');
Route::get('/blogs/{slug}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::delete('/blogs/destroy/{slug}', [BlogController::class, 'destroy'])->name('blog.destroy');