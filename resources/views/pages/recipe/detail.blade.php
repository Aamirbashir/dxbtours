@extends('layouts.main', ["header" => "sub-page"])
@section('content')
@push('header-banner')

<div class="grid-container">
    <div class="page-meta grid-100 tablet-grid-100 mobile-grid-100">

        <div class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="250">

            <!-- Page Title -->
            <h1 class="page-title">Our Recipes</h1>

            <!-- START Breadcrumb Trail -->
            <div class="breadcrumb-trail-container tilt-left">
                <div class="breadcrumb-trail">
                    <span class="trail-start"><a href="{{ route('pages.home') }}">Home</a></span>
                    <span><a href="{{ route('pages.blog.index') }}">Our Recipes</a></span>
                    <span class="trail-end">Chicken Tikka Masala</span>
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

		<!-- START Recipe Single Entry -->
		<article class="recipe-single">

			<div class="grid-35 suffix-5 tablet-grid-100 mobile-grid-100">

				<!-- Recipe Featured Image -->
				<div class="recipe-featured-image">
					<a class="image-hover lightbox" href="{{ asset('public/images/demo/recipes/recipe-thumbnail-01.jpg') }}" title="The Perfect, Tasty Curry Recipe!">
						<img src="{{ asset('public/images/demo/recipes/recipe-thumbnail-01.jpg') }}" alt="Recipe Thumbnail" />
						<div class="image-hover-overlay">
							<i class="fa fa-search-plus"></i>
						</div>
					</a>
				</div>

				<!-- Recipe Meta -->
				<div class="recipe-meta">

					<!-- Recipe Price -->
					<div class="recipe-price">
						<div class="grid-30 tablet-grid-50 mobile-grid-40 recipe-meta-left">Price:</div>
						<div class="grid-70 tablet-grid-50 mobile-grid-60 recipe-meta-right">$16.95</div>
					</div>

					<!-- Recipe Menu (Taxonomy) -->
					<div class="recipe-menu">
						<div class="grid-30 tablet-grid-50 mobile-grid-40 recipe-meta-left">Menu:</div>
						<div class="grid-70 tablet-grid-50 mobile-grid-60 recipe-meta-right">
							<a href="#">Main Dishes</a>,
							<a href="#">Indian Cuisine</a>
						</div>
					</div>

					<!-- Recipe Categories -->
					<div class="recipe-categories">
						<div class="grid-30 tablet-grid-50 mobile-grid-40 recipe-meta-left">Categories:</div>
						<div class="grid-70 tablet-grid-50 mobile-grid-60 recipe-meta-right">
							<a href="#">Indian Dishes</a>,
							<a href="#">Curries</a>
						</div>
					</div>

					<!-- Recipe Tags -->
					<div class="recipe-tags">
						<div class="grid-30 tablet-grid-50 mobile-grid-40 recipe-meta-left">Tags:</div>
						<div class="grid-70 tablet-grid-50 mobile-grid-60 recipe-meta-right">
							<a href="#">Indian</a>,
							<a href="#">Curry</a>,
							<a href="#">Cuisine</a>,
							<a href="#">Tasty</a>
						</div>
					</div>

					<br class="clear" />
				</div>
			</div>

			<!-- Recipe Content -->
			<div class="grid-60 tablet-grid-100 mobile-grid-100">
				<div class="recipe-content">
					<h2 class="recipe-title header-divider">Chicken Tikka Masala</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
					Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
					<h5 class="header-divider">Ingredients</h5>
					<div class="grid-45 suffix-10 tablet-grid-45 tablet-suffix-10 mobile-grid-100 grid-parent no-margin-mobile">
						<ul class="fa-ul no-margin-mobile">
							<li><i class="fa-li fa fa-pagelines"></i><strong>4</strong> <abbr title="Table Spoons">tbsp</abbr> Vegetable Oil</li>
							<li><i class="fa-li fa fa-pagelines"></i><strong>25g</strong> Butter</li>
							<li><i class="fa-li fa fa-pagelines"></i><strong>4</strong> Onions, roughly chopped</li>
						</ul>
					</div>
					<div class="grid-45 tablet-grid-45 mobile-grid-100 grid-parent">
						<ul class="fa-ul">
							<li><i class="fa-li fa fa-pagelines"></i><strong>6</strong> <abbr title="Table Spoons">tbsp</abbr> Chicken Tikka Masala Paste</li>
							<li><i class="fa-li fa fa-pagelines"></i><strong>2</strong> Red peppers, deseeded</li>
							<li><i class="fa-li fa fa-pagelines"></i><strong>8</strong> Chicken breasts, cut into <strong>2cm</strong> cubes</li>
						</ul>
					</div>
					<h5 class="header-divider">Method</h5>
					<div class="grid-45 suffix-10 tablet-grid-45 tablet-suffix-10 mobile-grid-100 grid-parent no-margin-mobile">
						<p><span class="hungry-dropcap">1.</span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
						totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
						sunt explicabo.</p>
					</div>
					<div class="grid-45 tablet-grid-45 mobile-grid-100 grid-parent no-margin-mobile">
						<p><span class="hungry-dropcap">2.</span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
						totam rem aperiam, eaque ipsa.</p>
					</div>
					<br class="clear" />
					<div class="grid-45 suffix-10 tablet-grid-45 tablet-suffix-10 mobile-grid-100 grid-parent no-margin-mobile">
						<p><span class="hungry-dropcap">3.</span>Voluptatem accusantium doloremque laudantium,
						totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
						sunt explicabo.</p>
					</div>
					<div class="grid-45 tablet-grid-45 mobile-grid-100 grid-parent no-margin-mobile">
						<p><span class="hungry-dropcap">4.</span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
						totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
					</div>
				</div>
			</div>

			<br class="clear" />
		</article>
		<!-- END Recipe Single Entry -->

		<!-- START Post Navigation -->
		<div class="grid-100 tablet-grid-100 mobile-grid-100">
			<nav class="post-navigation">
				<a href="#" class="previous-post-link"><i class="fa fa-angle-double-left"></i>Previous Recipe</a>
				<a href="#" class="next-post-link">Next Recipe<i class="fa fa-angle-double-right"></i></a>
			</nav>
		</div>
		<!-- END Post Navigation -->

	</main>
	<!-- END Main Content -->

</div>
@endsection
@push('footer-js')
    <script>

    </script>
@endpush
