<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

/////home

 Route::get('/h',[HomeController::class,'index'])->name('home.index');


// adminpanel//
Route::get('/a',[AdminController::class,'index'])->name('admin.index');

//slidergroup//
Route::group(['prefix'=>'slider'],function(){
Route::get('/',[SliderController::class,'index'])->name('slider.index');
Route::get('/create',[SliderController::class,'create'])->name('slider.create');
Route::post('/',[SliderController::class,'store'])->name('slider.store');
Route::get('/{id}/edit',[SliderController::class,'edit'])->name('slider.edit');
Route::put('/{id}/update',[SliderController::class,'update'])->name('slider.update');
Route::get('/{id}/delete',[SliderController::class,'delete'])->name('slider.delete');
});

/////////////feature//////
Route::group(['prefix'=>'feature'],function(){
    Route::get('/',[FeatureController::class,'index'])->name('feature.index');
    Route::get('/create',[FeatureController::class,'create'])->name('feature.create');
    Route::post('/',[FeatureController::class,'store'])->name('feature.store');
    Route::get('/{id}/edit',[FeatureController::class,'edit'])->name('feature.edit');
    Route::put('/{id}/update',[FeatureController::class,'update'])->name('feature.update');
    Route::get('/{id}/delete',[FeatureController::class,'delete'])->name('feature.delete');
    });
/////////////produt//////
Route::group(['prefix'=>'product'],function(){

    Route::get('/',[ProductController::class,'index'])->name('product.index');
    Route::get('/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/',[ProductController::class,'store'])->name('product.store');
    Route::get('/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/{id}/update',[ProductController::class,'update'])->name('product.update');
    Route::get('/{id}/delete',[ProductController::class,'delete'])->name('product.delete');
    });

    /////////////category//////
Route::group(['prefix'=>'category'],function(){
    Route::get('/',[CategoryController::class,'index'])->name('category.index');
    Route::get('/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/',[CategoryController::class,'store'])->name('category.store');
    Route::get('/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/{id}/update',[CategoryController::class,'update'])->name('category.update');
    Route::get('/{id}/delete',[CategoryController::class,'delete'])->name('category.delete');
    });
