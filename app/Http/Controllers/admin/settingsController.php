<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;
class settingsController extends Controller
{
    //

    public function sitemap()
    {
    	$path=public_path().'/sitemap/sitemap.xml';
     SitemapGenerator::create('https://dxbtoursntravel.ae/')->writeToFile($path);
    }
}
