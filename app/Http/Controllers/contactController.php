<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\customer;
use App\Mail\OTPMail;
use App\Models\wishlist;
use App\Models\cart;


class ContactController extends Controller
{

    public function sendEmail(Request $request)
    {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'message' => $request->input('message'),
            ];

            Mail::to("fireboyaj12@gmail.com")->send(new ContactMail($data));
            
            return redirect('/contact')->with('status', 'Message sent successfully!');
        
    }

  
        public function sendOtp(Request $request)
        {
            $email = $request->email;
            session::put('email',$email);
            $check = customer::where('email',$email)->exists();
            

            if($check){
                $otp = rand(100000, 999999);
                Session::put('otp', $otp);
                Mail::to($email)->send(new OTPMail($otp));
                return redirect('/otp')->with('status','OTP sent successfully!');
            }
            return redirect()->back()->with('warning','Please enter correct email!!');
            
        }

        public function rotp(Request $request){
            $check = customer::where('email',$request->email)->exists();
            if($check === true){
                return response()->json(['status' => 'Email'], 200);
            }

            if($request->password === $request->repass){
                session::put('gmail',$request->email);
                session::put('rname',$request->name);
                session::put('rpass',$request->password);
                $email = $request->email;
                $otp = rand(100000, 999999);
                Session::put('rotp', $otp);
                Mail::to($email)->send(new OTPMail($otp));
                return response()->json(['status' => 'otp'], 200);
            }
            return response()->json(['status' => 'Password'], 200);
    }
    }
