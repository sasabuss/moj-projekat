<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get("/",[\App\Http\Controllers\HomepageController::class,'index',]);

Route::view("/about","about");

Route::get('/contact',[ContactController::class,'index']);

Route::get("/shop",[ShopController::class,'getAllProducts']);

Route::post("/send-contact",[ContactController::class,'sendContact']);

Route::view('/admin/add-product', 'add-product');

Route::post("/admin/save-product",[ProductController::class,'saveProduct'])
    ->name("save-product");


Route::get("/admin/all-products",[\App\Http\Controllers\ProductController::class,"index"]);

Route::get("/admin/delete-product/{product}",[ProductController::class,"delete"])
    ->name("delete-product");

Route::get('/admin/all-contacts',[ContactController::class,'getAllContacts']);

Route::get("/admin/delete-contact/{contact}",[ContactController::class,"delete"])
    ->name("delete-contact");

Route::get('/admin/edit-product/{product}', [ProductController::class, 'edit'])->name('edit-product');

Route::post('/admin/update-product/{product}', [ProductController::class, 'update'])->name('update-product');

Route::get("/admin/edit-contact/{contact}", [ContactController::class, 'edit'])->name('edit-contact');

Route::post("/admin/update-contact/{contact}", [ContactController::class, 'update'])->name('update-contact');


require __DIR__.'/auth.php';
