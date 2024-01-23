<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\product;
use App\Models\address;
use App\Models\image;
use App\Models\cart;
use App\Models\wishlist;

class adminController extends Controller
{
    public function addproduct()
    {
        try{
            if (session()->get('mail') && session()->get('mail') === 'fireboyaj12@gmail.com') {
                return view('Admin.addproduct');
            } elseif (session()->get('mail')) {
                return redirect('/')->with('warning', 'Unauthorized User !!');
            } else {
                return redirect('/')->with('warning', 'Please login !!');
            }
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }

    }

    public function adduser(){
        try{
            if(session()->get('mail') and session()->get('mail')=='fireboyaj12@gmail.com'){
                return view('Admin.adduser');
            }elseif(session()->get('mail')){
                return redirect('/')->with('warning','Unautherized User !!');
            }
            else{
                return redirect('/')->with('warning','Please login !!');
            }
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            if(session()->get('mail') && session()->get('mail') === 'fireboyaj12@gmail.com') {
                $cus = customer::where("email",$request->email)->exists();
            if($cus){
                return redirect()->back()->with('warning','Email is already eixsts!!');
            }
                $user = new Customer;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->type = $request->type;
                $user->status = 1;
                $user->save();
                return redirect('user')->with('status', 'User added successfully!!');
            } else {
                return redirect('/')->with('warning', 'Please login !!');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function user()
    {
        try {
            if (session()->get('mail') && session()->get('mail') === 'fireboyaj12@gmail.com') {
                $user = customer::paginate(8);
                static $x = 1;
                return view('Admin.user', compact('user', 'x'));
            }elseif(session()->get('mail')){
                return redirect('/')->with('warning','Unautherized User !!');
            } else {
                return redirect('/')->with('warning', 'Please login !!');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function product(){
        try{
            if(session()->get('mail') and session()->get('mail')=='fireboyaj12@gmail.com'){
                $product = product::paginate(6);
                return view('Admin.product',compact('product'));
            }
            else{
                return redirect('/')->with('warning','Please login !!');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    

    public function removeUser($id){
        try{
            $item = customer::where('id',$id)->delete();
            $address = address::where('user_id',$id)->delete();
            cart::where('user_id',$id)->delete();
            return redirect()->back()->with('status','Remove user successfully!!');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    
    public function removeProduct($id){
        try{
            $prod = product::find($id);
            $name = $prod->name;
            $img = image::where('name',$name)->delete();
            $product = product::where('id',$id)->delete();
            return redirect()->back()->with('status','Remove product successfully!!');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function upduser($id){
        try{
            $address = customer::where('id',$id)->get();
            return view('Admin.edituser',compact('address'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function updated(Request $request, $id){
        try{
            $address = customer::where('id',$id)->get();
            $address[0]['name'] = $request->name;
            $address[0]['email'] = $request->email;
            $address[0]['type'] = $request->type;
            $address[0]->save();
            return redirect('/user')->with('status','Data updated successfully');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function updproduct($id){
        try{
            $product = product::where('id',$id)->get();
            return view('Admin.editproduct',compact('product'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function updatedproduct(Request $request, $id){
        try{
            $product = product::where('id',$id)->get();
            $product[0]['name'] = $request->name;
            $product[0]['category'] = $request->category;
            $product[0]['brand'] = $request->brand;
            if(!empty($request->img)){
                $imageName = $request->img->getClientOriginalName();
                $product[0]['img'] = $request->img->move(('images'), $imageName);
            }
            $product[0]->save();
            return redirect('product')->with('status','Data updated successfully');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    
    public function details($id){
        try{
            $product = product::find($id);
            return view('Admin.product-details',compact('product'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function active($id){
        $user = customer::find($id);
       
        $user->status = $user->status === 1 ? 0 : 1;

        $user->save();
        return redirect()->back();
    }
}
