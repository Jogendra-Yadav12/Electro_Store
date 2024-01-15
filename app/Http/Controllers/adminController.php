<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\product;
use App\Models\address;

class adminController extends Controller
{
    public function addproduct()
    {
        try{
            if (session()->get('mail') && session()->get('mail') === 'fireboyaj12@gmail.com') {
                return view('Admin.addproduct');
            } elseif (session()->get('mail')) {
                return redirect('/')->with('status', 'Unauthorized User !!');
            } else {
                return redirect('/')->with('status', 'Please login !!');
            }
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }

    }

    public function adduser(){
        try{
            if(session()->get('mail') and session()->get('mail')=='fireboyaj12@gmail.com'){
                return view('Admin.adduser');
            }elseif(session()->get('mail')){
                return redirect('/')->with('status','Unautherized User !!');
            }
            else{
                return redirect('/')->with('status','Please login !!');
            }
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            if(session()->get('mail') && session()->get('mail') === 'fireboyaj12@gmail.com') {
                $user = new Customer;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->type = $request->type;
                $user->status = 1;
                $user->save();
                return redirect('user')->with('status', 'Product added successfully!!');
            } else {
                return redirect('/')->with('status', 'Please login !!');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function user()
    {
        try {
            if (session()->get('mail') && session()->get('mail') === 'fireboyaj12@gmail.com') {
                $user = customer::paginate(8);
                static $x = 1;
                return view('Admin.user', compact('user', 'x'));
            } else {
                return redirect('/')->with('status', 'Please login !!');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function product(){
        try{
            if(session()->get('mail') and session()->get('mail')=='fireboyaj12@gmail.com'){
                $product = product::paginate(6);
                return view('Admin.product',compact('product'));
            }
            else{
                return redirect('/')->with('status','Please login !!');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }
    

    public function removeUser($id){
        try{
            $item = customer::where('id',$id)->delete();
            $address = address::where('user_id',$id)->delete();
            return redirect('user')->with('status','Remove user successfully!!');
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function removeProduct($id){
        try{
            $product = product::where('id',$id)->delete();
            return redirect('product')->with('status','Remove product successfully!!');
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function upduser($id){
        try{
            $address = customer::where('id',$id)->get();
            return view('Admin.edituser',compact('address'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function updated(Request $request, $id){
        try{
            $address = customer::where('id',$id)->get();
            $address[0]['name'] = $request->name;
            $address[0]['email'] = $request->email;
            $address[0]['password'] = $request->password;
            $address[0]['type'] = $request->type;
            $address[0]->save();
            return redirect()->back()->with('status','Data updated successfully');
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function updproduct($id){
        try{
            $product = product::where('id',$id)->get();
            return view('Admin.editproduct',compact('product'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
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
            return redirect()->back()->with('status','Data updated successfully');
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    
    public function details($id){
        try{
            $product = product::find($id);
            return view('Admin.product-details',compact('product'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function active($id){
        $user = customer::find($id);
       
        $user->status = $user->status === 1 ? 0 : 1;

        $user->save();
        return redirect()->back();
    }
}
