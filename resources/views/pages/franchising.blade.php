@extends('layouts.main')
@section('content')
    @push('header-banner')
        <div class="grid-container">
            <div class="page-meta grid-100 tablet-grid-100 mobile-grid-100">

                <div class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="250">

                    <!-- Page Title -->
                    <h1 class="page-title">Franchising</h1>

                    <!-- START Breadcrumb Trail -->
                    <div class="breadcrumb-trail-container tilt-left">
                        <div class="breadcrumb-trail">
                            <span class="trail-start"><a href="{{ route('pages.home') }}">Home</a></span>
                            <span class="trail-end">Franchising</span>
                        </div>
                    </div>
                    <!-- END Breadcrumb Trail -->

                </div>

            </div>
        </div>
    @endpush
    <div class="site-content grid-container">

        <!-- START Main Content -->
        <main role="main">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">

                <!-- START Single Post -->
                <article id="post-id" class="post-container">

                    <!-- START Post Header -->
                    <header>

                        <!-- Post Title -->
                        <h2 class="post-title">Franchising</h2>

                        <!-- Featured Image -->
                        <div class="featured-image">
                            <a class="image-hover lightbox" href="{{ asset('public/images/demo/blog-featured-images/featured-image-01.jpg') }}" title="The Perfect, Tasty Curry Recipe!">
                                <img src="{{ asset('public/images/demo/blog-featured-images/featured-image-01.jpg') }}" alt="Featured Image" />
                                <div class="image-hover-overlay">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </a>
{{--                            <div class="post-date-fixed tilt-left">--}}
{{--                                <time datetime="2014-11-24">24 Nov, 2014</time>--}}
{{--                            </div>--}}
                        </div>

                        <!-- Post Meta -->
{{--                        <div class="post-meta">--}}
{{--                            <span class="post-author"><i class="fa fa-user"></i><a href="#">John Doggett</a></span>--}}
{{--                            <!-- Uncomment this if you prefer the Date to be here! -->--}}
{{--                            <!--<span class="post-date"><i class="fa fa-clock-o"></i><a href="#"><time datetime="2014-11-24">24 Nov, 2014</time></a></span>-->--}}
{{--                            <span class="post-categories"><i class="fa fa-folder"></i>--}}
{{--							<a href="#">Indian</a>,--}}
{{--							<a href="#">Recipes</a>--}}
{{--						</span>--}}
{{--                            <span class="post-comments"><i class="fa fa-comment"></i><a href="#">4 Comments</a></span>--}}
{{--                        </div>--}}
                    </header>
                    <!-- END Post Header -->

                    <!-- START Post Main Content -->
                    <div class="post-content">

                        <p>Are you passionate about owning your own business? Are you interested in giving people the choice to eat healthy?</p>
                        <h5>The key to this trick, is this...</h5>
                        <p>Are you passionate about owning your own business? Are you interested in giving people the choice to eat healthy? If the answer is yes, then you have found the right partner to build you a successful healthy vending business. At 800food we share your passion and want you to join us to give the choice to eat healthy for everyone.</p>

                    </div>
                    <!-- END Post Main Content -->

                    <!-- START Post Footer -->
{{--                    <footer>--}}
{{--                        <div class="post-tags">--}}
{{--                            <span class="post-tags-title">Tagged: </span>--}}
{{--                            <a href="#">Curry</a>--}}
{{--                            <a href="#">Indian</a>--}}
{{--                            <a href="#">Cuisine</a>--}}
{{--                            <a href="#">Hot</a>--}}
{{--                            <a href="#">Spicy</a>--}}
{{--                        </div>--}}
{{--                    </footer>--}}
                    <!-- END Post Footer -->

                </article>
                <!-- END Single Post -->

                <!-- START Comment Reply Form -->
                <div class="grid-container">
                    <div class="prefix-10 grid-80 suffix-10 tablet-grid-100 mobile-grid-100">

                        <!-- START Reservation Form -->
                        <form id="hungry-reservation-form" action="" method="post">
                            <fieldset>

                                <legend class="form-title">Get In Touch<span>Please fill out all required<em>*</em> fields. Thanks!</span></legend>

                                <div class="grid-50 tablet-grid-50 mobile-grid-100">

                                    <!-- Name Field -->
                                    <p>
                                        <label for="res_name">Name <span>*</span></label>
                                        <input type="text" name="res_name" id="res_name" value="" required>
                                    </p>

                                    <!-- Email Field -->
                                    <p>
                                        <label for="res_email">Your Email Address<span>*</span></label>
                                        <input type="email" name="res_email" id="res_email" value="" required>
                                    </p>

                                    <!-- Phone Number Field -->
                                    <p>
                                        <label for="res_phone">Your Contact Number<span>*</span></label>
                                        <input type="tel" name="res_phone" id="res_phone" value="" required>
                                    </p>

                                    <!-- Amount in Party Field -->

                                </div>

                                <div class="grid-50 tablet-grid-50 mobile-grid-100">
                                    <label for="res_amount">Restaurant<span>*</span></label>
                                    <select name="res_amount" id="res_amount" required>
                                        <option value="" selected disabled>Please Choose...</option>
                                        @foreach($brands as $key => $value)
                                            <option value="{{$value->name}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>

                                    <!-- Date Field -->
                                    <!-- <p>
                                        <label for="res_date">Date of Booking<span>*</span></label>
                                        <input type="date" name="res_date" id="res_date" value="" required>
                                    </p> -->

                                    <!-- Time Field -->
                                    <!-- <p>
                                        <label for="res_time">Time of Booking<span>*</span></label>
                                        <select name="res_time" id="res_time" required>
                                            <option value="" selected>Please Choose...</option>
                                            <optgroup label="Afternoon Reservations">
                                                <option value="12pm">12pm</option>
                                                <option value="12:30pm">12:30pm</option>
                                                <option value="1pm">1pm</option>
                                                <option value="1:30pm">1:30pm</option>
                                            </optgroup>
                                            <optgroup label="Evening Reservations">
                                                <option value="6pm">6pm</option>
                                                <option value="6:30pm">6:30pm</option>
                                                <option value="7pm">7pm</option>
                                                <option value="7:30pm">7:30pm</option>
                                                <option value="8pm">8pm</option>
                                                <option value="8:30pm">8:30pm</option>
                                                <option value="9pm">9pm</option>
                                            </optgroup>
                                        </select>
                                    </p>
 -->
                                    <!-- Message Field -->
                                    <label for="res_email">Your Message</label>
                                    <textarea name="res_message" id="res_message" cols="8" rows="12"></textarea>

                                </div>

                                <div class="grid-100 tablet-grid-100 mobile-grid-100">

                                    <!-- Form Submit -->
                                    <input type="submit" name="res-submit" id="res-submit" value="Send Message" />
                                </div>

                            </fieldset>
                        </form>
                        <!-- END Reservation Form -->

                        <!-- Form outcome contents. Generated through Ajax -->
                        <div id="hungry-reservation-form-outcome"></div>

                    </div>
                </div>
                <!-- END Comment Reply Form -->

            </div>
        </main>
        <!-- END Main Content -->
    </div>
@endsection
@push('footer-js')
    <script>

    </script>
@endpush
