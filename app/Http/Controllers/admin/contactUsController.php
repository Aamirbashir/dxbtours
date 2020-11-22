<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
class contactUsController extends Controller
{
    //

    public function SendEmail(Request $request)

    {
         echo "hello";
 
  // $data = array('name'=>"Virat Gandhi");
   
  //     Mail::send(['text'=>'mail'], $data, function($message) {
  //        $message->to('abc@gmail.com', 'Tutorials Point')->subject
  //           ('Laravel Basic Testing Mail');
  //        $message->from('xyz@gmail.com','Virat Gandhi');
  //     });


    }
}
