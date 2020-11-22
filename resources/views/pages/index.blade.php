@extends('layouts.main', ["header" => "single-page", "bodyClass" => "home hide-logo"])
@section('content')

<section class="form-12" id="home">
    <div class="form-12-content">
        <div class="container">
            <div class="grid grid-column-2 ">
                <div class="column2">
                    </div>
                {{-- <div class="column1">
                    
                    <h2>Quick Quotes</h2>
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
                    </div> --}}
                
            </div>
        </div>
    </div>
</section>
<section class="locations-1" id="locations">
<div class="locations py-5">
 <div class="container py-md-3">
    <div class="heading text-center mx-auto">
        <h3 class="head">Our Services</h3>
        <p class="my-3 head "><b>DXB Tours & Travel</b> is serving valuable clients since last 20 years. Providing Charter of Luxury yachts, World's biggest Dhow cruise experience , Desert Safari services and much more.</p>
      </div>
            <div class="row mt-3 pt-5">
                @foreach($services as $item)
                <div class="col-md-4 col-sm-6" style="margin-bottom: 10px;">
                   <a href="{{route('pages.services',$item->slug)}}"> <div class="box16">
                        <img class="img-fluid" src="{{$item['logo'] ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($item['logo'])]) : '' }}" alt="">
                        <div class="box-content">
                            <h3 class="title">{{$item->name}}</h3>
                            <span class="post">Explore</span>
                           
                        </div>
                    </div>
                </a>

                </div>
                @endforeach
                
            </div>
        </div>
     </div>
 </section>
 
<section class="grids-4" id="properties">
    <div id="grids4-block" class="py-5">
       <div class="container py-md-3">
            <div class="heading text-center mx-auto">
      <h3 class="head">Luxury Yacht</h3>
      <p class="my-3 head"> Make Your day Memorable on a luxury yacht with <b>DXB Tours & Travel</b> by JANNAT TOURS, the leading yacht charter company in the UAE. Available for both daily and hourly rent, the yachts showcased by dxbtoursntravel.ae are wholly owned by us. Backed by a professional crew with more than 20 years of sailing experience, our yacht rental service in Dubai aims to deliver the ultimate yachting experience with professionalism, security, and unparalleled luxury.</p>
    </div>
            <div class="row mt-5 pt-3">
                @foreach($yachtProducts as $product)
                <div class="grids4-info col-lg-4 col-md-6 mt-md-0 mt-5">
                        <a href="#"><img src="{{ $product->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($product->logoFile->id)]) : 'https://via.placeholder.com/150' }}')" class="img-fluid" alt=""></a>
                        <ul class="location-top">
                          @if($product->number_of_pax>0)
                            <li class="rent">{{$product->size}}</li>
                            <li class="open-1">{{$product->number_of_pax}} Pax</li>
                              @endif
                             @if($product->discount_price)<li class="discount">{{$product->discount_price}} % off</li>@endif

                        </ul>
                      
                         <div class="info-bg">
                            <h5><a href="#">{{$product->name}}</a></h5>
                            <p>AED <?php if($product->discount_price>0)
                              echo '<b><s>'.$product->product_price.'</s></b>';
                              $price=round($product->product_price-($product->product_price*$product->discount_price/100));
                              ?>
                              <?php echo $price?> /{{$product->price_criteria}}</p>
                            <div class="col-md-12">
                                <a href="{{route('pages.products',$product->product_slug)}}" type="submit" class="btn btn-booking">See Details</a>
                            </div>
                          <!--   <ul>
                                <li><span class="fa fa-bed"></span> 4 Rooms</li>
                                <li><span class="fa fa-bath"></span>Saloon</li>
                                <li><span class="fa fa-ship"></span> Jacuzzi</li>
                                 <li><span class="fa fa-ship"></span> 16 Knots</li>
                                <li><span class="fa fa-share-square-o"></span> Sun Bathing on Fly Deck</li>
                                <li><span class="fa fa-share-square-o"></span> BBQ on Fly Desk</li>
                            </ul> -->
                        </div>
                    </div>
                    @endforeach
               
                </div>
           </div>
    </div>
</section>

<section class="w3l-apply-6">
    <!-- /apply-6-->
    <div class="apply-info py-5">
        <div class="container py-lg-3">
            <div class="heading text-center mx-auto">
                <h3 class="head text-white">What Makes Us The Preferred Choice</h3>
                <p class="my-3 head "></p>
              </div>
            <div class="apply-grids-info row pt-5 mt-3">
                <div class="apply-gd-left col-lg-7">
                        <div class="row">
                        <div class="col-sm-6 sub-apply">
                                <div class="apply-sec-info text-center">
                                        
                                            <span class="fa fa-university mb-4"></span>
                                    
                                        <div class="appyl-sub-icon-info">
                                                <h5><a href="#">Maximum Choices</a></h5>
                                            <p>We have all kind of toursim facility</p>
                                        </div>
                    
                                    </div>

                        </div>
                        <div class="col-sm-6 sub-apply mt-sm-0 mt-5">
                            <div class="apply-sec-info text-center">
                                    
                                        <span class="fa fa-bath mb-4"></span>
                                    
                                    <div class="appyl-sub-icon-info">
                                            <h5><a href="#">Client Trust Us</a></h5>
                                        <p>We make sure to deliver as per commited</p>
                                    </div>
                
                                </div>

                    </div>
                    <div class="col-sm-6 sub-apply mt-5">
                        <div class="apply-sec-info text-center">
                                
                                    <span class="fa fa-cubes mb-4"></span>
                                
                                <div class="appyl-sub-icon-info">
                                        <h5><a href="#">Client Prefer Us</a></h5>
                                    <p>We have luxury tour packages in reasonable price</p>
                                </div>
            
                            </div>

                </div>
                        <div class="col-sm-6 sub-apply mt-5">
                                <div class="apply-sec-info text-center">
                                        
                                            <span class="fa fa-hospital-o mb-4"></span>
                                        
                                        <div class="appyl-sub-icon-info">
                                                <h5><a href="#">Expert Guidance</a></h5>
                                            <p>Experience Team to guid and make clients trip memorable</p>
                                        </div>
                    
                                    </div>
                        </div>
                    </div>
                </div>
                <div class="apply-gd-right col-lg-5 mt-lg-0 mt-5">
                    <div class="apply-form p-md-5 p-4 mx-auto bg-white mw-100">
                        <h4>What Makes Us </h4>
                        <p class="mt-3">The <b>DXB Tours & Travel</b> team are a combination of aspects that come together to form the perfect tourism  brokerage. More importantly, we are dedicated to deliver you a highly quality experience that will never be forgotten. </p>
                        <p class="mt-3">From extensive research, vigorous training and unmatched experienced, there is no comparison to what the <b>DXB Tours & Travel</b> team will offer you as our client. Allow the team to take you on board and prepare yourself for the experience of a lifetime.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w3l-testimonials" id="testimonials">
  <div class="customers-6-content py-5">
    <div class="container py-lg-3">
      <div class="heading text-center mx-auto">
        <h3 class="head">Happy Clients</h3>
        <p class="my-3 head "> Happy clients says about our services</p>
      </div>
     
      <div id="customerhnyCarousel" class="carousel slide" dsata-ride="carousel">

        <ol class="carousel-indicators">
          <li data-target="#customerhnyCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#customerhnyCarousel" data-slide-to="1"></li>
                        <li data-target="#customerhnyCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner pb-5">

          <div class="carousel-item active">
            <div class="customer row py-5 mt-3">
              <div class="col-lg-4 col-md-6">
                <div class="card"> 
                  <img class="card-img-top img-responsive" src="{{asset('public/assets/images/c3.jpeg')}}" alt="">
                  <div class="card-body">
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    <h3 class="card-title">Sadam Bashir</h3>
                    <p class="sub-title mb-3">Business Owner</p>
                    <p class="card-text text-center mb-4">  Friendly, Supportive, Humble with discount price. This was my solo trip to Dubai. The company arranges everything from Visa, Hotel staying and Tours. Will surely visit again with my family on next tour.
                    </p>
                    <div class="text-right">
                     <span class="fa fa-quote-right" aria-hidden="true"></span>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 off-testi-2">
                <div class="card">
                  <img class="card-img-top img-responsive" src="{{asset('public/assets/images/c2.jpeg')}}" alt="">
                  <div class="card-body">
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    <h3 class="card-title">Muhammad</h3>
                    <p class="sub-title mb-3">Business Man</p>
                    <p class="card-text text-center mb-4">  كانت لدينا تجربة رائعة في رحلات السفاري الصحراوية. كل شيء من الرحلة الصحراوية إلى الصيد بالصقور وركوب الجمال وتناول الطعام كان جيدًا. أحببت مناطق تناول الطعام الخاصة خاصة وأننا كنا هناك في عيد الحب. مجد خاص لمرشدنا السياحي الودود والمفيد وأيضًا لفنان الحناء الموهوب جدًا.
                    </p>
                    <div class="text-right">
                     <span class="fa fa-quote-right" aria-hidden="true"></span>
                    </div>
                  
                  </div>
                </div>
              </div>
              <div class="col-lg-4 offset-md-3 offset-lg-0 col-md-6 off-testi">
                <div class="card">
                  <img class="card-img-top img-responsive" src="{{asset('public/assets/images/c3.jpg')}}" alt="">
                  <div class="card-body">
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    <h3 class="card-title">Sarina Willams</h3>
                    <p class="sub-title mb-3">Fashion Designer</p>
                    <p class="card-text text-center mb-4">  Close your eyes and trust Dxb Tours And Travel. Amazing quality vessels , service and great team -- exceptionally attentive from start to the Finish. Happy to be a member!  
                     </p>
                     <div class="text-right">
                      <span class="fa fa-quote-right" aria-hidden="true"></span>
                     </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--.item-->

          <div class="carousel-item">
            <div class="customer row py-5 mt-3">
              <div class="col-lg-4 col-md-6">
                <div class="card">
                  <img class="card-img-top img-responsive" src="{{asset('public/assets/images/c4.jpeg')}}" alt="">
                  <div class="card-body">
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    <h3 class="card-title">Carol</h3>
                    <p class="sub-title mb-3"> Teacher </p>
                    <p class="card-text text-center mb-4">  Amazing!!!The desert safari was such an amazing experience..i loved the dune drive,camel ride, the shows and the dinner..it was unforgettable,for sure will be back!Highly recommend this company
                    </p>
                    <div class="text-right">
                     <span class="fa fa-quote-right" aria-hidden="true"></span>
                    </div>
                  
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 off-testi-2">
                <div class="card">
                  <img class="card-img-top img-responsive" src="{{asset('public/assets/images/c5.jpeg')}}" alt="">
                  <div class="card-body">
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    <h3 class="card-title">Tazeem Khan</h3>
                    <p class="sub-title mb-3">Business Man</p>
                    <p class="card-text text-center mb-4">  Amazing experience in the heart of Desert!
                     The beautiful colour of sand,the brightness of the ☀ Sun & exciting safari made us joyful 😍  Thanks Again for making may day. I highly recomend DXB T & T
                     </p>
                     <div class="text-right">
                      <span class="fa fa-quote-right" aria-hidden="true"></span>
                     </div>
                    
                  </div>
                </div>
                
                
              </div>
              <div class="col-lg-4 offset-md-3 offset-lg-0 col-md-6 off-testi">
                <div class="card">
                  <img class="card-img-top img-responsive" src="{{asset('public/assets/images/c1.jpeg')}}" alt="">
                  <div class="card-body">
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    <h3 class="card-title">Ehtisham Kiyani</h3>
                    <p class="sub-title mb-3">Manager</p>
                    <p class="card-text text-center mb-4">  Such a fun experience! Did it with my team and they had a blast. Beautiful scenery, excellent service and just overall a good time with Dxb Tours. Thanks again!
                    </p>
                    <div class="text-right">
                     <span class="fa fa-quote-right" aria-hidden="true"></span>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
          </div>
              <!--.item-->

          <div class="carousel-item">
            <div class="customer row py-5 mt-3">
              <div class="col-lg-4 col-md-6">
                <div class="card">
                   <img class="card-img-top img-responsive" src="{{asset('public/assets/images/C6.jpeg')}}" alt="">
                  <div class="card-body">
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    <h3 class="card-title">Sohail  Minhas</h3>
                    <p class="sub-title mb-3">Engineer</p>
                    <p class="card-text text-center mb-4"> Our guide was skilled, friendly and knowledgeable on Dubai. The camel trek was amazing in morning with beautiful sightseeing. Go for the desert bashing dont stop there. The car was clean, comfortable and safe!
                    </p>
                    <div class="text-right">
                     <span class="fa fa-quote-right" aria-hidden="true"></span>
                    </div>
                  
                  </div>
                </div>
              </div>
             
          </div>
        </div>
        <!--.carousel-inner-->
      </div>
    </div>
  </div>
  <!--//customers -->
</section>

@endsection
@push('footer-js')
   


@endpush

