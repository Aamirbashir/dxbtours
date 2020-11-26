<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bookings_details;
class bookingsfrontController extends Controller
{
    //

    public function index()
    {
        return view("pages.bookings");
    }
}
