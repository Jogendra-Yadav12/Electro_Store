<?php

use Illuminate\Support\Facades\Route;

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

//Admin
Route::get('/user',[App\Http\Controllers\adminController::class,'user']);
Route::get('/update/{id}',[App\Http\Controllers\adminController::class,'upduser']);
Route::post('/upduser/{id}',[App\Http\Controllers\adminController::class,'updated']);
Route::get('/product',[App\Http\Controllers\adminController::class,'product']);
Route::get('/pdetails/{id}',[App\Http\Controllers\adminController::class,'details']);
Route::get('/product/{id}',[App\Http\Controllers\adminController::class,'updproduct']);
Route::post('/updproduct/{id}',[App\Http\Controllers\adminController::class,'updatedproduct']);
Route::get('/removeproduct/{id}',[App\Http\Controllers\adminController::class,'removeProduct']);
Route::get('/removeuser/{id}',[App\Http\Controllers\adminController::class,'removeUser']);
Route::get('/add',[App\Http\Controllers\adminController::class,'addproduct']);
Route::get('/adduser',[App\Http\Controllers\adminController::class,'adduser']);
Route::post('/add_user',[App\Http\Controllers\adminController::class,'store']);
Route::post('/addproduct',[App\Http\Controllers\productController::class,'store']);
Route::post('/mail',[App\Http\Controllers\contactController::class,'store']);



// Customer Home Page
Route::get('/', [App\Http\Controllers\homeController::class,'index']);
Route::get('/',[App\Http\Controllers\homeController::class,'mobile']);



// registration 
Route::post('/customer',[App\Http\Controllers\customerController::class,'store']);
Route::post('/login',[App\Http\Controllers\customerController::class,'login']);
Route::get('/profile',[App\Http\Controllers\customerController::class,'profile']);
Route::post('/user-detail',[App\Http\Controllers\customerController::class,'address']);
Route::get('/user-address',[App\Http\Controllers\customerController::class,'useraddress']); //addAddress
Route::post('/user-address',[App\Http\Controllers\customerController::class,'addAddress']);


Route::get('/order',[App\Http\Controllers\customerController::class,'order']);


// search route
Route::get('/search',[App\Http\Controllers\customerController::class,'autocomplete']);
Route::get('/brand',[App\Http\Controllers\productController::class,'brand'])->name('filter_by_brand');


// Product Page
Route::get('/mobile',[App\Http\Controllers\productController::class,'Mobile']);
Route::get('/laptop',[App\Http\Controllers\productController::class,'laptop']);
Route::get('/tv',[App\Http\Controllers\productController::class,'tv']);
Route::get('/tablet',[App\Http\Controllers\productController::class,'tablet']);
Route::get('/computer',[App\Http\Controllers\productController::class,'computer']);
Route::get('/cc',[App\Http\Controllers\productController::class,'cc']);

// Checkout page
Route::get('/wishlist/{id}',[App\Http\Controllers\checkoutController::class,'wishlist']);
Route::get('/wishlist',[App\Http\Controllers\checkoutController::class,'wish']);
Route::get('/checkout',[App\Http\Controllers\checkoutController::class,'index']);
Route::get('/checkout/{id}',[App\Http\Controllers\checkoutController::class,'show']);
Route::post('/checkout/{id}',[App\Http\Controllers\checkoutController::class,'show']);
Route::get('/remove/{id}',[App\Http\Controllers\checkoutController::class,'remove']);

// payment Route
Route::get('/thanku',[App\Http\Controllers\paymentController::class,'thanku']);
Route::get('/address',[App\Http\Controllers\paymentController::class,'address']);
Route::post('/addAddress',[App\Http\Controllers\paymentController::class,'addAddress']);
Route::get('/paysuccess', [App\Http\Controllers\paymentController::class, 'razorPaySuccess']);

// Product Details page
Route::get('/singlepage/{id}',[App\Http\Controllers\productController::class,'create']);

// About Page
Route::get('/about',function(){
    return view('aboutus');
});

// Contact Page
Route::get('/contact',function(){
    return view('contact');
});

// Faqs Page
Route::get('/faqs',function(){
    return view('faqs');
});

// Help
Route::get('/help',function(){
    return view('help');
});

//Privacy Page
Route::get('/privacy',function(){
    return view('privacy');
});

// Terms & Condition
Route::get('/terms',function(){
    return view('terms');
});

Route::get('/logout',function(){
    Session::flush();
    return redirect('/')->with('status','Logout successfully !!');
});

Route::get('*',function(){
    return '404';
});

// order controllers
Route::get('/adminOrder',[App\Http\Controllers\orderController::class, 'index']);
Route::get('/customerOrder',[App\Http\Controllers\orderController::class, 'customerOrder']);

Route::get('/orderview/{id}',[App\Http\Controllers\orderController::class, 'invoice']);
Route::get('/adminorderview/{id}',[App\Http\Controllers\orderController::class, 'Admininvoice']);
