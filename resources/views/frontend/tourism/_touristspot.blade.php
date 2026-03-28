	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="heading-section mb-5 pb-md-4">Carousel #10</h2> </div>
				<div class="col-md-12">
					<div class="slider-hero">
						<div class="featured-carousel owl-carousel">
							@if(isset($spots))
								@foreach(json_decode($spots->image, true) as $key => $image)
								@if($key == 1)
								<div class="item">
									<div class="work">
										<div class="img d-flex align-items-center justify-content-center" style="background-image: url({{ Voyager::image($image) }});">
											<div class="text text-center">
												<h2>Discover New Places</h2> </div>
										</div>
									</div>
								</div>
									@endif

								@endforeach
							@endif
						</div>
						<div class="my-5 text-center">
							<ul class="thumbnail">
								<li class="active img">
									<a href="#"><img src="images/thumb-1.jpg" alt="Image" class="img-fluid"></a>
								</li>
								<li>
									<a href="#"><img src="images/thumb-2.jpg" alt="Image" class="img-fluid"></a>
								</li>
								<li>
									<a href="#"><img src="images/thumb-3.jpg" alt="Image" class="img-fluid"></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>