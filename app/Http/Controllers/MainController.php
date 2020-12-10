<?php

namespace App\Http\Controllers;

use App\aboutUsModel;
use App\brandsModel;
use App\headerTextModel;
use App\ourTeamModel;
use App\pageAboutUsModel;
use App\servicesModel;
use App\socialLinksModel;
use App\products;
use App\contactUsModel;
use Mail;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Http\Request;
use URL;
class MainController extends Controller
{

    public function index(Request $request){
        //$socialLinks = socialLinksModel::active()->get();
        //$headerText = headerTextModel::active()->get();
        //$aboutUs = aboutUsModel::active()->first();
        $services = servicesModel::with('logoFile')->get();
        $yachtProducts=products::where('service_id',7)->get();

//        dd($socialLinks);

        SEOMeta::setTitle('Best tour company in dubai');
        SEOMeta::setDescription('Dxb tours & travel is the leading tourism company in Dubai offering luxury yachts rental, desert safari, dhow cruise, city tour, and much more.');
        SEOMeta::setCanonical(URL::current());

        OpenGraph::setDescription('Dxb tours & travel is the leading tourism company in Dubai offering luxury yachts rental, desert safari, dhow cruise, city tour, and much more');
        OpenGraph::setTitle('Best tour company in dubai');
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Best tour company in dubai');
        TwitterCard::setSite('@ToursDxb');
SEOMeta::setKeywords('yachts price in dubai,yachts rental price, yachts tours , marina yachts, yachts rental dubai, desert safari dubai, desert safari price, dhow cruise price,dhow cruise in dubai,burj khalifa ticket, global village dubai ticket price,');
        JsonLd::setTitle('Best tour company in dubai');
        JsonLd::setDescription('Dxb tours & travel is the leading tourism company in Dubai offering luxury yachts rental, desert safari, dhow cruise, city tour, and much more');
        JsonLd::addImage(asset('public/assets/images/logo.png'));
        return view('pages.index',compact('yachtProducts','services'));
    }
    public function products($slug)
    {    $services = servicesModel::where('slug',$slug)->first();

        SEOMeta::setTitle($services->title);
        SEOMeta::setDescription($services->short_description);
        SEOMeta::setCanonical(URL::current());

        OpenGraph::setDescription($services->short_description);
        OpenGraph::setTitle($services->title);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle($services->title);
        TwitterCard::setSite('@ToursDxb');
        SEOMeta::setKeywords($services->seo_keywords);
        JsonLd::setTitle($services->title);
        JsonLd::setDescription($services->short_description);
        $image=$services->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($services->logoFile->id)]) : 'https://via.placeholder.com/150';
        JsonLd::addImage($image);
         $products=products::where('service_id',$services->id)->orderBy('display_order')->with('logoFile')->get();
        return view('pages.products_list',compact('services','products'));
    }
    public function singleProduct($slug)
    {
     $product = products::where('product_slug',$slug)->with('logoFile')->first();
        SEOMeta::setTitle($product->title);
        SEOMeta::setDescription($product->short_description);
        SEOMeta::setCanonical(URL::current());

        OpenGraph::setDescription($product->short_description);
        OpenGraph::setTitle($product->title);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle($product->title);
        TwitterCard::setSite('@ToursDxb');
        SEOMeta::setKeywords($product->seo_keywords);
        JsonLd::setTitle($product->title);
        JsonLd::setDescription($product->short_description);
        $image=$product->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($product->logoFile->id)]) : 'https://via.placeholder.com/150';
        JsonLd::addImage($image);
        return view('pages.products',compact('product'));

    }
    
   public function quickquots(Request $request)
   {
          $contact=new contactUsModel;
          $contact->service_name=$request->service_id;
          $contact->email=$request->email;
          $contact->contact=$request->phone_number;
          $contact->message=$request->message;
          $contact->number_of_pax=$request->number_of_pax;
          $contact->save();
          return true;

//     $html='<!DOCTYPE html>
//     <html>
//     <head>
//         <title></title>
//     </head>
//     <body>
//       <h1>'.$request->service_id.'</h1>
//       <p>email:'.$request->email.'<br>
//          cell:'.$request->phone_number.'
//          pax:'.$request->number_of_pax.'
//       </p>
//       <p>'.$request->message.'</p>
//     </body>
//     </html>';
//      Mail::send(array(), array(), function ($message) use ($html,$request) {
//   $message->to('aamir_bashir@live.com')
//     ->subject("quickquots")
//     ->from($request->email)
//     ->setBody($html, 'text/html');
// });
     return true;
   }

    public function blog_listing(Request $request){
        return view('pages.blog.listing');
    }

    public function blog_detail(Request $request){
        return view('pages.blog.detail');
    }

    public function recipe_detail(Request $request){
        return view('pages.recipe.detail');
    }

    public function about_us(Request $request){
        $data = pageAboutUsModel::first();
        return view('pages.about-us',compact('data'));
    }

    public function our_team(Request $request){
        $data = ourTeamModel::with('socials','dp')->get()->toArray();
        return view('pages.our-team',compact('data'));
    }

    public function our_brands(Request $request){
        $services = brandsModel::with('logoFile')->get();
        return view('pages.our-brands',compact('services'));
    }

    public function services(Request $request){
        $services = servicesModel::with('logoFile')->get();
        return view('pages.services',compact('services'));
    }

    public function gallery(Request $request){
        return view('pages.gallery');
    }

    public function franchising(Request $request){
        $brands = brandsModel::get();
        return view('pages.franchising',compact('brands'));
    }

    public function contact_us(Request $request){
        return view('pages.contact-us');
    }

}
