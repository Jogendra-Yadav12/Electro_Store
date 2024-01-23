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
        try{
            if(session()->get('mail')){
                $user_id= session()->get('id');
                $add = address::where('user_id',$user_id)->exists();
                $product = cart::where('user_id',$user_id)->get();
                $countCart = cart::where('user_id',$user_id)->get()->count();
                $countWish = wishlist::where('user_id',$user_id)->get()->count();
                $address = address::where('user_id',$user_id)->get();
                $check = address::where('user_id',$user_id)->exists();
                return view('checkout',compact('product','countCart','add','address','check','countWish'));
            }else{
                return redirect('/')->with('warning','Please login!!');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
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
        try{
            $user_id = session()->get('id');
            if(session()->get('mail')){
                
                $item = product::find($id);
                
                $double = wishlist::where('p_id',$id)->exists();
                if($double){
                    $item = wishlist::where('p_id',$id)->delete();
                    return redirect()->back()->with('status','Remove From Wishlist!!');
                }
                $wish = new wishlist;
                $wish->p_name = $item['name'];
                $wish->img = $item['img'];
                $wish->price = $item['price'];
                $wish->user_id = $user_id;
                $wish->p_id = $item['id'];
                $wish->save();
                return redirect()->back()->with('status','Add Into Wishlist !!');
        
            }else{
                return redirect('/')->with('warning','Please login!!');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
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
        if(session()->get('mail')){
        try{
            $user_id= session()->get('id');
            $data = wishlist::where('user_id',$user_id)->get();
            $count = wishlist::where('user_id',$user_id)->get()->count();
            $countCart = cart::where('user_id',$user_id)->get()->count();
            $countWish = wishlist::where('user_id',$user_id)->get()->count();
            
            return view('wishlist',compact('data','count','countCart','countWish'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }
    return redirect()->back()->with('warning','Please login !!');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $id)
    {
        try{
            $user_id= session()->get('id');
            if(session()->get('mail')){
                $cart = new cart;
                $item = product::find($id);
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
                
                return redirect('checkout')->with('status','Product Add Into Cart Successfully !!');

            }else{
                return redirect('/')->with('warning','Please login!!');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
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
        try{
            $item = cart::where('id',$id)->delete();
            return redirect('checkout')->with('status','Remove product successfully!!');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function wishremove($id)
    {
        try{
            $item = wishlist::where('id',$id)->delete();
            return redirect('wishlist')->with('status','Remove product successfully!!');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
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
