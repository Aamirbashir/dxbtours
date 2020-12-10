<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bookings_details;
use App\products;
use Illuminate\Support\Facades\Mail;
use App\Invoice;
use App\IPNStatus;
use Srmklive\PayPal\Services\AdaptivePayments;
use Srmklive\PayPal\Services\ExpressCheckout;
class bookingsfrontController extends Controller
{
    //
    protected $provider;

    public function __construct()
    {
        $this->provider = new ExpressCheckout();
    }

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
            if($data['kidsNumber']==0)
            {
                $data['kidsPrice']=0;
            }
          
            try
            {
            if($data['payment_type']=='cash')
            {   
                $order_id = Invoice::all()->count() + 1;
                $data['invoice_description'] = "Booking #$order_id Invoice";
               $invoice=$this->createInvoice($data,'NOTPAID');
               $data['invoice_id']=$invoice->id;
              if($this->storeBookings($data))
              return response()->json(['status'=>"success","message"=>"your Bookings Has been confirmed"],200);
              else
              return response()->json(['status'=>"failed","message"=>"Something went wrong! Please contact us on given mobile number"],500);
              
            }
            else
            {
              
                
                return response()->json(['status'=>"success","message"=>$this->getExpressCheckout($data)],200);
              
            }
        }
        catch (Exception $e)
        {
            return response()->json(['status'=>"failed","message"=>"Something went wrong! Please contact us on given mobile number"],500);

        }
            // return response()->json(['status'=>"success","message"=>$data['payment_type']]);
    	   
           


//  $details = [
       
//            "service_name"=> $data['service_name']??null,
//            "service_id"=> $data['service_id']??null,
//            "customer_name"=> $data['firstName'].''. $data['lastName'],
//            "customer_email"=> $data['email']??null,
//            "customer_cell"=> $data['mobile_number']??null,
//            "customer_phone"=> $data['phone_number']??null,
//            "customer_address"=> $data['address'].' '.$data['address2'],
//            "booking_date"=> $data['booking_date']??null,
//            "adultNumber"=>$data['adultNumber'],
//            "kidsNumber"=>$data['kidsNumber'],
//            "number_of_pax"=>$data['adultNumber']+$data['kidsNumber'],
//            "total_collection"=>$data['totalPrice']??null,
//            "total_collected"=>0,
//            "total_balance"=>$data['totalPrice']??null,
//            "location"=>$obj->customer_address,

       
//     ];
   
//     \Mail::to($obj->customer_email)->send(new \App\Mail\bookingsEmail($details));
// return response()->json(['status'=>"success","message"=>"Thank for booking with us"]);


    }

    public function getExpressCheckout($data)
    {   
        $recurring =false; //($request->get('mode') === 'recurring') ? true : false;
        $cart = $this->getCheckoutData($data);
       
        try {
            $response = $this->provider->setExpressCheckout($cart, $recurring);
            return $response['paypal_link'];
        } catch (Exception $e) {
            $invoice = $this->createInvoice($cart, 'Invalid');
             
             
        }
    }

    /**
     * Process payment on PayPal.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getExpressCheckoutSuccess(Request $request)
    {
        $recurring = ($request->get('mode') === 'recurring') ? true : false;
        $token = $request->get('token');
        $PayerID = $request->get('PayerID');

        $cart = $this->getCheckoutData($recurring);

        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            if ($recurring === true) {
                $response = $this->provider->createMonthlySubscription($response['TOKEN'], 9.99, $cart['subscription_desc']);
                if (!empty($response['PROFILESTATUS']) && in_array($response['PROFILESTATUS'], ['ActiveProfile', 'PendingProfile'])) {
                    $status = 'Processed';
                } else {
                    $status = 'Invalid';
                }
            } else {
                // Perform transaction on PayPal
                $payment_status = $this->provider->doExpressCheckoutPayment($cart, $token, $PayerID);
                $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
            }

            $invoice = $this->createInvoice($cart, $status);

            if ($invoice->paid) {
                session()->put(['code' => 'success', 'message' => "Order $invoice->id has been paid successfully!"]);
            } else {
                session()->put(['code' => 'danger', 'message' => "Error processing PayPal payment for Order $invoice->id!"]);
            }

            return redirect('/');
        }
    }

    public function getAdaptivePay()
    {
        $this->provider = new AdaptivePayments();

        $data = [
            'receivers'  => [
                [
                    'email'   => 'johndoe@example.com',
                    'amount'  => 10,
                    'primary' => true,
                ],
                [
                    'email'   => 'janedoe@example.com',
                    'amount'  => 5,
                    'primary' => false,
                ],
            ],
            'payer'      => 'EACHRECEIVER', // (Optional) Describes who pays PayPal fees. Allowed values are: 'SENDER', 'PRIMARYRECEIVER', 'EACHRECEIVER' (Default), 'SECONDARYONLY'
            'return_url' => url('payment/success'),
            'cancel_url' => url('payment/cancel'),
        ];

        $response = $this->provider->createPayRequest($data);
        dd($response);
    }

    /**
     * Parse PayPal IPN.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function notify(Request $request)
    {
        if (!($this->provider instanceof ExpressCheckout)) {
            $this->provider = new ExpressCheckout();
        }

        $post = [
            'cmd' => '_notify-validate',
        ];
        $data = $request->all();
        foreach ($data as $key => $value) {
            $post[$key] = $value;
        }

        $response = (string) $this->provider->verifyIPN($post);

        $ipn = new IPNStatus();
        $ipn->payload = json_encode($post);
        $ipn->status = $response;
        $ipn->save();
    }

    /**
     * Set cart data for processing payment on PayPal.
     *
     * @param bool $recurring
     *
     * @return array
     */
    protected function getCheckoutData($cart,$recurring = false)
    {
        $data = [];

        $order_id = Invoice::all()->count() + 1;

        if ($recurring === true) {
            $data['items'] = [
                [
                    'name'  => 'Monthly Subscription '.config('paypal.invoice_prefix').' #'.$order_id,
                    'price' => 0,
                    'qty'   => 1,
                ],
            ];

            $data['return_url'] = url('/paypal/ec-checkout-success?mode=recurring');
            $data['subscription_desc'] = 'Monthly Subscription '.config('paypal.invoice_prefix').' #'.$order_id;
        } else {
            $data['items'] = [
                [
                    'name'  => $cart['service_name'].'-Adults',
                    'price' => $cart['adultPrice'],
                    'qty'   => $cart['adultNumber'],
                ],
                [
                    'name'  => $cart['service_name'].'-Kids',
                    'price' => $cart['kidsPrice'],
                    'qty'   => $cart['kidsNumber'],
                ],
            ];

            $data['return_url'] = url('/paypal/ec-checkout-success');
        }

        $data['invoice_id'] = config('paypal.invoice_prefix').'_'.$order_id;
        $data['invoice_description'] = "Order #$order_id Invoice";
        $data['cancel_url'] = url('/');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $data['total'] = $total;

        return $data;
    }

    /**
     * Create invoice.
     *
     * @param array  $cart
     * @param string $status
     *
     * @return \App\Invoice
     */
    protected function createInvoice($cart, $status)
    {
        $invoice = new Invoice();
        $invoice->title = $cart['invoice_description'];
        $invoice->price = $cart['totalPrice'];
        if (!strcasecmp($status, 'Completed') || !strcasecmp($status, 'Processed')) {
            $invoice->paid = 1;
        } else {
            $invoice->paid = 0;
        }
        $invoice->save();


        return $invoice;
    }

    public function storeBookings($data)
    {   
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
        $obj->invoice_id=$data['invoice_id'];
        $obj->payment_type=$data['payment_type'];
        $obj->agent='Web';
        if($obj->save())
        return true;
        else
        return false;
    }
}
