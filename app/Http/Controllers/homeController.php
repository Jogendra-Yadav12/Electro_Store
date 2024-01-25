<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\wishlist;
use App\Models\cart;

class homeController extends Controller
{
    public function index()
    {   
        if(session()->get('type') !== "admin" ){
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
        return redirect()->back()->with('warning','unautherized User!!');
    }
    
    public function generateCertificate()
    {
        $fontPath = public_path('fonts/BRUSHSCI.TTF');
        $image = Image::make(public_path('certificate.jpg'));
        $color = Image::canvas(1, 1, "#FF0000")->pickColor(0, 0, 'array');
       
        $name = "Vishal Gupta";
        $image->text($name, 365, 420, function ($font) use ($fontPath, $color) {
            $font->file($fontPath);
            $font->size(50);
            $font->color($color);
            $font->align('left');
            $font->valign('top');
        });

        $datePath = public_path('fonts/AGENCYR.TTF');
        $date = "6th May 2020";
        $image->text($date, 450, 595, function ($font) use ($datePath, $color) {
            $font->file($datePath);
            $font->size(20);
            $font->color($color);
            $font->align('left');
            $font->valign('top');
        });

        $folderPath = public_path('images');

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $filename = 'certificate_' . time() . '.jpg';
        $imagePath = $folderPath . '/' . $filename;
        $image->save($imagePath);
        
        return $image->response('jpg');
    }
}
