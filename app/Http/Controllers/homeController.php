<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\wishlist;

class homeController extends Controller
{
    public function index()
    {   
       return view('welcome');
    }

    public function mobile()
    {   
        try{
            $user_id = session()->get('id');
            $mobile = product::where('category','Mobile')->limit(3)->get();
            $tv = product::where('category','Television & Audio')->limit(3)->get();
            $laptop = product::where('category','Laptop')->limit(3)->get();
            $wish = wishlist::where('user_id',$user_id)->get();
            $count = wishlist::where('user_id',$user_id)->count();
            return view('welcome',compact('mobile','tv','laptop','wish','count'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }
}
