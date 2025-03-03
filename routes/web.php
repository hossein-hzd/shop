<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CopunController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WishController;
use App\Models\Contact;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Logger\ConsoleLogger;

//////login
Route::get('/login',[AuthController::class,'login'])->name('login.index');
Route::post('/login',[AuthController::class,'loginform'])->name('loginform');
Route::post('/cofigure',[AuthController::class,'cofigure'])->name('cofigure');

/////logout/////
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

///////cart
Route::post('cart/{id}/increment', [CartController::class, 'increment'])->name('cart.increment');
Route::get('{id}/cart', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/{id}/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::get('cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('index/carti', [CartController::class, 'index'])->name('cart.index');


/////home

 Route::get('/h',[HomeController::class,'index'])->name('home.index')->middleware('auth');
//  Route::get('/home/contact',[HomeController::class,'contact'])->name('home.contact');


// adminpanel//
Route::get('/a',[AdminController::class,'index'])->name('admin.index');


//////profile
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/editepro', [ProfileController::class, 'editepro'])->name('profile.editepro');
    Route::put('/', [ProfileController::class, 'editeprof'])->name('profile.editeprof');
    Route::get('/address', [ProfileController::class, 'address'])->name('profile.address');
    Route::get('/address/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/{id}/edite', [ProfileController::class, 'edite'])->name('profile.edite');
    Route::put('/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
    // Route::get('/{id}/delete', [ProfileController::class, 'delete'])->name('profile.delete');
});
Route::post('/pr', [ProfileController::class, 'getcity']);

/////////////wishes
Route::get('/{id}/wish', [WishController::class, 'store'])->name('wish.store');
Route::get('/wishes', [WishController::class, 'index'])->name('wish.index');
Route::get('/{id}/delete', [WishController::class, 'delete'])->name('wish.delete');




/////about///
Route::get('/aboutpage',function() {
    return view('home.about');
 })->name('about.page')->middleware('auth');
Route::get('/singlepage/{id}',function($id) {
    $product=product::all()->find($id);
    return view('home.singlepage',compact('product'));
 })->name('single.page');
Route::get('/about',[AboutController::class,'index'])->name('about.index');
Route::get('/about/create',[AboutController::class,'create'])->name('about.create');
Route::post('/about/store',[AboutController::class,'store'])->name('about.store');
Route::put('/{id}/update',[AboutController::class,'update'])->name('about.update');
Route::get('/{about}/edite',[AboutController::class,'edite'])->name('about.edite');

////////////
/////contact///

Route::get('/contactpage',function() {
   return view('home.contact');
})->name('contact.page')->middleware('auth');

Route::post('/contact',function(Request $request) {
//     $request->validate([
//         'name'=>'required',
//         'email'=>'required',
//         'object'=>'required',
//         'body'=>'required',

//    ]);
Contact::create([
'name'=>$request->name,
'email'=>$request->email,
'object'=>$request->object,
'body'=>$request->body,
]);
return redirect()->route('contact.page');
})->name('contact.store');


////////////
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
    Route::get('/menu',[ProductController::class,'menu'])->name('product.menu')->middleware('auth');
    Route::get('/{show}',[ProductController::class,'show'])->name('product.show');
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
/////////////copun//////
Route::group(['prefix' => 'copun'], function () {
    Route::get('/', [CopunController::class, 'index'])->name('copun.index');
    Route::get('/create', [CopunController::class, 'create'])->name('copun.create');
    Route::post('/', [CopunController::class, 'store'])->name('copun.store');
    Route::get('/{id}/edit', [CopunController::class, 'edit'])->name('copun.edit');
    Route::put('/{id}/update', [CopunController::class, 'update'])->name('copun.update');
    Route::get('/{id}/delete', [CopunController::class, 'delete'])->name('copun.delete');
    Route::post('/check', [CopunController::class, 'check'])->name('copun.check');

});
//////javascript//////

Route::post('/kr',[ProductController::class,'jav']);
Route::post('/se',[ProductController::class,'sef']);
////////////


