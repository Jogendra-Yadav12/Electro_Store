<?php

namespace App\Http\Controllers;
use App\Models\address;
use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\cart;

class paymentController extends Controller
{
    
    public function thanku(){
        try{    
            return view('thanku');
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
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
            return redirect()->back();
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function address(Request $id){
        try{
            $user_id= session()->get('id');
            $add = address::where('user_id',$user_id)->exists();
            return view('checkout',compact('add'));
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function razorPaySuccess(Request $request){
        try{
            $priceData = $request->input('price');
            $quantityData = $request->input('quantity');
            $product_id = $request->input('product_id');
            $user_id = session()->get('id');

            $priceArray = json_decode($priceData, true);
            $pidArray = json_decode($product_id, true);
            $quantityArray = json_decode($quantityData, true);


            for($i=0;$i<count($priceArray);$i++){
                $payment = new Payment();
                $payment->user_id = $user_id;
                $payment->product_id = $pidArray[$i]['value'];
                $payment->r_payment_id = $request->payment_id;
                $payment->amount = $request->amount;
                $payment->price = $priceArray[$i]['value']; // Convert array to JSON if the 'price' field is a text/JSON field in the database
                $payment->quantity = $quantityArray[$i]['value']; // Convert array to JSON if the 'quantity' field is a text/JSON field in the database
                $payment->save();
            }
            
            cart::where('user_id',$user_id)->delete();
            $status = "Payments successfully done !!";
            return redirect('/thanku');
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        } 
    }

    public function handleFormSubmit(Request $request)
    {
    try{
        $priceArray = $request->input('price');
        return redirect()->back()->with('success', 'Form submitted successfully!');
    } catch (QueryException $e) {
        return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
    } catch (\Exception $e) {
        return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
    }
}




}
