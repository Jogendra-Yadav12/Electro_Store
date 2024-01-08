<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'vendor/autoload.php';

class contactController extends Controller
{
    public function store(Request $request){
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com;';   // using gmail                   
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'fireboyaj12@gmail.com';   // sender email             
            $mail->Password   = 'amyxoepdwtmsekwr';      // app password creating by gmail account                     
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  
        
            $mail->setFrom($request->email, session()->get('mail'));    // sender email and name    
            $mail->addAddress('fireboyaj12@gmail.com', 'Jogendra Yadav'); // reciver email and name
              
            // $mail->isHTML(true);                                  
            $mail->Subject = 'Customer Mail';  // Subject which display on top
            $mail->Body    = 'Name :- ' + session()->get('name')
                            + $request->message ;    // email body
            $mail->send();                       // send mail
           return redirect()->back();
            
        } catch (Exception $e) {
            
        }
    }
}