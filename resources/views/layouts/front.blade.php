@include('include.header')

		<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="page-header-bg" style="background-image: url('{{$post->featured}}');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">{{ $post->title }}</h1>
						<p class="lead">{{ $post->category->name }}</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">

					{{-- Single Post --}}
					<div class="section-row">
						<div class="section-title">
							<h2 class="title">{{ $post->title }}</h2>
						</div>
						<h4>Author: {{ $post->user->name }}</h4>
						<h4>Created: {{ $post->created_at->diffForHumans() }}</h4>
						<p>{!! $post->content !!}</p>

					</div>
					{{-- /Single Post --}}


					{{-- Show Links For Next and Previous Posts --}}
					<div class="section-row">
						<div class="section-title"></div><br>

						@if ($previous)
							<a href="{{ route('post.show', $previous->slug) }}" class="badge badge-secondary">Previous: {{ $previous->title }}</a>	
						@endif

						@if ($next)
							<a href="{{ route('post.show', $next->slug) }}" class="badge badge-secondary">Next: {{ $next->title }}</a>
						@endif
					</div>

					<div class="section-title">
						<h3 class="text-uppercase title">Tags</h3>
					</div>

					<div class="tags-widget">
						@foreach ($post->tags as $tag)
							<p>
								<a class="badge badge-dark" style="background-color: #ee4266" href="{{ route('tag.show', $tag->id) }}">{!! $tag->tag !!}</a>	
							</p>
						@endforeach
					</div>


					@include('include.disqus')

                </div>

				<div class="col-md-4">

					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
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
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->


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