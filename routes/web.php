<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get("/",[HomepageController::class,'index',]);

Route::view("/about","about");

Route::get('/contact',[ContactController::class,'index']);

Route::get("/shop",[ShopController::class,'getAllProducts']);

Route::post("/send-contact",[ContactController::class,'sendContact']);

Route::middleware(['auth',\App\Http\Middleware\AdminCheckMiddleware::class])->prefix('admin')->group(function(){

    Route::view('/add-product', 'add-product');


    Route::post("/save-product",[ProductController::class,'saveProduct'])
        ->name("save-product");



    Route::get("/all-products",[ProductController::class,"index"]);



    Route::get("/delete-product/{product}",[ProductController::class,"delete"])
        ->name("delete-product");


    Route::get('/all-contacts',[ContactController::class,'getAllContacts']);


    Route::get("/delete-contact/{contact}",[ContactController::class,"delete"])
        ->name("delete-contact");


    Route::get('/edit-product/{product}', [ProductController::class, 'edit'])
        ->name('edit-product');


    Route::post('/update-product/{product}', [ProductController::class, 'update'])
        ->name('update-product');


    Route::get("/edit-contact/{contact}", [ContactController::class, 'edit'])
        ->name('edit-contact');


    Route::post("/update-contact/{contact}", [ContactController::class, 'update'])
        ->name('update-contact');
});




require __DIR__.'/auth.php';
