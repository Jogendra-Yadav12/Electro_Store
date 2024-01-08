<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\payment;
use App\Models\product;
use App\Models\address;
use App\Models\customer;

class orderController extends Controller
{
    public function index(){
        
        $order = payment::select('product_id','id','quantity','r_payment_id','price','user_id','amount')->get();
        $data = [];
            for($i=0;$i<count($order);$i++){
                $id = intval($order[$i]['product_id']);
                if(!empty($id)){
                    $img = product::select('name','img')->where('id',$id)->get();
                    
                    array_push($data,$img[0]['img']);
                }
            }
            // dd($data);
            static $x = 0;
            static $y = 1;
        return view('Admin.orders',compact('order','x','y','data'));
    }



    public function customerOrder(){
        if(session()->get('id')){
            $orders = null;
            $user_id = session()->get('id');
            $order = payment::select('product_id','id','r_payment_id','quantity','price','user_id','amount')
            ->where('user_id',$user_id)->get();
            $data = [];
            for($i=0;$i<count($order);$i++){
                $id = intval($order[$i]['product_id']);
                if(!empty($id)){
                    $img = product::select('name','img')->where('id',$id)->get();
                    
                    array_push($data,$img[0]['img']);
                }
            }
            // dd($data);
            static $x = 0;
            static $y = 1;
            return view('order',compact('order','x','y','orders','data'));
        }
        
    }

    public function invoice($id){
        $data = payment::where('id',$id)->get(); // payment data
        $address = address::where('user_id',session()->get('id'))->get(); // user data
        $id = intval($data[0]['product_id']);
        $img = product::select('name','img')->where('id',$id)->get();
            // dd($img[0]['name']);
        
        return view('invoice',compact('data','address','img'));
    }

    public function Admininvoice($id){
        $data = payment::where('id',$id)->get(); // payment data
        $address = address::where('user_id',session()->get('id'))->get(); // user data
        $name = intval($data[0]['user_id']);
        $id = intval($data[0]['product_id']);
        $cus = customer::where('id',$name)->get();
        
        $img = product::select('name','img')->where('id',$id)->get();
        return view('Admin.paymentslip',compact('data','address','img','cus'));
    }
}
