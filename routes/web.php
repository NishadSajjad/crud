<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\YoutubeController;
use App\Models\youtube;
use Illuminate\Support\Facades\Route;


Route::get('/',[YoutubeController::class,'index'])->name('all.product');
Route::get('/add-new-product',[YoutubeController::class,'create'])->name('add.product');
Route::post('/store-product',[YoutubeController::class,'store'])->name('store.product');
Route::get('/edit-product/{id}',[YoutubeController::class,'edit'])->name('edit.product');
Route::post('/update-product/{id}',[YoutubeController::class,'update'])->name('update.product');
Route::get('/delete-product/{product}',[YoutubeController::class,'delete'])->name('delete.product');
// Route::resource('/youtubes',YoutubeController::class);

Route::resource("/products", ProductController::class);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
