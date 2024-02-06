<?php

namespace App\Http\Controllers;
use App\Models\address;
use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\cart;
use App\Models\product;
use App\Models\wishlist;

class paymentController extends Controller
{
    
    public function index($id){
        $user_id = session()->get('id');
        if($user_id){
            $add = address::where('user_id',$user_id)->exists();
            $address = address::where('user_id',$user_id)->get();
            $countCart = cart::where('user_id',$user_id)->get()->count();
            $countWish = wishlist::where('user_id',$user_id)->get()->count();
            $product = product::find($id);
            
            return view('payment',compact('product','add','countCart','address','countWish'));
        }
        return redirect('/')->with('warning','Please login!!');
    }

    public function thanku(){
        try{    
            $user_id = session()->get('id');
            $countCart = cart::where('user_id',$user_id)->get()->count();
            $countWish = wishlist::where('user_id',$user_id)->get()->count();
            return view('thanku',compact('countCart','countWish'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function addAddress(Request $request){
        try{
            $user_id = session()->get('id');
            $email = session()->get('mail');
            $data = new address();
            $data->name = $request->name;
            $data->email = $email;
            $data->number = $request->number;
            $data->landmark = $request->landmark;
            $data->city = $request->city;
            $data->address = $request->address;
            $data->user_id = $user_id;
            $data->save();
            return redirect()->back()->with('status','Updated Address Successfully !!');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function address(Request $id){
        try{
            $user_id= session()->get('id');
            $add = address::where('user_id',$user_id)->exists();
            $countCart = cart::where('user_id',$user_id)->get()->count();
            $countWish = wishlist::where('user_id',$user_id)->get()->count();
            return view('checkout',compact('add','countCart','countWish'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function razorPaySuccess(Request $request){
        try{
            $priceData = $request->input('price');
            $adminData = $request->input('admin');
            $quantityData = $request->input('quantity');
            $product_id = $request->input('product_id');
            $user_id = session()->get('id');
            $priceArray = json_decode($priceData, true);
            $pidArray = json_decode($product_id, true);
            $quantityArray = json_decode($quantityData, true);
            $address = address::where('user_id',$user_id)->get();
            $admin = json_decode($adminData, true);
            

            if((is_array($priceArray))){
                for($i=0;$i<count($priceArray);$i++){
                    $payment = new Payment();
                    $payment->user_id = $user_id;
                    $payment->product_id = $pidArray[$i]['value'];
                    $payment->r_payment_id = $request->payment_id;
                    $payment->amount = $request->amount;
                    $payment->admin_id = $admin[$i]['value'];
                    $payment->price = $priceArray[$i]['value']; // Convert array to JSON if the 'price' field is a text/JSON field in the database
                    $payment->quantity = $quantityArray[$i]['value']; // Convert array to JSON if the 'quantity' field is a text/JSON field in the database
                    $payment->landmark = $address[0]['landmark'];
                    $payment->city = $address[0]['city'];
                    $payment->status = "Processing";
                    $payment->save();
                }
            }else{
                    $payment = new Payment();
                    $payment->user_id = $user_id;
                    $payment->product_id = $pidArray;
                    $payment->r_payment_id = $request->payment_id;
                    $payment->amount = $priceArray;
                    $payment->price = $priceArray; // Convert array to JSON if the 'price' field is a text/JSON field in the database
                    $payment->quantity = $quantityArray; // Convert array to JSON if the 'quantity' field is a text/JSON field in the database
                    $payment->admin_id = $admin[$i]['value'];
                    $payment->landmark = $address[0]['landmark'];
                    $payment->city = $address[0]['city'];
                    $payment->status = "Processing";
                    $payment->save();
            }
            
            
            cart::where('user_id',$user_id)->delete();
            
            return redirect('/thanku')->with('status','Payments successfully done !!');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            dd($e->getMessage());
        } 
    }

    public function handleFormSubmit(Request $request)
    {
    try{
        $priceArray = $request->input('price');
        return redirect()->back()->with('status', 'Form submitted successfully!');
    } catch (QueryException $e) {
        return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
    } catch (\Exception $e) {
        return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
    }
}




}
