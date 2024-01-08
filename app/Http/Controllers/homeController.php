<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class homeController extends Controller
{
    public function index()
    {   
       return view('welcome');
    }

    public function mobile()
    {   
        $mobile = product::where('category','Mobile')->limit(3)->get();
        $tv = product::where('category','Television & Audio')->limit(3)->get();
        $laptop = product::where('category','Laptop')->limit(3)->get();
        return view('welcome',compact('mobile','tv','laptop'));
    }
}
