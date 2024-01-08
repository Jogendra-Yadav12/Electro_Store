<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\cart;
use App\Models\customer;
use App\Models\address;
use App\Models\wishlist;

class checkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('mail')){
            $user_id= session()->get('id');
            $add = address::where('user_id',$user_id)->exists();
            $product = cart::where('user_id',$user_id)->get();
            $count = cart::where('user_id',$user_id)->get()->count();
            return view('checkout',compact('product','count','add'));
        }else{
            return redirect('/')->with('status','Please login!!');
        }
    }

    public function increment(){

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function wishlist($id)
    {
        $user_id= session()->get('id');
        if(session()->get('mail')){
            
            $item = product::find($id);
            
            $double = wishlist::where('p_id',$id)->exists();
            if($double){
                return redirect()->back();
            }
            $wish = new wishlist;
            $wish->name = $item['name'];
            $wish->img = $item['img'];
            $wish->price = $item['price'];
            $wish->user_id = $user_id;
            $wish->p_id = $item['id'];
            $wish->save();
            return redirect('wishlist');
     
        }else{
            return redirect('/')->with('status','Please login!!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wish()
    {
        $user_id= session()->get('id');
       $data = wishlist::all();
       $count = wishlist::where('user_id',$user_id)->get()->count();
       return view('wishlist',compact('data','count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $id)
    {
        $user_id= session()->get('id');
        if(session()->get('mail')){
            $cart = new cart;
            $item = product::find($id);
            $wish = wishlist::where('p_id',$id['id'])->exists();
            $d = cart::where('p_id',$id['id'])->where('user_id',$user_id)->get();
            $double = cart::where('p_id',$id['id'])->where('user_id',$user_id)->exists();
            if($double){
                $p = $d[0]['price']/$d[0]['quantity'];
                $c = $d[0]['quantity']+1;
                $rep=cart::find($d[0]['id']);
                $rep->quantity = $c;
                $rep->price = $p * $c;
                // dd($rep);
                $rep->save();
                $item = wishlist::where('p_id',$id['id'])->delete();
                return redirect('checkout');
            }
                
            foreach($item as $key=>$value){
                $cart->name = $value['name'];
                $cart->img = $value['img'];
                $cart->price = $value['price'];
                $cart->quantity = 1;
                $cart->user_id = $user_id;
                $cart->p_id = $id['id'];
                $cart->save();
            }
            
            if($wish){
                $item = wishlist::where('p_id',$id['id'])->delete();
            }
            return redirect('checkout');

        }else{
            return redirect('/')->with('status','Please login!!');
        }
    }

   
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $item = cart::where('id',$id)->delete();
        return redirect('checkout')->with('status','Remove product successfully!!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
