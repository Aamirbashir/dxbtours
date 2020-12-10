<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="canonical" href="https://www.desertsafariuae.ae/desert-safari-dubai/"> -->
<link rel="icon" 
      type="image/png" 
      href="{{asset('public/assets/images/favicon.ico')}}">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
   
 
    <!-- web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style-starter.css') }}">
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180685244-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180685244-1');
</script>



  </head>
  <body>


<!-- Top Menu 1 -->
<section class="w3l-top-menu-1">
    <div class="top-hd">
        <div class="container">
    <header class="row">
        <div class="social-top col-lg-3 col-6">
            <li>Follow Us</li>
            <li><a href="https://www.facebook.com/jtoursdubai"><span class="fa fa-facebook"></span></a></li>
            <li><a href="https://www.instagram.com/jannat.tours/"><span class="fa fa-instagram"></span></a> </li>
                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li><a href="#"><span class="fa fa-vimeo"></span></a> </li>
        </div>
        <div class="accounts col-lg-9 col-6">

                <li class="top_li"><span class="fa fa-mobile"></span><a href="tel:+971525170000">+971 52 517 0000</a> </li>
                  <li class="top_li"><div id="google_translate_element"></div></li>
                {{-- <li class="top_li1"><a href="#">Login</a></li>
                <li class="top_li2"><a href="#">Register</a></li> --}}
              
        </div>
        
    </header>
</div>
</div>
</section>
<!-- //Top Menu 1 -->
<section class="w3l-bootstrap-header">
  <nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2">
    <div class="container">
      <a class="navbar-brand" href="{{route('pages.webhome')}}"><img src="{{asset('public/assets/images/logo.png')}}"></a>
      <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fa fa-bars"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="">Home</a>
          </li>
          @foreach(\App\servicesModel::limit(3)->get() as $menu)
          <li class="nav-item">
            <a class="nav-link" href="{{route('pages.services',$menu->slug)}}">{{$menu->name}}</a>
          </li>
          @endforeach
          <li class="nav-item mr-0">
            <a class="nav-link" href="{{route('pages.contact-us')}}">New Year EVE</a>
          </li>
  
          <li class="nav-item mr-0">
            <a class="nav-link" href="{{route('pages.contact-us')}}">Contact</a>
          </li>
        </ul>
       
      </div>
    </div>
  </nav>

  <div aria-hidden="true"   id="offdderModal" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-header">
     
        <button type="button" class="close" data-dismiss="myModalLabel" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-content">
        <div class="modal-body mb-0 p-0">
        <img src="{{asset('public/assets/images/newYearEve.jpg')}}" alt="" style="width:100%">
        <button class="modalbtn" href="tel:+971525170000">See Offers</button>
        </div>
       
      </div>
    </div>
  </div>

</section>