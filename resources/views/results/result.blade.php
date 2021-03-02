@include('include.header')
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="section-row">
					<div class="section-title">
						<h2 class="title">
							Search Results
						</h2>
					</div>
			<div class="col-md-8">

					@if ($posts->count() > 0)
					@foreach ($posts as $post)
					 
					<!-- post -->
					<div class="post post-row">
						<a class="post-img" href="{{route('post.show', ['slug' => $post->slug])}}"><img src="{{$post->featured}}" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="{{route('post.show', ['slug' => $post->slug])}}">{{$post->title}}</a></h3>
							<ul class="post-meta">
								<li>{{ $post->created_at }}</li>
							</ul>
							<p>{{ implode(' ', array_slice(explode(' ', $post->content),0,15)) }}</p>
						</div>
					</div>
					<!-- /post -->
                	@endforeach
				 
					@else
						

					<!-- post -->
					<div class="post post-row">
 						<div class="post-body">
							<h1>  No results found !!!  </h1>
 						</div>
					</div>
					<!-- /post -->
					
					@endif
									 				
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

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
								@foreach ($categories as $category)
									<li><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}<span>{{ $category->count() }}</span></a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<!-- /category widget -->

					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
							<form>
								<p>Add Your Email and Be Updated With New Content :)</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->
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
