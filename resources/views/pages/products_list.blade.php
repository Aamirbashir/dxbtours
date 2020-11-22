@extends('layouts.main', ["header" => "single-page", "bodyClass" => "home hide-logo"])
@section('content')

<section class="w3l-about-breadcrum">
  <div class="breadcrum-bg py-sm-5 py-4" style="background-image: url('{{ $services->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($services->logoFile->id)]) : 'https://via.placeholder.com/150' }}')">
    <div class="container py-lg-3">
      
      <h2>{{$services->name}}</h2>
      <p><a href="{{route('pages.webhome')}}">Home</a> &nbsp; / &nbsp; {{$services->name}}</p>
   
    </div>
  </div>
</section>
<section class="grids-4" id="properties">
    <div id="grids4-block" class="py-5">
       <div class="container py-md-3">
      <div class="heading text-center mx-auto">
      <h1 class="head">{{$services->name}}</h1>
      <p class="my-3 head">{!!$services->long_description!!}</p>
    </div>
            <div class="row mt-5 pt-3">
                @foreach($products as $product)
                <div class="picRound grids4-info col-lg-4 col-md-6 mt-md-0 mt-5">
                        <a href="{{route('pages.products',$product->product_slug)}}"><img src="{{ $product->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($product->logoFile->id)]) : 'https://via.placeholder.com/150' }}')" class="img-fluid" alt=""></a>
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
                            <hr>
                            <div class="col-md-12">
                                <a href="{{route('pages.products',$product->product_slug)}}"  class="btn btn-booking">See Details</a>
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
@endsection