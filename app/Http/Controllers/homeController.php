<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\wishlist;
use App\Models\cart;

class homeController extends Controller
{
    public function index()
    {   
        $user_id = session()->get('id');
        $count = wishlist::where('user_id',$user_id)->count();
        $wish = wishlist::where('user_id',$user_id)->get();
        $mobile = product::where('category','Mobile')->limit(3)->get();
        $tv = product::where('category','Television & Audio')->limit(3)->get();
        $laptop = product::where('category','Laptop')->limit(3)->get();
        $countCart = cart::where('user_id',$user_id)->get()->count();
        $countWish = wishlist::where('user_id',$user_id)->get()->count();
        
        return view('welcome',compact('mobile','tv','laptop','wish','count','countCart','countWish'));
    }
}
