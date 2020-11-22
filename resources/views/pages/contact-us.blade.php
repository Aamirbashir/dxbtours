@extends('layouts.main', ["header" => "sub-page", "bodyClass" => "without-header-margin"])
@section('content')
@push('header-seo')
<title>DXB tour & Travel | Contact us</title>

@endpush
<section class="w3l-contact-breadcrum">
  <div class="breadcrum-bg py-sm-5 py-4">
    <div class="container py-lg-3">

      <h2>Contact Us</h2>
      <p><a href="{{route('pages.webhome')}}">Home</a> &nbsp; / &nbsp; Contact</p>
   
     </div>
  </div>
</section>
<!-- contact form -->
<section class="w3l-contacts-2" id="contact">
    <div class="contacts-main">
        
        <div class="form-41-mian py-5">
            <div class="container py-md-3">
                <h3 class="cont-head">Get in touch</h3>
                <div class="d-grid align-form-map">
                    <div class="form-inner-cont">
                        
                           <form id="quick_quotes">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="row">
                        <div class="col-md-12">
                           <div class="alert alert-success d-none" id="msg_div">
                                   <span id="res_message"></span>
                              </div>
                        </div>
                     </div>
                            <div class="form-top">
                                <select id="service_id"  name="service_id">
                                    <option value="">Select Service</option>
                                    <option value="Luxury Yacht">Luxury Yacht</option>
                                    <option value="Desert Safari">Desert Safari</option>
                                    <option value="Private Desert Safari">Private Desert Safari</option>
                                    <option value="Dhow Cruise">Dhow Cruise</option>
                                        <option value="City Tour">City Tour</option>
                                        <option value="UAE complete Tour">UAE complete Tour</option>
                                                                      </select>
                                <input type="date" name="date" class="form-control" placeholder="choose date *">
                                
                            </div>
                            
                            <div class="form-top">
                                <input type="Number" name="number_of_pax" id="number_of_pax" placeholder="Number of Pax *">

                              <input type="email" name="email" id="email" placeholder="Email *">
                            </div>
                        
                            <div class="form-top">
                                <input type="text" name="phone_number" placeholder="Cell Number">
                                <textarea id="message" name="message" style="margin-top: 15px !important" placeholder="Message *"></textarea>
                            </div>
                            
                            <button  type="submit" id="save-data" class="btn">Submit</button>
                        </form>
                    </div>
                    
                    <div class="contact-right">
                        <img src="assets/images/ab-2.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="contant11-top-bg py-5">
            <div class="container py-md-3">
                <div class="d-grid contact section-gap">
                    <div class="contact-info-left d-grid text-center">
                        <div class="contact-info">
                            <span class="fa fa-location-arrow" aria-hidden="true"></span>
                            <h4>Address</h4>
                            <p>Kiosk No 07, Marina Walk, Near Pier 7, Jannat Tours 44456</p>
                        </div>
                        <div class="contact-info">
                            <span class="fa fa-phone" aria-hidden="true"></span>
                            <h4>Phone</h4>
                            <p><a href="tel:+71525170000">+971 52 517 0000</a></p>
                            <p><a href="tel:+971525170000">+971 4 335 9777</a></p>
                        </div>
                        <div class="contact-info">
                            <span class="fa fa-envelope-open-o" aria-hidden="true"></span>
                            <h4>Mail</h4>
                            <p><a href="bookings@dxbtoursntravel.ae" class="email">bookings@dxbtoursntravel.ae</a></p>
                            <p><a href="info@dxbtoursntravel.ae" class="email">info@dxbtoursntravel.ae</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.732104507816!2d55.13695664935762!3d25.077067542641604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6d0f44ccb14f%3A0x926ed6fb566a7320!2sJannat%20Tours!5e0!3m2!1sen!2sde!4v1602861029586!5m2!1sen!2sde" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
           
        </div>
</section>
@endsection
@push('footer-js')
    <script>
 $('#contactForm').on('submit',function(event){
        event.preventDefault();
        $('#hungry-preloader-container').css("display", "block");
        name = $('#res_name').val();
        email = $('#res_email').val();
        mobile_number = $('#res_phone').val();
  //  subject = $('#subject').val();
        message = $('#res_message').val();

        $.ajax({
          url: "sendEmail",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            name:name,
            email:email,
            mobile_number:mobile_number,
          //  subject:subject,
            message:message,
          },
          success:function(response){
            console.log(response);

              $('#hungry-preloader-container').css("display", "none");
              $('#alert-k').css("display", "block");
               $('#mesg').html("Thank you: we will get back to you soon");
               $('#contactForm').trigger("reset");
          },

         });
        });
    </script>
@endpush
