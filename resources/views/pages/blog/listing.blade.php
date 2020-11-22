@extends('layouts.main', ["header" => "sub-page", "bodyClass" => "blog-overview"])
@section('content')
@push('header-banner')

<div class="grid-container">
    <div class="page-meta grid-100 tablet-grid-100 mobile-grid-100">

        <div class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="250">

            <!-- Page Title -->
            <h1 class="page-title">Our Blog</h1>

            <!-- START Breadcrumb Trail -->
            <div class="breadcrumb-trail-container tilt-left">
                <div class="breadcrumb-trail">
                    <span class="trail-start"><a href="{{ route('pages.home') }}">Home</a></span>
                    <span class="trail-end">Our Blog</span>
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

		<!-- START Left Column -->
		<div class="grid-33 tablet-grid-33 mobile-grid-100">

			<!-- START Post -->
			<div class="wow zoomIn" data-wow-duration="2s" data-wow-offset="250">
				<article class="post-container">
					<header>
						<h2 class="post-title">
							<a href="{{ route('pages.blog.detail') }}">What makes a Perfect Curry?</a>
						</h2>
						<div class="featured-image">
							<a class="image-hover" href="{{ route('pages.blog.detail') }}">
								<img src="images/demo/blog-featured-images/featured-image-01.jpg" alt="Featured Image" />
								<div class="image-hover-overlay">
									<i class="fa fa-link"></i>
								</div>
							</a>
							<div class="post-date-fixed tilt-left">
								<time datetime="2014-11-24">24 Nov, 2014</time>
							</div>
						</div>

						<div class="post-meta">
							<span class="post-author"><i class="fa fa-user"></i><a href="#">John Doggett</a></span>
							<span class="post-categories"><i class="fa fa-folder"></i>
								<a href="#">Indian</a>,
								<a href="#">Recipes</a>
							</span>
						</div>
					</header>

					<div class="post-content">
						<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
						quia non numquam eius modi tempora incidunt ut labore
						<a href="{{ route('pages.blog.detail') }}">&hellip;view the rest</a></p>
					</div>
				</article>
			</div>
			<!-- END Post -->

			<!-- START Post -->
			<div class="wow zoomIn" data-wow-duration="2s" data-wow-offset="250">
				<article class="post-container">
					<header>
						<h2 class="post-title">
							<a href="{{ route('pages.blog.detail') }}">The Right Cooking Space</a>
						</h2>
						<div class="featured-image">
							<a class="image-hover" href="{{ route('pages.blog.detail') }}">
								<img src="images/demo/blog-featured-images/featured-image-03.jpg" alt="Featured Image" />
								<div class="image-hover-overlay">
									<i class="fa fa-link"></i>
								</div>
							</a>
							<div class="post-date-fixed tilt-left">
								<time datetime="2014-11-20">20 Nov, 2014</time>
							</div>
						</div>

						<div class="post-meta">
							<span class="post-author"><i class="fa fa-user"></i><a href="#">M. F. Luder</a></span>
							<span class="post-categories"><i class="fa fa-folder"></i>
								<a href="#">Workspaces</a>
							</span>
						</div>
					</header>

					<div class="post-content">
						<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
						quia non numquam eius modi tempora incidunt ut labore
						<a href="{{ route('pages.blog.detail') }}">&hellip;view the rest</a></p>
					</div>
				</article>
			</div>
			<!-- END Post -->

		</div>
		<!-- END Left Column -->

		<!-- START Middle Column -->
		<div class="grid-33 tablet-grid-33 mobile-grid-100">

			<!-- START Post -->
			<div class="wow zoomIn" data-wow-duration="2s" data-wow-offset="250">
				<article class="post-container">
					<header>
						<h2 class="post-title">
							<a href="{{ route('pages.blog.detail') }}">Make a Better Salad</a>
						</h2>
						<div class="featured-image">
							<a class="image-hover" href="{{ route('pages.blog.detail') }}">
								<img src="images/demo/blog-featured-images/featured-image-04.jpg" alt="Featured Image" />
								<div class="image-hover-overlay">
									<i class="fa fa-link"></i>
								</div>
							</a>
							<div class="post-date-fixed tilt-left">
								<time datetime="2014-10-31">31 Oct, 2014</time>
							</div>
						</div>

						<div class="post-meta">
							<span class="post-author"><i class="fa fa-user"></i><a href="#">Link Zelda</a></span>
							<span class="post-categories"><i class="fa fa-folder"></i>
								<a href="#">Salad</a>,
								<a href="#">Prep</a>
							</span>
						</div>
					</header>

					<div class="post-content">
						<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
						quia non numquam eius modi tempora incidunt ut labore
						<a href="{{ route('pages.blog.detail') }}">&hellip;view the rest</a></p>
					</div>
				</article>
			</div>
			<!-- END Post -->

			<!-- START Post -->
			<div class="wow zoomIn" data-wow-duration="2s" data-wow-offset="250">
				<article class="post-container">
					<header>
						<h2 class="post-title">
							<a href="{{ route('pages.blog.detail') }}">Get Better Tips!</a>
						</h2>
						<div class="featured-image">
							<a class="image-hover" href="{{ route('pages.blog.detail') }}">
								<img src="images/demo/blog-featured-images/featured-image-02.jpg" alt="Featured Image" />
								<div class="image-hover-overlay">
									<i class="fa fa-link"></i>
								</div>
							</a>
							<div class="post-date-fixed tilt-left">
								<time datetime="2014-10-15">15 Oct, 2014</time>
							</div>
						</div>

						<div class="post-meta">
							<span class="post-author"><i class="fa fa-user"></i><a href="#">James LaBrie</a></span>
							<span class="post-categories"><i class="fa fa-folder"></i>
								<a href="#">Community</a>
							</span>
						</div>
					</header>

					<div class="post-content">
						<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
						quia non numquam eius modi tempora incidunt ut labore
						<a href="{{ route('pages.blog.detail') }}">&hellip;view the rest</a></p>
					</div>
				</article>
			</div>
			<!-- END Post -->

		</div>
		<!-- END Middle Column -->

		<!-- START Right Column -->
		<div class="grid-33 tablet-grid-33 mobile-grid-100">

			<!-- START Post -->
			<div class="wow zoomIn" data-wow-duration="2s" data-wow-offset="250">
				<article class="post-container">
					<header>
						<h2 class="post-title">
							<a href="{{ route('pages.blog.detail') }}">Baking is Fun :)</a>
						</h2>
						<div class="featured-image">
							<a class="image-hover" href="{{ route('pages.blog.detail') }}">
								<img src="images/demo/blog-featured-images/featured-image-05.jpg" alt="Featured Image" />
								<div class="image-hover-overlay">
									<i class="fa fa-link"></i>
								</div>
							</a>
							<div class="post-date-fixed tilt-left">
								<time datetime="2014-10-12">12 Oct, 2014</time>
							</div>
						</div>

						<div class="post-meta">
							<span class="post-author"><i class="fa fa-user"></i><a href="#">Jeff Spender</a></span>
							<span class="post-categories"><i class="fa fa-folder"></i>
								<a href="#">Baking</a>,
								<a href="#">Ingredients</a>
							</span>
						</div>
					</header>

					<div class="post-content">
						<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
						quia non numquam eius modi tempora incidunt ut labore
						<a href="{{ route('pages.blog.detail') }}">&hellip;view the rest</a></p>
					</div>
				</article>
			</div>
			<!-- END Post -->

			<!-- START Post -->
			<div class="wow zoomIn" data-wow-duration="2s" data-wow-offset="250">
				<article class="post-container">
					<header>
						<h2 class="post-title">
							<a href="{{ route('pages.blog.detail') }}">No Featured Image Here&hellip;</a>
						</h2>
						<div class="post-date-fixed tilt-left">
							<time datetime="2014-09-23">23 Sep, 2014</time>
						</div>

						<div class="post-meta">
							<span class="post-author"><i class="fa fa-user"></i><a href="#">T.J. Combo</a></span>
							<span class="post-categories"><i class="fa fa-folder"></i>
								<a href="#">No Categories</a>
							</span>
						</div>
					</header>

					<div class="post-content">
						<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
						quia non numquam eius modi tempora incidunt ut labore
						<a href="{{ route('pages.blog.detail') }}">&hellip;view the rest</a></p>
					</div>
				</article>
			</div>
			<!-- END Post -->

		</div>
		<!-- END Right Column -->

		<div class="grid-100 tablet-grid-100 mobile-grid-100">

			<!-- START Posts Navigation -->
			<nav class="post-navigation">
				<a href="#" class="previous-post-link"><i class="fa fa-angle-double-left"></i>Newer Posts</a>
				<a href="#" class="next-post-link">Older Posts<i class="fa fa-angle-double-right"></i></a>
			</nav>
			<!-- END Posts Navigation -->

		</div>
	</main>
	<!-- END Main Content -->

</div>
@endsection
@push('footer-js')
    <script>

    </script>
@endpush
