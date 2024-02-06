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
            $id = session()->get('id');
            // all orders display in super-admin panel
            if($id == 24){ 
                $count = payment::count();
                $order = payment::paginate(5);
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
                    return view('Admin.orders',compact('order','x','y','data','count'));
            }

            // particular admin product data
            $order = payment::where('admin_id',$id)->paginate(5);
            $count = payment::where('admin_id',$id)->count();
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
            return view('Admin.orders',compact('order','x','y','data','count'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }



    public function customerOrder(){
        try{
            if(session()->get('id')){
                $user_id = session()->get('id');
                $orders = $order = payment::where('user_id',$user_id)->count();
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

            $data = payment::find($id); // payment data
            $i = intval($data['user_id']);
            $address = address::where('user_id',$i)->get(); // user data
            $p_id = intval($data['product_id']);
            $img = product::select('name','img')->where('id',$p_id)->get();
            return view('Admin.paymentslip',compact('data','address','img'));
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
            return view('pdf',compact('data','address','img'));
    }
}