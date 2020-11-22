<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactController extends Controller
{
    //
    public function sendEmail(Request $request)
    {
  
   $data = array('name'=>$request->res_name,'email'=>$request->res_email,'phone'=>,$request->res_phone,'message'=>$request->message);
     Mail::send('emails.contactUs', $data , function($message){
$message->to(Input::get('Email'), 'itsFromMe')
        ->subject('Contact US');
  
    }
}
