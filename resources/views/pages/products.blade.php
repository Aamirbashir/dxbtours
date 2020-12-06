@extends('layouts.main', ["header" => "single-page", "bodyClass" => "home hide-logo"])
@section('content')

<section class="w3l-about-breadcrum">
  <div class="breadcrum-bg py-sm-5 py-4" style="background-image: url('{{ $product->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($product->logoFile->id)]) : 'https://via.placeholder.com/150' }}')">
    <div class="container py-lg-3">
      
      <h2>{{$product->name}}</h2>
     <p><a href="{{url()->previous()}}">Back</a> &nbsp; / &nbsp; {{$product->name}}</p>

    </div>
  </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bookings Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                                <input type="text" name="service_id" id="service_id" class="form-control">
                                <input type="date" name="date" class="form-control" placeholder="choose date *">
                                
                            </div>
                            
                            <div class="form-top">
                                <input type="number" name="number_of_pax" id="number_of_pax" placeholder="Number of Pax *">
                                <input type="email" name="email" id="email" placeholder="Email *">
                            </div>
                        
                            <div class="form-top" style="margin-top: 15px !important">
                                <input type="text" class="form-control" name="phone_number" placeholder="Cell Number">
                              </div>
                                <div class="form-top">
                               
                                <textarea id="message" name="message" style="margin-top: 15px !important" placeholder="Message *"></textarea>
                            </div>
                            
                          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
        <button  type="submit" id="save-data" class="btn btn-secondary">Submit</button>
                        </form>
      </div>
    </div>
  </div>
</div>
<!-- content-with-photo4 block -->
<section class="w3l-content-with-photo-4" id="about">
    <div id="content-with-photo4-block" class="py-5"> 
      
        <div class="container py-md-18">
            <div class="cwp4-two row">
                 <div class="cwp4-image col-lg-8 pl-lg-8 mt-lg-0 mt-8">
                   @if(count($product->gallery()))
                   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach ($product->gallery() as $key=>$item)
    <div class="carousel-item <?php if($key==0) echo 'active';?>">
     <img src="{{asset('storage/app/'.$item->imageUrl)}}" class="img-fluid" alt="" />
    </div>
     @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@else
<img src="{{ $product->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($product->logoFile->id)]) : 'https://via.placeholder.com/150' }}" class="img-fluid" alt="" />
@endif
<div class="reviews"
  <span class="heading">Reviews(<?php echo rand(1,1000); ?>)</span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
</div></div>
                <div class="col-lg-4" >
                 
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
                        <?php echo $price?>/{{$product->price_criteria}}</span>
                      <?php 
                      if($product->price_criteria=='Person')
                      $product->price_criteria='Adult';
                      ?>
                    </li>
                    <form action="gasdfa">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      
                      <div class="form-inline">
                        <label for="inlineFormEmail" class="labl">{{$product->price_criteria}}:</label>
                        <input type="number"  value="1" class="form-control m-2 form-quantitiy"  name="adultNumber" id="adultNumber">
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
                        <input type="number"  value="0" class="form-control form-quantitiy"  name="kidsNumber" id="kidsNumber">
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
                      <strong id="total_label"></strong>
                      <input type="hidden" id="totalPrice" name="totalPrice" value="">
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                     <input type="submit" class="btn btn-secondary btn-theme3 mt-3" value="Book Now" type="submit">
                        
                 
                      {{-- <a class="btn btn-secondary btn-theme3 mt-3" onclick="WhatsAppBooking('{!!$product->name!!}','{!!$product->price_criteria!!}')"><span class="fa fa-whatsapp"></span>Whatsapp</a> --}}
                    </li>
                  </form>   
                  </ul>
                
                  {{-- <form class="card p-2">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Promo code">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                      </div>
                    </div>
                  </form> --}}
                 
               
            </div>  
            <div class="row locations-1">
                <div class="cwp4-text col-md-8" >
                   
               
                    <h5>Offers Includes:</h5>
                    <hr>
                    {!!$product->long_description!!}
          
    
                
                    <a class="btn btn-secondary btn-theme3 mt-3" target="_blank" href="https://api.whatsapp.com/send?phone=971525170000&text=I want to know more about {{$product->name}}"><span class="fa fa-whatsapp"></span> Whatsapp</a>
                    <a class="btn btn-secondary btn-theme3 mt-3" href="tel:+971525170000"><span class="fa fa-phone"></span> Call</a>
                </div>
                <div class="col-md-4 ">
                 
                  <h5>See Also</h5>
                  <hr>
                  @foreach (App\products::where('id','!=',$product->id)->limit(3)->get() as $Mainkey=>$item)
                      
                 
                
                  <div class="grids-4">
                
  
                          <a href="{{route('pages.products',$item->product_slug)}}"><img src="{{ $item->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($item->logoFile->id)]) : 'https://via.placeholder.com/150' }}')" class="img-responsive" alt=""></a>                    
  
                       
  
                          <div class="info-bg">
                              <h5><a href="{{route('pages.products',$item->product_slug)}}">{{$item->name}}</a></h5>
                              <p>AED <?php if($item->discount_price>0)
                                echo '<b><s>'.$item->product_price.'</s></b>';
                                $price=round($item->product_price-($item->product_price*$item->discount_price/100));
                                ?>
                                <?php echo $price?> /{{$item->price_criteria}}
                              
                              </p>
                              
                          
  <span class="heading">Reviews(<?php echo rand(1,1000); ?>)</span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>
                         
                          </div>
                      </div>
                      @endforeach

               </div>
            </div>
        </div>
    </div>
</section>
<script>
  $(document).ready(function() {
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
});
function WhatsAppBooking(name,criteria){
  
  var  adultNumber=Number($('#adultNumber').val());
    var  adultPrice=Number($('#adultPrice').val());
    var  adultTotal=adultNumber*adultPrice;
    var  kidsNumber=Number($('#kidsNumber').val());
    var  kidsPrice=Number($('#kidsPrice').val());
    var  kidsTotal=kidsNumber*kidsPrice;
    var  total=adultTotal+kidsTotal;
     $('#total_label').html(total.toFixed(2));  
   var message=name+'%0aTotal '+criteria+':'+adultNumber+'%0aTotal Kids:'+kidsNumber+'%0aTotal:'+total;
var win = window.open('https://api.whatsapp.com/send?phone=971525170000&text=I want to Book %0a'+message, '_blank');
}

  
  function showmodal(name)
  {
    
    document.getElementById('service_id').value=name;
    $('#exampleModal').modal('show');
    
  }
</script>
@endsection