@extends('website.shared.index')


@section('title', $title)


@section('content')




	<!-- =========================== Breadcrumbs =================================== -->
    <div class="breadcrumbs_wrap dark">
				<div class="container">
					<div class="row align-items-center">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="text-center">
								<h2 class="breadcrumbs_title">{{$title}}</h2>
								<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="ti-home"></i></a></li>
									<li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
								  </ol>
								</nav>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- =========================== Breadcrumbs =================================== -->
			


			<!-- =========================== latest insight Start =================================== -->
			<section class="jubita-forbes-wrapper">
				<div class="container">

				
					<div class="jubita-forbes-cards rounded-section p-4">
						<div class="row">

						
							<!-- CENTER COLUMN FEATURE -->
							<div class="col-lg-8 col-md-12">
								<h5 class="forbes-cat-title">Lifestyle</h5>

								<div class="forbes-feature-card">
									<img src="{{ asset('assets/img/tz.jpg') }}" alt="Lifestyle" class="img-fluid rounded">
									<h3><a href="#">How Urban Living Is Changing Modern Tanzanian Culture</a></h3>
									<p class="author">By Jubita Lifestyle Editor</p>
									<a href="#" class="btn btn-theme btn-sm mt-2">Read More</a>
								</div>
							</div>

							<!-- RIGHT COLUMN -->
							<div class="col-lg-4 col-md-6">
								<h5 class="forbes-cat-title">Business</h5>

								<ul class="forbes-list-card">
									<li>
										<div class="row align-items-center">
											<div class="col-4">
												<a href="#"><img src="https://via.placeholder.com/80x80" alt="Startups" class="img-fluid rounded"></a>
											</div>
											<div class="col-8">
												<span class="mini-cat">Startups</span>
												<h6><a href="#">Tech Startups Raising Capital</a></h6>
												<small>By B. Kweka</small>
											</div>
										</div>
									</li>
									<li>
										<div class="row align-items-center">
											<div class="col-4">
												<a href="#"><img src="https://via.placeholder.com/80x80" alt="Markets" class="img-fluid rounded"></a>
											</div>
											<div class="col-8">
												<span class="mini-cat">Markets</span>
												<h6><a href="#">Stock Market Shows Positive Signs</a></h6>
												<small>By Jubita Finance</small>
											</div>
										</div>
									</li>
									<li>
										<div class="row align-items-center">
											<div class="col-4">
												<a href="#"><img src="https://via.placeholder.com/80x80" alt="Energy" class="img-fluid rounded"></a>
											</div>
											<div class="col-8">
												<span class="mini-cat">Energy</span>
												<h6><a href="#">Renewable Energy Projects Expand</a></h6>
												<small>By Energy Desk</small>
											</div>
										</div>
									</li>
									<li>
										<div class="row align-items-center">
											<div class="col-4">
												<a href="#"><img src="https://via.placeholder.com/80x80" alt="Trade" class="img-fluid rounded"></a>
											</div>
											<div class="col-8">
												<span class="mini-cat">Trade</span>
												<h6><a href="#">Regional Trade Agreements Explained</a></h6>
												<small>By Editorial Team</small>
											</div>
										</div>
									</li>
								</ul>
							</div>

						</div>
					</div>

				</div>
			</section>
			
	
			<!-- ======================== Business/Sell/Buy Start ==================== -->
			<section class="">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="sec-heading-flex pl-2 pr-2">
								<div class="sec-heading-flex-one">
									<h2>Get more from {{$title}}</h2>
								</div>
								<div class="sec-heading-flex-last">
									<a href="#" class="btn btn-theme">View More<i class="ti-arrow-right ml-2"></i></a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="owl-carousel products-slider owl-theme">
							
								<!-- Single Item -->
								<div class="item">
									<div class="woo_product_grid">
										<span class="woo_pr_tag hot">Hot</span>
										<div class="woo_product_thumb">
											<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" />
										</div>
										<div class="woo_product_caption center">
											
											<div class="woo_title">
												<h4 class="woo_pro_title"><a href="detail-1.html">Accumsan Tree Fusce</a></h4>
											</div>
											
										</div>								
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_product_grid">
										<div class="woo_product_thumb">
											<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" />
										</div>
										<div class="woo_product_caption center">
											<div class="woo_rate">
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="woo_title">
												<h4 class="woo_pro_title"><a href="detail-1.html">Accumsan Tree Fusce</a></h4>
											</div>
											<div class="woo_price">
												<h6>$72.47<span class="less_price">$112.10</span></h6>
											</div>
										</div>
										<div class="woo_product_cart hover">
											<ul>
												<li><a href="javascript:void(0);" data-toggle="modal" data-target="#viewproduct-over" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
												<li><a href="add-to-cart.html" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
												<li><a href="wishlist.html" class="woo_cart_btn btn_save"><i class="ti-heart"></i></a></li>
											</ul>
										</div>								
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_product_grid">
										<span class="woo_pr_tag new">New</span>
										<div class="woo_product_thumb">
											<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" />
										</div>
										<div class="woo_product_caption center">
											<div class="woo_rate">
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="woo_title">
												<h4 class="woo_pro_title"><a href="detail-1.html">Accumsan Tree Fusce</a></h4>
											</div>
											<div class="woo_price">
												<h6>$72.47<span class="less_price">$112.10</span></h6>
											</div>
										</div>
										<div class="woo_product_cart hover">
											<ul>
												<li><a href="javascript:void(0);" data-toggle="modal" data-target="#viewproduct-over" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
												<li><a href="add-to-cart.html" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
												<li><a href="wishlist.html" class="woo_cart_btn btn_save"><i class="ti-heart"></i></a></li>
											</ul>
										</div>								
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_product_grid">
										<div class="woo_product_thumb">
											<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" />
										</div>
										<div class="woo_product_caption center">
											<div class="woo_rate">
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="woo_title">
												<h4 class="woo_pro_title"><a href="detail-1.html">Accumsan Tree Fusce</a></h4>
											</div>
											<div class="woo_price">
												<h6>$72.47<span class="less_price">$112.10</span></h6>
											</div>
										</div>
										<div class="woo_product_cart hover">
											<ul>
												<li><a href="javascript:void(0);" data-toggle="modal" data-target="#viewproduct-over" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
												<li><a href="add-to-cart.html" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
												<li><a href="wishlist.html" class="woo_cart_btn btn_save"><i class="ti-heart"></i></a></li>
											</ul>
										</div>								
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_product_grid">
										<span class="woo_offer_sell">Save 10% Off</span>
										<div class="woo_product_thumb">
											<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" />
										</div>
										<div class="woo_product_caption center">
											<div class="woo_rate">
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="woo_title">
												<h4 class="woo_pro_title"><a href="detail-1.html">Accumsan Tree Fusce</a></h4>
											</div>
											<div class="woo_price">
												<h6>$72.47<span class="less_price">$112.10</span></h6>
											</div>
										</div>
										<div class="woo_product_cart hover">
											<ul>
												<li><a href="javascript:void(0);" data-toggle="modal" data-target="#viewproduct-over" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
												<li><a href="add-to-cart.html" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
												<li><a href="wishlist.html" class="woo_cart_btn btn_save"><i class="ti-heart"></i></a></li>
											</ul>
										</div>								
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_product_grid">
										<span class="woo_pr_tag hot">Hot</span>
										<div class="woo_product_thumb">
											<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" />
										</div>
										<div class="woo_product_caption center">
											<div class="woo_rate">
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="woo_title">
												<h4 class="woo_pro_title"><a href="detail-1.html">Accumsan Tree Fusce</a></h4>
											</div>
											<div class="woo_price">
												<h6>$72.47<span class="less_price">$112.10</span></h6>
											</div>
										</div>
										<div class="woo_product_cart hover">
											<ul>
												<li><a href="javascript:void(0);" data-toggle="modal" data-target="#viewproduct-over" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
												<li><a href="add-to-cart.html" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
												<li><a href="wishlist.html" class="woo_cart_btn btn_save"><i class="ti-heart"></i></a></li>
											</ul>
										</div>								
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_product_grid">
										<div class="woo_product_thumb">
											<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" />
										</div>
										<div class="woo_product_caption center">
											<div class="woo_rate">
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="woo_title">
												<h4 class="woo_pro_title"><a href="detail-1.html">Accumsan Tree Fusce</a></h4>
											</div>
											<div class="woo_price">
												<h6>$72.47<span class="less_price">$112.10</span></h6>
											</div>
										</div>
										<div class="woo_product_cart hover">
											<ul>
												<li><a href="javascript:void(0);" data-toggle="modal" data-target="#viewproduct-over" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
												<li><a href="add-to-cart.html" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
												<li><a href="wishlist.html" class="woo_cart_btn btn_save"><i class="ti-heart"></i></a></li>
											</ul>
										</div>								
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_product_grid">
										<span class="woo_pr_tag new">New</span>
										<div class="woo_product_thumb">
											<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" />
										</div>
										<div class="woo_product_caption center">
											<div class="woo_rate">
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star filled"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="woo_title">
												<h4 class="woo_pro_title"><a href="detail-1.html">Accumsan Tree Fusce</a></h4>
											</div>
											<div class="woo_price">
												<h6>$72.47<span class="less_price">$112.10</span></h6>
											</div>
										</div>
										<div class="woo_product_cart hover">
											<ul>
												<li><a href="javascript:void(0);" data-toggle="modal" data-target="#viewproduct-over" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
												<li><a href="add-to-cart.html" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
												<li><a href="wishlist.html" class="woo_cart_btn btn_save"><i class="ti-heart"></i></a></li>
											</ul>
										</div>								
									</div>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================== Business/Sell/Buy End ==================== -->


@endsection