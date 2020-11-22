@extends('layouts.main', ["header" => "sub-page", "bodyClass" => "without-header-margin without-curl"])
@section('content')
@push('header-banner')

<div class="grid-container">
    <div class="page-meta grid-100 tablet-grid-100 mobile-grid-100">

        <div class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="250">

            <!-- Page Title -->
            <h1 class="page-title">The Gallery</h1>

            <!-- START Breadcrumb Trail -->
            <div class="breadcrumb-trail-container tilt-left">
                <div class="breadcrumb-trail">
                    <span class="trail-start"><a href="{{ route('pages.home') }}">Home</a></span>
                    <span class="trail-end">The Gallery</span>
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

        <!-- START Section - Gallery -->
        <section id="hungry-gallery" class="section-container">

            <!-- START Main Gallery -->
            <div class="grid-container">
                <div class="grid-100 tablet-grid-100 mobile-grid-100">
                    <div class="hungry-gallery">

                        <div class="hungry-gallery-item wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
                            <a class="image-hover lightbox-gallery" href="{{ asset('public/images/demo/gallery/gallery-01.jpg') }}">
                                <img src="{{ asset('public/images/demo/gallery/gallery-01.jpg') }}" alt="Gallery Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
                        </div>

                        <div class="hungry-gallery-item wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
                            <a class="image-hover lightbox-gallery" href="{{ asset('public/images/demo/gallery/gallery-02.jpg') }}">
                                <img src="{{ asset('public/images/demo/gallery/gallery-02.jpg') }}" alt="Gallery Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
                        </div>

                        <div class="hungry-gallery-item wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
                            <a class="image-hover lightbox-gallery" href="{{ asset('public/images/demo/gallery/gallery-03.jpg') }}">
                                <img src="{{ asset('public/images/demo/gallery/gallery-03.jpg') }}" alt="Gallery Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
                        </div>

                        <div class="hungry-gallery-item wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
                            <a class="image-hover tall lightbox-gallery" href="{{ asset('public/images/demo/gallery/gallery-06.jpg') }}">
                                <img src="{{ asset('public/images/demo/gallery/gallery-06.jpg') }}" alt="Gallery Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
                        </div>

                        <div class="hungry-gallery-item wide wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
                            <a class="image-hover wide lightbox-gallery" href="{{ asset('public/images/demo/gallery/gallery-05.jpg') }}">
                                <img src="{{ asset('public/images/demo/gallery/gallery-05.jpg') }}" alt="Gallery Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
                        </div>

                        <div class="hungry-gallery-item wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
                            <a class="image-hover lightbox-gallery" href="{{ asset('public/images/demo/gallery/gallery-04.jpg') }}">
                                <img src="{{ asset('public/images/demo/gallery/gallery-04.jpg') }}" alt="Gallery Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
                        </div>

                        <div class="hungry-gallery-item wide wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
                            <a class="image-hover lightbox-gallery" href="{{ asset('public/images/demo/gallery/gallery-07.jpg') }}">
                                <img src="{{ asset('public/images/demo/gallery/gallery-07.jpg') }}" alt="Gallery Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
                        </div>

                        <div class="hungry-gallery-item wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
                            <a class="image-hover lightbox-gallery" href="{{ asset('public/images/demo/gallery/gallery-08.jpg') }}">
                                <img src="{{ asset('public/images/demo/gallery/gallery-08.jpg') }}" alt="Gallery Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
                        </div>

                        <div class="hungry-gallery-item wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
                            <a class="image-hover lightbox-gallery" href="{{ asset('public/images/demo/gallery/gallery-09.jpg') }}">
                                <img src="{{ asset('public/images/demo/gallery/gallery-09.jpg') }}" alt="Gallery Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
                        </div>

                        <div class="hungry-gallery-item wide wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
                            <a class="image-hover lightbox-gallery" href="{{ asset('public/images/demo/gallery/gallery-10.jpg') }}">
                                <img src="{{ asset('public/images/demo/gallery/gallery-10.jpg') }}" alt="Gallery Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END Main Gallery -->

        </section>
        <!-- END Section - Gallery -->

	</main>
	<!-- END Main Content -->

</div>
@endsection
@push('footer-js')
    <script>

    </script>
@endpush
