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
							<h2 class="title">Contact Us</h2>
						</div>

                        {{-- Validation For Form --}}
                        @if ($errors->any())
                           <div class="alert alert-danger">
                               <ul>
                                   @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                               </ul>
                           </div>
                        @endif

                        {{-- Success Message When Form is Submitted --}}
                        @if (session('message')) 
                            <div class="alert alert-success">
                                <ul>
                                    <li>
                                        {{ session('message') }}
                                    </li>
                                </ul>
                            </div>
                        @endif

                        <div class="col-md-8">
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf 

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="name">Subject</label>
                                    <input type="text" class="form-control" name="subject" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" autocomplete="off">
                                 </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Send Message</button>
                            </form>    
                        </div>
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