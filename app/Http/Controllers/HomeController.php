<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\contactUs;
use App\contactUsModel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendEmail(Request $request)

     {
     //        $obj = new contactUsModel;
    //          $obj->name=$request->name;
    //          $obj->email=$request->email;
    //          $obj->contact=$request->mobile_number;
    //          $obj->message=$request->message;
    //          $obj->status="Pending";
    //           $obj->save();
   try{     
$to_name ="Aamir ALI";
$to_email ='bscsfinal8@gmail.com';
$data = array("name"=>$request->name, "body" =>$request->message,"phone"=>$request->mobile_number,"email"=>$request->emai);
Mail::send('emails.contactUs', $data, function($message) use ($to_name, $to_email) {
$message->to($to_email, $to_name)
->subject("Contact Us");
$message->from($to_email,"Contact US");
});
            return response()->json(['status'=>true],200);
        
 }
 catch(Exception $e)
 {
    return response()->json(['status'=>$e],500);
 }
    }
}
