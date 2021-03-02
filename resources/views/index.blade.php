@include('include.header')


	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('post.show', $first_post->slug) }}"><img src="{{ $first_post->featured }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ route('category.show', $first_post->category->id) }}">{{ $first_post->category->name }}</a>
							</div>
							<h3 class="post-title title-lg"><a href="{{ route('post.show', $first_post->slug) }}">{{ $first_post->title }}</a></h3>
							<ul class="post-meta">
								<li><a href="#">{{ $first_post->user->name }}</a></li>
								<li>{{ $first_post->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('post.show', $second_post->slug) }}"><img src="{{ $second_post->featured }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ route('category.show', $second_post->category->id) }}">{{ $second_post->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('post.show', $second_post->slug) }}">{{ $second_post->title }}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{ $second_post->user->name }}</a></li>
								<li>{{ $second_post->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('post.show', $third_post->slug) }}"><img src="{{ $third_post->featured }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ route('category.show', $third_post->category->id) }}">{{ $third_post->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('post.show', $third_post->slug) }}">{{ $third_post->title }}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{ $third_post->user->name }}</a></li>
								<li>{{ $third_post->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">{{ $first_category->name }}</h2>
							</div>
						</div>
						<!-- post -->
						@foreach ($first_category->posts()->orderBy('created_at', 'DESC')->take(4)->get() as $post)
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img" href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->featured }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="{{ route('category.show', $first_category->id) }}">{{ $post->category->name }}</a>
									</div>
									<h3 class="post-title title-sm"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{ $post->user->name }}</a></li>
										<li>{{ $post->created_at->diffForHumans() }}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->

					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">{{ $second_category->name }}</h2>
							</div>
						</div>
						<!-- post -->
						@foreach ($second_category->posts()->orderBy('created_at', 'DESC')->take(3)->get() as $post)
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img" href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->featured }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="{{ route('category.show', $second_category->id) }}">{{ $post->category->name }}</a>
									</div>
									<h3 class="post-title title-sm"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{ $post->user->name }}</a></li>
										<li>{{ $post->created_at->diffForHumans() }}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">{{ $third_category->name }}</h2>
							</div>
						</div>
						<!-- post -->
						@foreach ($third_category->posts()->orderBy('created_at', 'DESC')->take(3)->get() as $post)
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img" href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->featured }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="{{ route('category.show', $third_category->id) }}">{{ $post->category->name }}</a>
									</div>
									<h3 class="post-title title-sm"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{ $post->user->name }}</a></li>
										<li>{{ $post->created_at->diffForHumans() }}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->
					</div>
					<!-- /row -->
				</div>
				<div class="col-md-4">
					<!-- ad widget-->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="{{ asset('./img/ad-3.jpg') }}" alt="">
						</a>
					</div>
					<!-- /ad widget -->

					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Follow Us</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="#" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->


					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
							<form>
								<p>Add Your Email and Be Updated With Our New Content</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->

					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Popular Posts</h2>
						</div>

						<!-- post -->
						@foreach ($posts as $post)
							<div class="post post-widget">
								<a class="post-img" href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->featured }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->name }}</a>
									</div>
									<h3 class="post-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
								</div>
							</div>
						@endforeach
						<!-- /post -->
					</div>
					<!-- /post widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->


	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">

					<!-- post -->
					@foreach ($all_posts as $post)
					<div class="post post-row">
						<a class="post-img" href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->featured }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{ $post->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{ $post->user->name }}</a></li>
								<li>{{ $post->created_at->diffForHumans() }}</li>
							</ul>
							<p> {{ implode(' ', array_slice(explode(' ', $post->content),0,15)) }} </p>
						</div>
					</div>
					@endforeach
					<!-- /post -->
                      
					<div>
						{{ $all_posts->links() }}
					</div>
                                  
				</div>
				<div class="col-md-4">

					<!-- Ad widget -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-1.jpg" alt="">
						</a>
					</div>
					<!-- /Ad widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	@include('include.footer')

	<!-- jQuery Plugins -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>