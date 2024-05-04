<?php

use Illuminate\Support\Facades\Route;

// frontend
Route::name('frontend.')->group(function(){
    require __DIR__.'/frontend.php';
});

// admin
Route::prefix('admin')->group(function(){
    require __DIR__.'/admin.php';
});