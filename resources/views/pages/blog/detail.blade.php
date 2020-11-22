@extends('layouts.main')
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
                        <span><a href="{{ route('pages.home') }}">Our Blog</a></span>
                        <span class="trail-end">Current Post</span>
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
		<div class="grid-70 suffix-5 tablet-grid-100 mobile-grid-100">

			<!-- START Single Post -->
			<article id="post-id" class="post-container">

				<!-- START Post Header -->
				<header>

					<!-- Post Title -->
					<h2 class="post-title">What makes a Perfect Curry?</h2>

					<!-- Featured Image -->
					<div class="featured-image">
						<a class="image-hover lightbox" href="{{ asset('public/images/demo/blog-featured-images/featured-image-01.jpg') }}" title="The Perfect, Tasty Curry Recipe!">
							<img src="{{ asset('public/images/demo/blog-featured-images/featured-image-01.jpg') }}" alt="Featured Image" />
							<div class="image-hover-overlay">
								<i class="fa fa-search-plus"></i>
							</div>
						</a>
						<div class="post-date-fixed tilt-left">
							<time datetime="2014-11-24">24 Nov, 2014</time>
						</div>
					</div>

					<!-- Post Meta -->
					<div class="post-meta">
						<span class="post-author"><i class="fa fa-user"></i><a href="#">John Doggett</a></span>
						<!-- Uncomment this if you prefer the Date to be here! -->
						<!--<span class="post-date"><i class="fa fa-clock-o"></i><a href="#"><time datetime="2014-11-24">24 Nov, 2014</time></a></span>-->
						<span class="post-categories"><i class="fa fa-folder"></i>
							<a href="#">Indian</a>,
							<a href="#">Recipes</a>
						</span>
						<span class="post-comments"><i class="fa fa-comment"></i><a href="#">4 Comments</a></span>
					</div>
				</header>
				<!-- END Post Header -->

				<!-- START Post Main Content -->
				<div class="post-content">

					<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
					quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
					Aenean commodo ligula eget dolor aenean massa. Cum sociis natoque penatibus et magnis dis parturient
					montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
					Nulla consequat massa quis enim. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.
					Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec
					sodales sagittis magna. Aenean commodo ligula eget dolor aenean massa. Sed ut perspiciatis unde omnis
					iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae
					ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
					voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos
					qui ratione voluptatem sequi nesciunt.</p>
					<h5>The key to this trick, is this...</h5>
					<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
					quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
					Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
					aliquid ex ea commodi consequatur. Nam libero tempore, cum soluta nobis est eligendi optio cumque
					nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est,
					omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
					saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
					<blockquote>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus
					maiores alias consequatur aut perferendis doloribus asperiores repellat!</blockquote>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
					totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
					sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
					quia consequuntur magni dolores eos qui ratione.</p>

				</div>
				<!-- END Post Main Content -->

				<!-- START Post Footer -->
				<footer>
					<div class="post-tags">
						<span class="post-tags-title">Tagged: </span>
						<a href="#">Curry</a>
						<a href="#">Indian</a>
						<a href="#">Cuisine</a>
						<a href="#">Hot</a>
						<a href="#">Spicy</a>
					</div>
				</footer>
				<!-- END Post Footer -->

			</article>
			<!-- END Single Post -->

			<!-- START Post Navigation -->
			<nav class="post-navigation">
				<a href="#" class="previous-post-link"><i class="fa fa-angle-double-left"></i>Previous Post Title</a>
				<a href="#" class="next-post-link">Next Post Title<i class="fa fa-angle-double-right"></i></a>
			</nav>
			<!-- END Post Navigation -->

			<!-- START Comments Area -->
			<div class="comments-area">
				<h2 class="comments-title"><strong>4</strong> Thoughts on <strong>"What Makes the Perfect Curry?"</strong></h2>

				<!-- START Comments List -->
				<ol class="comments-list">

					<!-- START Comment -->
					<li class="comment">
						<img class="comment-author-avatar" src="{{ asset('public/images/demo/comment-avatars/avatar-01.jpg') }}" alt="Author Avatar" />
						<div class="comment-container">
							<header class="comment-meta">
								<h5 class="comment-author-name"><a href="#">Jackson Briggs</a><span class="comment-author-says">Says&hellip;</span></h5>
								<span class="replied-on">Replied on <time datetime="2014-11-27T17:22Z">27 Nov, 2015 at 5:22pm</time></span>
							</header>
							<div class="comment-content">
								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
								sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
								Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.</p>
							</div>
							<footer>
								<a class="comment-reply-link" href="#"><i class="fa fa-reply"></i>Reply</a>
							</footer>
						</div>

						<ol class="children">

							<!-- START Comment -->
							<li class="comment">
								<img class="comment-author-avatar" src="{{ asset('public/images/demo/comment-avatars/avatar-02.jpg') }}" alt="Author Avatar" />
								<div class="comment-container">
									<header class="comment-meta">
										<h5 class="comment-author-name">Shannon McMann<span class="comment-author-says">Says&hellip;</span></h5>
										<span class="replied-on">Replied on <time datetime="2014-11-28T18:34Z">28 Nov, 2015 at 6:34pm</time></span>
									</header>
									<div class="comment-content">
										<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
										sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
									</div>
									<footer>
										<a class="comment-reply-link" href="#"><i class="fa fa-reply"></i>Reply</a>
									</footer>
								</div>

								<ol class="children">

									<!-- START Comment -->
									<li class="comment bypostauthor">
										<img class="comment-author-avatar" src="{{ asset('public/images/demo/comment-avatars/avatar-05.jpg') }}" alt="Author Avatar" />
										<p class="post-author-tag">Post Author</p>
										<div class="comment-container">
											<header class="comment-meta">
												<h5 class="comment-author-name"><a href="#">John Doggett</a><span class="comment-author-says">Says&hellip;</span></h5>
												<span class="replied-on">Replied on <time datetime="2014-11-29T10:22Z">29 Nov, 2015 at 10:22am</time></span>
											</header>
											<div class="comment-content">
												<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
												sed quia non numquam eius modi tempora incidunt ut labore et dolore!</p>
											</div>
											<footer>
												<a class="comment-reply-link" href="#"><i class="fa fa-reply"></i>Reply</a>
											</footer>
										</div>

										<ol class="children">

											<!-- START Comment -->
											<li class="comment">
												<img class="comment-author-avatar" src="{{ asset('public/images/demo/comment-avatars/avatar-03.jpg') }}" alt="Author Avatar" />
												<div class="comment-container">
													<header class="comment-meta">
														<h5 class="comment-author-name"><a href="#">Monica Reyes</a><span class="comment-author-says">Says&hellip;</span></h5>
														<span class="replied-on">Replied on <time datetime="2014-11-28T17:56Z">28 Nov, 2015 at 5:56pm</time></span>
													</header>
													<div class="comment-content">
														<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
														sed quia non numquam eius modi tempora.</p>
													</div>
													<footer>
														<a class="comment-reply-link" href="#"><i class="fa fa-reply"></i>Reply</a>
													</footer>
												</div>

											</li>
											<!-- END Comment -->

										</ol>

									</li>
									<!-- END Comment -->

								</ol>

							</li>
							<!-- END Comment -->

						</ol>

					</li>
					<!-- END Comment -->

					<!-- START Comment -->
					<li class="comment">
						<img class="comment-author-avatar" src="{{ asset('public/images/demo/comment-avatars/avatar-04.jpg') }}" alt="Author Avatar" />
						<div class="comment-container">
							<header class="comment-meta">
								<h5 class="comment-author-name"><a href="#">Barbera Doggett</a><span class="comment-author-says">Says&hellip;</span></h5>
								<span class="replied-on">Replied on <time datetime="2014-11-29T14:21Z">29 Nov, 2015 at 2:31pm</time></span>
							</header>
							<div class="comment-content">
								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
								sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
								Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.</p>
							</div>
							<footer>
								<a class="comment-reply-link" href="#"><i class="fa fa-reply"></i>Reply</a>
							</footer>
						</div>
					</li>
					<!-- END Comment -->

				</ol>
				<!-- END Comments List -->

			 </div>
			 <!-- END Comments Area -->

			 <!-- START Comment Reply Form -->
			 <div class="comment-reply-area">

				<h4 class="comment-reply-title header-divider">Post a Reply</h4>
				<form class="comment-form" action="#" method="get">

					<input type="text" class="comment-form-name" name="name" id="name" value="" placeholder="Your Name*" />
					<input type="email" class="comment-form-email" name="email" id="email" value="" placeholder="Your Email*" />
					<textarea name="message" id="message" rows="12" cols="8" placeholder="Your Comment..."></textarea>
					<input type="submit" name="submit" id="submit" value="Submit Reply!" />

				</form>

			</div>
			<!-- END Comment Reply Form -->

		</div>
	</main>
	<!-- END Main Content -->

	<!-- START Sidebar Content -->
	<div id="secondary" role="complementary">
		<div class="grid-25 tablet-grid-100 mobile-grid-100">

			<!-- Search Widget -->
			<aside class="widget widget_search">
				<form class="search-form" action="#" method="get">
					<input type="search" name="s" id="s" value="" placeholder="Search the Site..." />
					<input type="submit" name="search-submit" id="search-submit" value="&#xf002;" />
				</form>
			</aside>

			<!-- Menu Widget -->
			<aside class="widget widget_categories">
				<h3 class="widget-title">Categories</h3>
				<ul>
					<li><a href="#">Indian Cuisine</a></li>
					<li><a href="#">Seafood</a></li>
					<li><a href="#">Mexican Food</a></li>
					<li><a href="#">Italian Food</a></li>
					<li><a href="#">Chinese Food</a></li>
					<li><a href="#">Rare Delicacies</a></li>
				</ul>
			</aside>

			<!-- Tag Cloud Widget -->
			<aside class="widget widget_tag_cloud">
				<h3 class="widget-title">Search by Tags</h3>
				<div class="tagcloud">
					<a href="#">Techniques</a>
					<a href="#">Recipes</a>
					<a href="#">Cooking</a>
					<a href="#">Desert</a>
					<a href="#">Chickens</a>
					<a href="#">Ingredients</a>
					<a href="#">Delicacy</a>
					<a href="#">Southern</a>
					<a href="#">Mexican</a>
				</div>
			</aside>

			<!-- Popular Recipes Widget -->
			<aside class="widget widget-hungry-latest-recipes">
				<h3 class="widget-title">Popular with Diners</h3>
				<ul class="latest-recipes">
					<li class="recipe">
						<a href="template-recipe-single.html"><img class="recipe-thumbnail" src="{{ asset('public/images/demo/widget-recipe-thumbnails/thumbnail-01.jpg') }}" alt="Thumbnail Image" /></a>
						<h6 class="recipe-title"><a href="template-recipe-single.html">Angus Steak Burger</a></h6>
						<p class="recipe-description">Aenean commodo ligula eget.</p>
					</li>
					<li class="recipe">
						<a href="template-recipe-single.html"><img class="recipe-thumbnail" src="{{ asset('public/images/demo/widget-recipe-thumbnails/thumbnail-02.jpg') }}" alt="Thumbnail Image" /></a>
						<h6 class="recipe-title"><a href="template-recipe-single.html">Mexican Chicken Fajitas</a></h6>
						<p class="recipe-description">Aenean commodo ligula eget.</p>
					</li>
					<li class="recipe">
						<a href="template-recipe-single.html"><img class="recipe-thumbnail" src="{{ asset('public/images/demo/widget-recipe-thumbnails/thumbnail-03.jpg') }}" alt="Thumbnail Image" /></a>
						<h6 class="recipe-title"><a href="template-recipe-single.html">Chocolate Fudge Cake</a></h6>
						<p class="recipe-description">Aenean commodo ligula eget.</p>
					</li>
				</ul>
			</aside>

		</div>
	</div>
	<!-- END Sidebar Content -->

</div>
@endsection
@push('footer-js')
    <script>

    </script>
@endpush
