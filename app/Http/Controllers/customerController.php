<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\product;
use App\Models\address;
use App\Models\cart;


class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $cus = customer::where("email",$request->email)->exists();
            if($cus){
                $status = "Email is already eixsts";
                return redirect('/')->with('status','Email is already eixsts!!');
            }
            $user = new customer;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->type = 'customer';
            $user->status = 1;
            $user->save();
            return redirect('/')->with('status','user register successfully!!');
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    

    public function useraddress(){
        try{
            $user_id = session()->get('id');
            $user = address::where('user_id',$user_id)->get();
            $double = address::where('user_id',$user_id)->exists();
            return view('useraddress',compact('user','double'));
        } catch (QueryException $e){
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try{
            $email = $request->email;
            $password = $request->password;
            
            $user = customer::where('email',$email)->get();
            
            foreach($user as $key=>$value){
                $userid = $value['id'];
                $name = $value['name'];
                if($value['status'] === 1){
                if($email==$value['email'] and $password==$value['password'] and $value['type']=='admin'){
                    session()->put('mail',$email);
                    session()->put('name',$name);
                    session()->put('id',$userid);
                    return redirect('/user');
                }
                if($email==$value['email'] and $password==$value['password'] and $value['type']=='customer'){
                    session()->put('mail',$email);
                    session()->put('name',$name);
                    session()->put('id',$userid);
                    return redirect('/');
                }
                return redirect('/')->with('status','Please enter correct email & password');
            }
                return redirect('/')->with('status','Your account has blocked !!');
            }
            
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function autocomplete(Request $request)
    {   
        try{
            $search = $request->input('search');
            $data = product::select("name", "id","price","img")->where('name', 'LIKE', '%'. $search . '%')->get();
            $count = product::select("name", "id","price","img")->where('name', 'LIKE', '%'. $search . '%')->get()->count();
            if($search==null){
                return redirect()->back();
            }
            elseif($data){
                return view('search',compact('data','count'));
            }else{
                return redirect('/');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function profile(){
        try{
            if(session()->get('id')){
                $user_id= session()->get('id');
                $user = customer::where('id',$user_id)->get();
                $detail = address::find($user_id);
            
            return view('profile',compact('user','detail'));
            }
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

            $double = address::where('user_id',$user_id)->exists();
                if($double){
                    $rep=address::where('user_id',$user_id)->get();
                    $rep[0]['number'] = $request->number;
                    $rep[0]['landmark'] = $request->landmark;
                    $rep[0]['city'] = $request->city;
                    $rep[0]['address'] = $request->address;
                    $rep[0]->save();
                    return redirect()->back();
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
            return redirect('profile');
        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('/')->with('status', 'An error occurred: ' . $e->getMessage());
        }
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
