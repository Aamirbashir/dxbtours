@extends('layouts.main', ["header" => "sub-page", "bodyClass" => "without-header-margin"])
@section('content')
@push('header-banner')

<div class="grid-container">
    <div class="page-meta grid-100 tablet-grid-100 mobile-grid-100">

        <div class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="250">

            <!-- Page Title -->
            <h1 class="page-title">Our Team</h1>

            <!-- START Breadcrumb Trail -->
            <div class="breadcrumb-trail-container tilt-left">
                <div class="breadcrumb-trail">
                    <span class="trail-start"><a href="{{ route('pages.home') }}">Home</a></span>
                    <span class="trail-end">Our Team</span>
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
            <section id="hungry-staff" class="section-container">
                <div class="grid-container">
{{--                    @php--}}
{{--                        $teamArray = [--}}
{{--                            [--}}

{{--                                "name" => "Mr.Omar Bin Eid",--}}
{{--                                "designation" => "Chairman/Principal",--}}
{{--                                "profile_image" => asset('public/images/demo/staff/staff-01.jpg'),--}}
{{--                                "description" => "Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo.Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.Aenean commodo ligula.",--}}
{{--                            ],--}}
{{--                            [--}}
{{--                                "name" => "Joey Mahfouz",--}}
{{--                                "designation" => "Operations Manager",--}}
{{--                                "profile_image" => asset('public/images/demo/staff/staff-02.jpg'),--}}
{{--                                "description" => "Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo.Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.Aenean commodo ligula.",--}}
{{--                            ],--}}
{{--                            [--}}
{{--                                "name" => "Aamir Ali",--}}
{{--                                "designation" => "IT Manager",--}}
{{--                                "profile_image" => asset('public/images/demo/staff/staff-03.jpg'),--}}
{{--                                "description" => "Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo.Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.Aenean commodo ligula.",--}}
{{--                            ],--}}
{{--                        ]--}}
{{--                    @endphp--}}

                    @foreach ($data as $item)
                        <div class="grid-33 tablet-prefix-20 tablet-grid-60 tablet-suffix-20 mobile-grid-100">
                            <div class="wow fadeInLeft" data-wow-duration="2s" data-wow-offset="250">
                                <div class="hungry-staff-member">
                                    <header>
                                        <div class="hungry-staff-member-thumbnail" style="background-image: url('{{ $item['dp'] ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($item['dp']['id'])]) : '' }}')"></div>
                                        <h3 class="hungry-staff-member-title">{{$item["name"]}}</h3>
                                        <h4 class="hungry-staff-member-role">{{$item["designation"]}}</h4>
                                    </header>
                                    <div class="hungry-staff-member-content">
                                        <p>{{$item["intro"]}}</p>
                                    </div>
                                    <footer>
                                        <ul class="hungry-staff-member-social-icons">
                                            @foreach($item['socials'] as $socials)
                                            <li><a href="{{$socials['link']}}" class="team-tooltip" title="{{$socials['title']}}"><i class="{{$socials['icon']}}"></i></a></li>
                                            @endforeach
{{--                                            <li><a href="#" class="team-tooltip" title="Tweet John!"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                            <li><a href="#" class="team-tooltip" title="See John!"><i class="fa fa-instagram"></i></a></li>--}}
                                        </ul>
                                    </footer>
                                </div>
                            </div>
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

    </script>
@endpush
