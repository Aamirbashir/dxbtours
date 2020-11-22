<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' | ' . config('app.name') : config('app.name') }}</title>
    <link rel="icon" href="{{ asset('img/public/admin-fav-icon.png') }}">

    <!-- vendor css -->
    <link href="{{ asset('public/admin/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/select2/css/select2.min.css') }}" rel="stylesheet">

    @stack('plugin-css')
    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/css/bracket.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/custom.css') }}">
</head>

<body class="preload">
<div id="preloader">
    <div id="inner">
    </div>
</div>
<div class="br-logo"><a href=""><span>[</span>DXB <i>Tours</i><span>]</span></a></div>
@include('includes.admin.left-sidebar')
@include('includes.admin.navbar')
<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>{{ isset($title) ? $title : "Not Defined" }}</h4>
            @if(isset($shortDescription))
                <p class="mg-b-0">{!! $shortDescription !!}</p>
            @endif
        </div>
    </div>
