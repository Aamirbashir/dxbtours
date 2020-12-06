<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bookings_details;
use App\products;
use Illuminate\Support\Facades\Mail;
class bookingsfrontController extends Controller
{
    //

    public function index()
    {
        return view("pages.bookings");
    }

    public function getBookingForm(Request $request)

    {
    	$data['service_name']=$request->service_name;
    	$data['service_id']=$request->service_id;
    	//?service_Name=Exclusive+Desert+Safari&service_id=6&Car=1&adultPrice=799&kidsNumber=0&kidsPrice=799&totalPrice=799.00
    	$data['adultPrice']=$request->adultPrice;
    	$data['adultNumber']=$request->adultNumber;
    	$data['kidsNumber']=$request->kidsNumber;
    	$data['kidsPrice']=$request->kidsPrice;
    	$data['totalPrice']=$request->totalPrice;
    	$product=products::find($request->service_id);


    	return view("pages.bookings",compact('data','product'));
    }

    public function saveBookings(Request $request)
    {
    	    $data=$request->all();
    	    $obj=new bookings_details;
           $obj->service_name = $data['service_name']??null;
           $obj->service_id = $data['service_id']??null;
            $obj->customer_name = $data['firstName'].''. $data['lastName'];
            $obj->customer_email = $data['email']??null;
            $obj->customer_cell= $data['mobile_number']??null;
            $obj->customer_phone= $data['phone_number']??null;
            $obj->customer_address= $data['address'].' '.$data['address2'];
            $obj->booking_date = $data['booking_date']??null;
            $obj->adultNumber=$data['adultNumber'];
            $obj->kidsNumber=$data['kidsNumber'];
            $obj->number_of_pax=$data['adultNumber']+$data['kidsNumber'];
            $obj->total_collection=$data['totalPrice']??null;
            $obj->total_collected=0;
            $obj->total_balance=$data['totalPrice']??null;
            $obj->message=$data['message']??null;
            $obj->agent='Web';
            $obj->save();
           


 $details = [
       
           "service_name"=> $data['service_name']??null,
           "service_id"=> $data['service_id']??null,
           "customer_name"=> $data['firstName'].''. $data['lastName'],
           "customer_email"=> $data['email']??null,
           "customer_cell"=> $data['mobile_number']??null,
           "customer_phone"=> $data['phone_number']??null,
           "customer_address"=> $data['address'].' '.$data['address2'],
           "booking_date"=> $data['booking_date']??null,
           "adultNumber"=>$data['adultNumber'],
           "kidsNumber"=>$data['kidsNumber'],
           "number_of_pax"=>$data['adultNumber']+$data['kidsNumber'],
           "total_collection"=>$data['totalPrice']??null,
           "total_collected"=>0,
           "total_balance"=>$data['totalPrice']??null,
           "location"=>$obj->customer_address,

       
    ];
   
    \Mail::to($obj->customer_email)->send(new \App\Mail\bookingsEmail($details));
return response()->json(['status'=>"success","message"=>"Thank for booking with us"]);


    }
}
