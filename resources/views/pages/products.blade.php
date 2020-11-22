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
        <div class="container py-md-3">
            <div class="cwp4-two row">
                 <div class="cwp4-image col-lg-6 pl-lg-5 mt-lg-0 mt-5">
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
                    
                </div>
                <div class="cwp4-text col-lg-6 " >
                        <h1 class="head">{{$product->name}} {{$product->size}}</h1>


                        <span class="padd">AED <?php if($product->discount_price>0)
                              echo '<b><s>'.$product->product_price.'</s></b>';
                              $price=round($product->product_price-($product->product_price*$product->discount_price/100));
                              ?>
                              <?php echo $price?>/{{$product->price_criteria}}</span>
               
                    <h5>Offers Includes:</h5>
                    {!!$product->long_description!!}
          
                        
<button type="button" class="btn btn-secondary btn-theme3 mt-3" onclick="showmodal('{{$product->name}}');">
 <span class="fa fa-book"></span> Book Now
</button>
                    
                    <a class="btn btn-secondary btn-theme3 mt-3" target="_blank" href="https://api.whatsapp.com/send?phone=971525170000&text=I want to know more about {{$product->name}}"><span class="fa fa-whatsapp"></span> Whatsapp</a>
                    <a class="btn btn-secondary btn-theme3 mt-3" href="tel:+971525170000"><span class="fa fa-phone"></span> Call</a>
                </div>
              
            </div>
        </div>
    </div>
</section>
<script>
  function showmodal(name)
  {
    
    document.getElementById('service_id').value=name;
    $('#exampleModal').modal('show');

  }
</script>
@endsection