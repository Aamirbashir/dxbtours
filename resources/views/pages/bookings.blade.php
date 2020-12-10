@extends('layouts.main', ["header" => "sub-page", "bodyClass" => "without-header-margin"])
@section('content')
@push('header-seo')
<title>DXB tour & Travel | Bookings</title>

@endpush
<section class="w3l-contact-breadcrum">
  <div class="breadcrum-bg py-sm-5 py-4">
    <div class="container py-lg-3">

      <h2>Checkout</h2>
      <p><a href="{{route('pages.webhome')}}">Home</a> &nbsp; / &nbsp; Checkout</p>
   
     </div>
  </div>
</section>
<!-- contact form -->
<section class="w3l-contacts-2" id="contact" style="margin-bottom: 10px">
    <div class="contacts-main">
        <div class="container">
            <div class="py-5 text-center">
            
              <h2></h2>
          
            </div>
               <form id="bookingForm">
                @csrf
            <div class="row">
       
              <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-muted">Your cart</span>
          
                </h4>
              <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">{{$product->name}} {{$product->size}}</h6>
                        {{-- <small class="text-muted">Brief description</small> --}}
                      </div>
                      <span class="text-muted">AED <?php if($product->discount_price>0)
                        echo '<b><s>'.$product->product_price.'</s></b>';
                        $price=round($product->product_price-($product->product_price*$product->discount_price/100));
                        $kidsprice=round($product->kids_price-($product->kids_price*$product->discount_price/100));
                        ?>
                        <?php echo $price?>/ {!!$product->price_criteria!!}</span>
                      <?php 
                      if($product->price_criteria=='Person')
                          $product->price_criteria='Adult';
                   
                      ?>
                    
                    </li>
                  
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <input type="hidden" name="service_name" value="{{$product->name}}">
                        <input type="hidden" name="service_id" value="{{$product->id}}">
                      <div class="form-inline">
                        <label for="inlineFormEmail" class="labl">{{$product->price_criteria}}:</label>
                        <input type="number"   class="form-control m-2 form-quantitiy" value="{{$data['adultNumber']}}"  name="adultNumber" id="adultNumber">
                        <label for="inlineFormEmail">X</label>
                        <input type="text" readonly value="{{$price}}" class="form-control m-2 form-price" name="adultPrice" id="adultPrice">
                      </div>
                    </li>
                    @if($product->kids_price==0)
                  <?php  $display='none !important';?>
                    @endif
                    <div class="kidsSection" style="display:<?php echo $display ?? ''?>">
                  <li class="list-group-item d-flex justify-content-between lh-condensed" >
                      <div class="form-inline">
                        <label for="inlineFormEmail" class="labl my-0">Kids:</label>
                        <input type="number"   class="form-control form-quantitiy" value="{{$data['kidsNumber']}}"  name="kidsNumber" id="kidsNumber">
                        <label for="inlineFormEmail" >X</label>
                      <input type="text" name="kidsPrice" readonly value="{{$price}}" class="form-control m-2 form-price" id="kidsPrice">
                      {{-- <small class="text-muted">Below 10</small> --}}
                      </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                      <div class="text-success">
                        <h6 class="my-0">Kids Below 3</h6>
                        {{-- <small>EXAMPLECODE</small> --}}
                      </div>
                      <span class="text-success">Free</span>
                    </li>
                  </div>
                   
                    <li class="list-group-item d-flex justify-content-between">
                      <span>Total (AED)</span>
                      <strong id="total_label">{{$data['totalPrice']}}</strong>
                      <input type="hidden" id="totalPrice" name="totalPrice" value="{{$data['totalPrice']}}">
                    </li>
                 
                 
                  </ul>
          
                <div class="card p-2">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Booking information</h4>
              <div class="row">
                    <div class="col-md-12 mb-6">
                      <label for="firstName">Booking Date *</label>
                      <input type="date" class="form-control" name="booking_date" id="booking_date" placeholder="booking_date" value="" required>
                      <div class="invalid-feedback" id="firstName_error">
                        Valid first name is required.
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName">First name *</label>
                      <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
                      <div class="invalid-feedback" id="firstName_error">
                        Valid first name is required.
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="lastName">Last name *</label>
                      <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
                      <div class="invalid-feedback" id="lastName_error">
                        Valid last name is required.
                      </div>
                    </div>
                  </div>
          
                
            <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required="">
                    <div class="invalid-feedback" id="email_error">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
                   <div class="col-md-4 mb-3">
                    <label for="email">Mobile Number *</label>
                    <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="" required="">
                    <div class="invalid-feedback" id="phoneNumber_error">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
                   <div class="col-md-4 mb-3">
                    <label for="email">Phone</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="" >
                    <div class="invalid-feedback" id="phoneNumber_error">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
          </div>
                  <div class="mb-3">
                    <label for="address">Address *</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback" id="address_error">
                      Please enter your shipping address.
                    </div>
                  </div>
          
                  <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite">
                  </div>
           <div class="mb-3">
                    <label for="address2">Message <span class="text-muted">(Optional)</span></label>
                    <textarea class="form-control" name="message" id="Message" placeholder="special message"></textarea>
                  </div>
                  <hr class="mb-4">
                 
                  <h4 class="mb-3">Payment</h4>
          
                  <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                      <input id="credit" name="payment_type" value="cash" type="radio" class="custom-control-input" checked required>
                      <label class="custom-control-label" for="credit">Cash On Arival</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="paypal" name="payment_type" value="payPal" type="radio" class="custom-control-input" required>
                      <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                 <!--    <div class="custom-control custom-radio">
                      <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                      <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                      <label class="custom-control-label" for="paypal">PayPal</label>
                    </div> -->
                  </div>
                  {{-- <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="cc-name">Name on card</label>
                      <input type="text" class="form-control" id="cc-name" placeholder="" required>
                      <small class="text-muted">Full name as displayed on card</small>
                      <div class="invalid-feedback">
                        Name on card is required
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="cc-number">Credit card number</label>
                      <input type="text" class="form-control" id="cc-number" placeholder="" required>
                      <div class="invalid-feedback">
                        Credit card number is required
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="cc-expiration">Expiration</label>
                      <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                      <div class="invalid-feedback">
                        Expiration date required
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="cc-cvv">CVV</label>
                      <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                      <div class="invalid-feedback">
                        Security code required
                      </div>
                    </div>
                  </div> --}}
                  <hr class="mb-4">
                  <button class="btn  btn-secondary btn-lg btn-block" type="submit"><i class="fa fa-spinner fa-spin" id="spinner" style="display: none;" ></i> Book Now</button>
                 <div class="col-md-12">
                           <div class="alert alert-success" style="display: none;" id="msg_div">
                                   <span id="res_message">Your bookings has been confirmed. One of our agent will reach you out on given Mobile Number.</span>
                              </div>
                              <div class="alert alert-danger" style="display: none;" id="msg_div_error">
                                <span id="res_message">Sorry! We have some issues in online booking's system. Please contact on given whatsapp number for quick response.</span>
                           </div>
                        </div>
                     </div>
              </div>

            </div>
            </form>
  
          </div>
    </div>
      
        
</section>
@endsection
@push('footer-js')
    <script>
 $('#bookingForm').on('submit',function(event){
 $('#spinner').css("display", "block");
        event.preventDefault();
        $('#hungry-preloader-container').css("display", "block");
      
        $.ajax({
          url: "saveBookings",
          type:"POST",
          data: $("#bookingForm").serialize(),
          success:function(response){
            console.log(response);
 $('#spinner').css("display", "none");
  $('#msg_div').css("display", "block");
              // $('#hungry-preloader-container').css("display", "none");
              // $('#alert-k').css("display", "block");
              //  $('#mesg').html("Thank you: we will get back to you soon");
              //  $('#contactForm').trigger("reset");
          },
          error: function(error){
            $('#spinner').css("display", "none");
  $('#msg_div_error').css("display", "block");
        },

         });
        });

 $("#adultNumber").bind('change', function () {
  if($('#adultNumber').val()<1)
  $('#adultNumber').val(1)
  var  adultNumber=Number($('#adultNumber').val());
    var  adultPrice=Number($('#adultPrice').val());
    var  adultTotal=adultNumber*adultPrice;
    var  kidsNumber=Number($('#kidsNumber').val());
    var  kidsPrice=Number($('#kidsPrice').val());
    var  kidsTotal=kidsNumber*kidsPrice;
    var  total=adultTotal+kidsTotal;
     $('#total_label').html(total.toFixed(2)); 
     $('#totalPrice').val(total.toFixed(2));          
});
$("#kidsNumber").bind('change', function () {
  if($('#kidsNumber').val()<0)
  $('#kidsNumber').val(0)

  var  adultNumber=Number($('#adultNumber').val());
    var  adultPrice=Number($('#adultPrice').val());
    var  adultTotal=adultNumber*adultPrice;
    var  kidsNumber=Number($('#kidsNumber').val());
    var  kidsPrice=Number($('#kidsPrice').val());
    var  kidsTotal=kidsNumber*kidsPrice;
    var  total=adultTotal+kidsTotal;
     $('#total_label').html(total.toFixed(2));   
      $('#totalPrice').val(total.toFixed(2));
});
    </script>
@endpush
