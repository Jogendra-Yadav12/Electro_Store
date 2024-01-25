<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\order;
use App\Models\payment;
use App\Models\product;
use App\Models\address;
use App\Models\customer;
use App\Models\cart;
use App\Models\wishlist;



class orderController extends Controller
{
    public function index(){
        try{
            $order = payment::paginate(5);
            // $orders = payment::join('product','payments.product_id','=','product.id')
            // ->select('payments.*','product.img','product.name')->get();
            
            // $dataorder = Checkout::join('product', 'checkout.p_id', '=', 'product.id')
            //     ->where('checkout.user_id', $email)
            //     ->select('checkout.*', 'product.img', 'product.name')
            //     ->get();
            // dd($orders);
           $data = [];
               for($i=0;$i<count($order);$i++){
                    $id = intval($order[$i]['product_id']);
                    if(!empty($id)){
                        $img = product::select('name','img')->where('id',$id)->get();
                        array_push($data,$img[0]['img']);
                       
                    }
                }
               
                static $x = 0;
                static $y = 1;
            return view('Admin.orders',compact('order','x','y','data'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }



    public function customerOrder(){
        try{
            if(session()->get('id')){
                $orders = null;
                $user_id = session()->get('id');
                $order = payment::where('user_id',$user_id)->paginate(8);
                $countCart = cart::where('user_id',$user_id)->get()->count();
                $countWish = wishlist::where('user_id',$user_id)->get()->count();
                
                $data = [];
                for($i=0;$i<count($order);$i++){
                    $id = intval($order[$i]['product_id']);
                    if(!empty($id)){
                        $img = product::select('name','img')->where('id',$id)->get();
                        array_push($data,$img[0]['img']);
                    }
                }
                static $x = 0;
                static $y = 1;
                return view('order',compact('order','x','y','orders','data','countCart','countWish'));
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
        
    }

    public function invoice($id){
        try{
            $data = payment::where('id',$id)->get(); // payment data
            $address = address::where('user_id',session()->get('id'))->get(); // user data
            
            $id = intval($data[0]['product_id']);
            $img = product::select('name','img')->where('id',$id)->get();
            $countCart = cart::where('user_id',session()->get('id'))->get()->count();
            $countWish = wishlist::where('user_id',session()->get('id'))->get()->count();
            
           
            return view('invoice',compact('data','address','img','countCart','countWish'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function Admininvoice($id){
        try{
            $data = payment::where('id',$id)->get(); // payment data
            $address = address::where('user_id',session()->get('id'))->get(); // user data
            $name = intval($data[0]['user_id']);
            $id = intval($data[0]['product_id']);
            $cus = customer::where('id',$name)->get();
            
            $img = product::select('name','img')->where('id',$id)->get();
            return view('Admin.paymentslip',compact('data','address','img','cus'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function pdf($id){
            $data = payment::where('id',$id)->get(); // payment data
            $address = address::where('user_id',session()->get('id'))->get(); // user data
            $id = intval($data[0]['product_id']);
            $img = product::select('name','img')->where('id',$id)->get();   
            // $pdf =PDF::loadView('pdf',compact('data','address','img'));
            // return $pdf->download('Bill.pdf');
            return view('pdf',compact('data','address','img'));
    }
}
