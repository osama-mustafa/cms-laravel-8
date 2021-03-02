@include('include.header')

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">

					{{-- Posts of Each Tag --}}
					<div class="section-row">
                        <div class="section-title">
                            <h2 class="title">
								Search Result: {{ $query }}
							</h2>
						</div>

					<!-- post --> 
					@if ($posts->count() > 0)
						@foreach ($posts as $post)
							<div class="post post-row">
								<a class="post-img" href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->featured }}" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">John Doe</a></li>
										<li>{{ $post->created_at->toFormattedDateString() }}</li>
									</ul>
									<p>{{ implode(' ', array_slice(explode(' ', $post->content),0,15)) }}</p>
								</div>
							</div>
						@endforeach

					@else
						<h4>There is no posts!</h4>
					@endif
					<!-- /post -->

					</div>
					{{-- /Posts of Each Tag --}}

					<div class="section-row loadmore text-center">
						<a href="#" class="primary-button">Load More</a>
					</div>


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
							<img class="img-responsive" src="{{ asset('img/ad-1.jpg') }}" alt="">
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