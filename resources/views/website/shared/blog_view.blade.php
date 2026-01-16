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
			
			
			<!-- =========================== News & Articles =================================== -->
			<section class="gray">
				<div class="container">
					<div class="row">
	
						<div class="col-lg-8 col-md-12 col-sm-12">
							<article class="blog-news big-detail-wrap">
								<div class="blog-detail-wrap">
								
									<!-- Featured Image -->
									<figure class="img-holder">
										<a href="blog-detail.html"><img src="{{asset('assets/img/img.webp')}}" class="img-responsive" alt="News"></a>
										<div class="blog-post-date theme-bg">
											Mar 12, 2017
										</div>
									</figure>
									
									<!-- Blog Content -->
									<div class="full blog-content">
										<div class="post-meta">By: <a href="#" class="author theme-cl">Daniel Dax</a> | 10 comment-detail </div>
										<a href="blog-detail.html"><h3>Helping Kids Grow Up Stronger</h3></a>
										<div class="blog-text">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
											
										
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
											<div class="post-meta">Filed Under: <span class="category"><a href="#" class="theme-cl">Technology</a></span></div>
										</div>
										
									
										
									</div>
									<!-- Blog Content -->
									
								</div>
							</article>
							
						
									
						</div>
						
						<!-- Sidebar Start -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="blog-sidebar">
								
								<div class="side-widget">
									<div class="side-widget-header">
										<h4><i class="ti-check-box"></i>Latest Blogs</h4>
									</div>
									<div class="side-widget-body p-t-10">
										<div class="side-list">
											<ul class="side-blog-list">
												<li>
													
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Freel Documentry</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Nov 26, 2017</span> | <a href="#" rel="tag">Documentry</a>					
														</div>
													</div>
												</li>
												
												<li>
													
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Preez Food Rock</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Oct 10, 2017</span> | <a href="#" rel="tag">Food</a>					
														</div>
													</div>
												</li>
												
												<li>
													
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Cricket Buzz High</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Oct 07, 2017</span> | <a href="#" rel="tag">Sport</a>					
														</div>
													</div>
												</li>
												
												<li>
													
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Tour travel Tick</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Sep 27, 2017</span> | <a href="#" rel="tag">Travel</a>					
														</div>
													</div>
												</li>

                                                <li>
													
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Freel Documentry</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Nov 26, 2017</span> | <a href="#" rel="tag">Documentry</a>					
														</div>
													</div>
												</li>
												
												<li>
													
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Preez Food Rock</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Oct 10, 2017</span> | <a href="#" rel="tag">Food</a>					
														</div>
													</div>
												</li>
												
												<li>
													
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Cricket Buzz High</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Oct 07, 2017</span> | <a href="#" rel="tag">Sport</a>					
														</div>
													</div>
												</li>
												
												<li>
													
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Tour travel Tick</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Sep 27, 2017</span> | <a href="#" rel="tag">Travel</a>					
														</div>
													</div>
												</li>

											</ul>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- =========================== News & Articles =================================== -->

            
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