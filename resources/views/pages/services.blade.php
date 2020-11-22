@extends('layouts.main', ["header" => "sub-page", "bodyClass" => "without-header-margin"])
@section('content')
@push('header-banner')

<div class="grid-container">
    <div class="page-meta grid-100 tablet-grid-100 mobile-grid-100">

        <div class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="250">

            <!-- Page Title -->
            <h1 class="page-title">Our Services</h1>

            <!-- START Breadcrumb Trail -->
            <div class="breadcrumb-trail-container tilt-left">
                <div class="breadcrumb-trail">
                    <span class="trail-start"><a href="{{ route('pages.home') }}">Home</a></span>
                    <span class="trail-end">Our Services</span>
                </div>
            </div>
            <!-- END Breadcrumb Trail -->

        </div>

    </div>
</div>

@endpush
<div class="site-content custom-page service-page">

	<!-- START Main Content -->
	<main role="main">
        <!-- START Post -->
        <div class="wow zoomIn" data-wow-duration="2s" data-wow-offset="250">
            <section id="hungry-menu" class="section-container">
                <div class="hungry-menu wow zoomIn animated" data-wow-duration="2s" data-wow-offset="250" style="visibility: visible; animation-duration: 2s; animation-name: zoomIn;">
                    @foreach($services as $key => $service)
                        <div class="grid-container">
                            <ol class="hungry-menu-list">
                                <li class="hungry-menu-item {{ $key % 2 != 0 ? 'flex-reverse' : ''}}">
                                    <a href="{{ $service->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($service->logoFile->id)]) : 'https://via.placeholder.com/150' }}" class="lightbox hungry-thumbnail-link cboxElement">
                                        <div class="hungry-menu-item-thumbnail" style="background-image: url('{{ $service->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($service->logoFile->id)]) : 'https://via.placeholder.com/150' }}')">
                                            <div class="hungry-thumbnail-overlay">
                                                <i class="fa fa-search-plus"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="hungry-menu-item-container">
                                        <a href="" class="hungry-menu-item-header">
                                            <h3 class="hungry-menu-item-title">{{$service->title}}</h3>
                                        </a>
                                        <div class="hungry-menu-item-excerpt">
                                            <p>{{$service->short_description}}</p>
                                            <a href="" class="hungry-button read-more-btn" style="margin: 20px 0 0" data-href="collapse{{$key}}">Read More</a>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div class="service-detail" data-section="collapse{{$key}}">
                            <p>
                                {!!  $service->long_description !!}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

	</main>
	<!-- END Main Content -->

</div>
@endsection
@push('footer-js')
    <script>
        $("body").on("click", ".read-more-btn", function(e){
            e.preventDefault();
            $dataTab = $(this).attr('data-href');
            $this = $(this);
            if($(this).text() == "Read More"){
                $('.service-detail[data-section="'+$dataTab+'"]').slideDown(function() {
                    $this.text('Read Less');
                });
            }else{
                $('.service-detail[data-section="'+$dataTab+'"]').slideUp();
                $this.text('Read More');
            }
        });
    </script>
@endpush
