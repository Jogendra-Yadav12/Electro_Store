<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\product;
use App\Models\address;
use App\Models\cart;
use App\Models\wishlist;


class customerController extends Controller
{

    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        try{
            $rotp = intval($request->rotp);

            if(session()->get('rotp') === $rotp){

                $user = new customer;
                $user->name = session()->get('rname');
                $user->email = session()->get('gmail');
                $user->password = Hash::make(session()->get('rpass'));
                $user->type = 'customer';
                $user->status = 1;
                $user->save();

                $cus = customer::where('email',session()->get('gmail'))->get();
                $email = session()->get('gmail');
                $password = session()->get('rpass');
                
                foreach($cus as $key=>$value){
                    if($email==$value['email'] and Hash::check($password,$value['password']) and $value['type']=='customer'){
                        $user_id = $value->id;
                        session()->put('mail',$email);
                        session()->put('name',$value->name);
                        session()->put('id',$user_id);
                        return redirect('/');
                    }else{
                        return redirect('/')->with('warning','Your Account Has Blocked !!');
                    }
                }
                return redirect('/')->with('status','user register successfully!!');
            }
            return redirect()->back()->with('warning','Wrong OTP !!');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function useraddress(){
        try{
            $user_id = session()->get('id');
            if($user_id){
                $user = address::where('user_id',$user_id)->get();
                $countCart = cart::where('user_id',$user_id)->get()->count();
                $countWish = wishlist::where('user_id',$user_id)->get()->count();
                $double = address::where('user_id',$user_id)->exists();
                return view('useraddress',compact('user','double','countCart','countWish'));
            }else{
                return redirect()->back()->with('warning','Please login !!');
            }
        } catch (QueryException $e){
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        try{
            $email = $request->email;
            $password = $request->password;
            
            $user = customer::where('email',$email)->get();

            foreach($user as $key=>$value){
                $userid = $value['id'];
                $name = $value['name'];
                $type = $value['type'];
                if($value['status'] === 1){
                    if($email==$value['email'] and Hash::check($password,$value['password']) and $email === 'fireboyaj12@gmail.com'){
                        session()->put('mail',$email);
                        session()->put('name',$name);
                        session()->put('id',$userid);
                        session()->put('type',$type);
                        return redirect('/home');
                    }
                    if($email==$value['email'] and Hash::check($password,$value['password']) and $value['type']=='admin'){
                        session()->put('mail',$email);
                        session()->put('name',$name);
                        session()->put('id',$userid);
                        session()->put('type',$type);
                        return redirect('/home');
                    }
                    if($email==$value['email'] and Hash::check($password,$value['password']) and $value['type']=='customer'){
                        session()->put('mail',$email);
                        session()->put('name',$name);
                        session()->put('id',$userid);
                        session()->put('type',$type);
                        return redirect('/');
                    }
            }else{
                return redirect('/')->with('warning','Your Account Has Blocked !!');
                }
            }
            return redirect('/')->with('warning','Please Enter Correct Email and Password');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function autocomplete(Request $request)
    {   
        try{
            $user_id = session()->get('id');
            $search = $request->input('search');
            
            $data = product::select("name", "id","price","img")->where('name', 'LIKE', '%'. $search . '%')->orWhere('brand', 'LIKE', '%'. $search . '%')->get();
            $count = product::select("name", "id","price","img")->where('name', 'LIKE', '%'. $search . '%')->get()->count();
            $countWish = wishlist::where('user_id',$user_id)->get()->count();
            $countCart = cart::where('user_id',$user_id)->get()->count();
            if($search==null){
                return redirect()->back();
            }
            elseif($data){
                return view('search',compact('data','count','countCart','countWish'));
            }else{
                return redirect('/');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function profile(){
        try{
            if(session()->get('id')){
                $user_id= session()->get('id');
                $countCart = cart::where('user_id',$user_id)->get()->count();
                $countWish = wishlist::where('user_id',$user_id)->get()->count();
                $user = customer::where('id',$user_id)->get();
                $detail = address::where('user_id',$user_id)->get();
                $check = address::where('user_id',$user_id)->exists();
                
            
            return view('profile',compact('user','detail','check','countCart','countWish'));
            }
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
            if($user_id){
            $double = address::where('user_id',$user_id)->exists();
                if($double){
                    $rep=address::where('user_id',$user_id)->get();
                    $rep[0]['number'] = $request->number;
                    $rep[0]['landmark'] = $request->landmark;
                    $rep[0]['city'] = $request->city;
                    $rep[0]['address'] = $request->address;
                    $rep[0]->save();
                    return redirect()->back()->with('status','Updated Address Successfully !!');
                }
            
            $data = new address();
            $data->name = $request->name;
            $data->email = $email;
            $data->number = $request->number;
            $data->landmark = $request->landmark;
            $data->city = $request->city;
            $data->address = $request->address;
            $data->user_id = $user_id;
            $data->save();
            return redirect('profile')->with('status','Address add successfully');
            }else{
                return redirect()->back()->with('warning','Please login !!');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function updpass(Request $request)
    {
        $user_id = session()->get('id');
        $countCart = cart::where('user_id',$user_id)->get()->count();
        $countWish = wishlist::where('user_id',$user_id)->get()->count();
        return view('updatepass',compact('countCart','countWish'));
    }

    public function updatepass(Request $request)
    {
        try {
            $user_id = session()->get('id');
            $user = customer::find($user_id);
            if(Hash::check($request->oldpass,$user->password)){
                $user->password = Hash::make($request->newpass);
                $user->save();
            }
            else{
                return redirect()->back()->with('warning','Your Old Password Is Wrong!!');
            }
            Session()->flush();
            return redirect('/')->with('status','Password Update Successfully !!');  
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function forgetpass(){
        try {
            return view('forget');
        } catch (QueryException $e) {
            return redirect()->back()->with('errror', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function otp(){
        try {
            if(session()->get('email')){
                return view('otp');
            }
            return redirect()->back()->with('warning','Enter email id');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function verifyotp(Request $request){
        try {
            $otp = intval($request->otp);
            $verify = session()->get('otp');
            if($otp === $verify){
                return redirect('reset');
            }
            return redirect('forget')->with('warning','Please Re-enter Email Id');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function resetpass(){
        try {
            return view('resetpass');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function updatepassword(Request $request){
        try{
            $user_email = session()->get('email');
            $user = customer::where('email',$user_email)->get();
            if($request->newpass == $request->repass){
                $user[0]['password'] = Hash::make($request->newpass);
                $user[0]->save();
                return redirect('/')->with('status','Password Update Successfully !!');
            }
            else{
                return redirect()->back()->with('warning','Password Does Not Match !!');
            }
        }catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
