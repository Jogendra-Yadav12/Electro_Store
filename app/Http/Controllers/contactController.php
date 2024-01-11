<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class ContactController extends Controller
{

    public function sendEmail(Request $request)
    {
        if(session()->get('mail')){
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'message' => $request->input('message'),
            ];

            Mail::to("fireboyaj12@gmail.com")->send(new ContactMail($data));
            
            return redirect('/contact')->with('status', 'Message sent successfully!');
        }else{
            return redirect('/')->with('status','Please login!!');
        }
    }
}
