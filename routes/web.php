<?php

use Illuminate\Support\Facades\Route;
use App\Models\cart;
use App\Models\wishlist;

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

// Admin
Route::get('/home',[App\Http\Controllers\adminController::class,'index']);
Route::get('/active/{id}',[App\Http\Controllers\adminController::class,'active']);
Route::get('/user',[App\Http\Controllers\adminController::class,'user']);
Route::get('/customer',[App\Http\Controllers\adminController::class,'customer']);
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
Route::post('/status/{id}',[App\Http\Controllers\adminController::class,'updateStatus']);


// Contact Page
Route::get('/contact',function(){
    if(!session()->get('id')){
        $user_id = 0;
    $countCart = cart::where('user_id',$user_id)->get()->count();
    $countWish = wishlist::where('user_id',$user_id)->get()->count();

    return view('contact',compact('countCart','countWish'));
    }
    $user_id = session()->get('id');
    $countCart = cart::where('user_id',$user_id)->get()->count();
    $countWish = wishlist::where('user_id',$user_id)->get()->count();

    return view('contact',compact('countCart','countWish'));
});

Route::post('/mail', [App\Http\Controllers\contactController::class,'sendEmail']);


// Customer Home Page
Route::get('/certificate', [App\Http\Controllers\homeController::class, 'generateCertificate']);
Route::get('/', [App\Http\Controllers\homeController::class,'index']);


// Registration 
Route::post('/customer',[App\Http\Controllers\customerController::class,'store']);
Route::post('/login',[App\Http\Controllers\customerController::class,'login']);
Route::get('/profile',[App\Http\Controllers\customerController::class,'profile']);
Route::post('/user-detail',[App\Http\Controllers\customerController::class,'address']);
Route::get('/user-address',[App\Http\Controllers\customerController::class,'useraddress']); //addAddress
Route::post('/user-address',[App\Http\Controllers\customerController::class,'addAddress']);
Route::get('/order',[App\Http\Controllers\customerController::class,'order']);
Route::get('/updpass',[App\Http\Controllers\customerController::class,'updpass']);
Route::post('/updatepass',[App\Http\Controllers\customerController::class,'updatepass']);
Route::get('/forget',[App\Http\Controllers\customerController::class,'forgetpass']);
Route::post('/otp', [App\Http\Controllers\contactController::class,'sendOtp']);
Route::get('/verifyotp', [App\Http\Controllers\customerController::class,'verifyotp']);
Route::get('/otp',[App\Http\Controllers\customerController::class,'otp']);
Route::get('/reset',[App\Http\Controllers\customerController::class,'resetpass']);
Route::post('/reset',[App\Http\Controllers\customerController::class,'updatepassword']);
Route::post('/rotp', [App\Http\Controllers\contactController::class,'rotp']);


// Search route
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
Route::get('/wishremove/{id}',[App\Http\Controllers\checkoutController::class,'wishremove']);
Route::get('/checkout',[App\Http\Controllers\checkoutController::class,'index']);
Route::get('/checkout/{id}',[App\Http\Controllers\checkoutController::class,'show']);
Route::post('/checkout/{id}',[App\Http\Controllers\checkoutController::class,'show']);
Route::get('/remove/{id}',[App\Http\Controllers\checkoutController::class,'remove']);


// Payment Route
Route::get('/payment/{id}',[App\Http\Controllers\paymentController::class,'index']);
Route::get('/thanku',[App\Http\Controllers\paymentController::class,'thanku']);
Route::get('/address',[App\Http\Controllers\paymentController::class,'address']);
Route::post('/addAddress',[App\Http\Controllers\paymentController::class,'addAddress']);
Route::get('/paysuccess', [App\Http\Controllers\paymentController::class, 'razorPaySuccess']);


// Product Details page
Route::get('/singlepage/{id}',[App\Http\Controllers\productController::class,'create']);


// Order controllers
Route::get('/adminOrder',[App\Http\Controllers\orderController::class, 'index']);
Route::get('/customerOrder',[App\Http\Controllers\orderController::class, 'customerOrder']);
Route::get('/orderview/{id}',[App\Http\Controllers\orderController::class, 'invoice']);
Route::get('/adminorderview/{id}',[App\Http\Controllers\orderController::class, 'Admininvoice']);
Route::get('/pdf/{id}',[App\Http\Controllers\orderController::class, 'pdf']);


// About Page
Route::get('/about',function(){
    if(!session()->get('id')){
        $user_id = 0;
    $countCart = cart::where('user_id',$user_id)->get()->count();
    $countWish = wishlist::where('user_id',$user_id)->get()->count();

    return view('aboutus',compact('countCart','countWish'));
    }
    $user_id = session()->get('id');
    $countCart = cart::where('user_id',$user_id)->get()->count();
    $countWish = wishlist::where('user_id',$user_id)->get()->count();

    return view('aboutus',compact('countCart','countWish'));
});


// Faqs Page
Route::get('/faqs',function(){
    $user_id = session()->get('id');
    $countCart = cart::where('user_id',$user_id)->get()->count();
    $countWish = wishlist::where('user_id',$user_id)->get()->count();

    return view('faqs',compact('countCart','countWish'));
});


// Help
Route::get('/help',function(){
    $user_id = session()->get('id');
    $countCart = cart::where('user_id',$user_id)->get()->count();
    $countWish = wishlist::where('user_id',$user_id)->get()->count();

    return view('help',compact('countCart','countWish'));
});


// Privacy Page
Route::get('/privacy',function(){
    $user_id = session()->get('id');
    $countCart = cart::where('user_id',$user_id)->get()->count();
    $countWish = wishlist::where('user_id',$user_id)->get()->count();
    return view('privacy',compact('countCart','countWish'));
});


// Terms & Condition
Route::get('/terms',function(){
    $user_id = session()->get('id');
    $countCart = cart::where('user_id',$user_id)->get()->count();
    $countWish = wishlist::where('user_id',$user_id)->get()->count();

    return view('terms',compact('countCart','countWish'));
});


// Logout
Route::get('/logout',function(){
    Session::flush();
    return redirect('/')->with('status','Logout successfully !!');
});

Route::get('/back',function(){
    return redirect()->back();
})->name('back');