@include('include.header')

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">

					<div class="section-row">
                        <div class="section-title">
							<h2 class="title">CMS Blog</h2>
						</div>

                        CMS Blog Created By: Osama Mustafa from <a class="link-primary" href="https://www.youtube.com/playlist?list=PLMYF6NkLrdN_oaGr07xGfHH86meD3By70" target="_blank">CMS Laravel Coure</a> in YouTube from Mohammed Essa Channel
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