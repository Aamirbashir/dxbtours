@extends('layouts.main', ["header" => "sub-page", "bodyClass" => "without-header-margin"])
@section('content')
@push('header-banner')

<div class="grid-container">
    <div class="page-meta grid-100 tablet-grid-100 mobile-grid-100">

        <div class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="250">

            <!-- Page Title -->
            <h1 class="page-title">About Us</h1>

            <!-- START Breadcrumb Trail -->
            <div class="breadcrumb-trail-container tilt-left">
                <div class="breadcrumb-trail">
                    <span class="trail-start"><a href="{{ route('pages.home') }}">Home</a></span>
                    <span class="trail-end">About Us</span>
                </div>
            </div>
            <!-- END Breadcrumb Trail -->

        </div>

    </div>
</div>

@endpush
<div class="site-content grid-container custom-page">

	<!-- START Main Content -->
	<main role="main">

        <!-- START Post -->
        <div class="wow zoomIn" data-wow-duration="2s" data-wow-offset="250">
            <section id="hungry-about-us" class="section-container">

                <!-- START Section Heading -->
                <div class="wow fadeInDown" data-wow-duration="2s" data-wow-offset="250">
                    <header class="section-heading">
                        <h2 class="section-heading-title">800 Food</h2>
                    </header>
                </div>
                <!-- END Section Heading -->

                <div class="grid-container">

                    <!-- START Section Images -->
                    <div class="grid-50 tablet-grid-100 mobile-grid-100">
                        <div class="wow rotateIn" data-wow-duration="2s" data-wow-offset="250">
                            <div class="about-images">
{{--                                <img class="about-main" src="{{ asset('public/images/demo/about/about-main.jpg') }}" alt="About Main Image" />--}}
                                <img class="about-main" src="{{ $data->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($data->logoFile->id)]) : '' }}" alt="About Inset Image" />
                            </div>
                        </div>
                    </div>
                    <!-- END Section Images -->

                    <!-- START Section Content -->
                    <div class="grid-50 tablet-prefix-10 tablet-grid-80 tablet-suffix-10 mobile-grid-100 tablet-center mobile-center">
                        <div class="wow fadeInRight" data-wow-duration="2s" data-wow-offset="250">
                            {!! $data->description!!}
                        </div>
                    </div>

                </div>

            </section>
        </div>

	</main>
	<!-- END Main Content -->

</div>
@endsection
@push('footer-js')
    <script>

    </script>
@endpush
