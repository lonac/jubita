<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="assets/img/favicon.png" type="image/gif" sizes="16x16">
		
        <title>JUBITA</title>
		 
        <!-- Custom CSS -->
        <link href="assets/css/styles.css" rel="stylesheet">
		
    </head>
	
    <body class="grocery-theme">
	
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
		
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			<div class="header">
				<!-- Main header -->
				<div class="main_header">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-2 col-md-2 col-sm-3 col-4">
								<a class="nav-brand" href="#"> JUBITA
									<!-- <img src="assets/img/logo-light.png" class="logo" alt="" /> -->
								</a>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-9 col-8">
								<!-- Show on Mobile & iPad -->
								<div class="blocks shop_cart d-xl-none d-lg-none">
									<div class="single_shop_cart">
										<div class="ss_cart_left">
											<a class="cart_box" data-toggle="collapse" href="#mySearch" role="button" aria-expanded="false" aria-controls="mySearch"><i class="ti-search"></i></a>
										</div>
									</div>
									<div class="single_shop_cart">
										<div class="ss_cart_left">
											<a href="#"  onclick="openRightMenu()" class="cart_box"><span class="qut_counter">0</span><i class="ti-shopping-cart"></i></a>
										</div>
										<div class="ss_cart_content">
											<strong>My Cart</strong>
											<span>$0.00</span>
										</div>
									</div>
								</div>
								
								<!-- Show on Desktop -->
								<div class="blocks shop_cart d-none d-xl-block d-lg-block">
									<div class="single_shop_cart">
										<div class="ss_cart_left">
											<a href="javascript:void(0)" class="cart_box"><i class="lni lni-phone"></i></a>
										</div>
										<div class="ss_cart_content">
											<strong>Call Us:</strong>
											<span>+91 855 606 8402</span>
										</div>
									</div>
									<div class="single_shop_cart">
										<div class="ss_cart_left">
											<a href="#" onclick="openRightMenu()" class="cart_box"><span class="qut_counter">0</span><i class="ti-shopping-cart"></i></a>
										</div>
										<div class="ss_cart_content">
											<strong>My Cart</strong>
											<span>$0.00</span>
										</div>
									</div>
								</div>
								
								<div class="blocks search_blocks d-none d-xl-block d-lg-block">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search entire store here...">
										<div class="input-group-append">
										<button class="btn search_btn" type="button"><i class="ti-search"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="collapse" id="mySearch">
						<div class="blocks search_blocks">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search entire store here...">
								<div class="input-group-append">
								<button class="btn search_btn" type="button"><i class="ti-search"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="header_nav">
					<div class="container">	
						<div class="row align-item-center">
							<div class="col-lg-3 col-md-4 col-sm-8 col-10">
								<!-- For Desktop -->
								<div class="shopby_categories d-none d-xl-block d-lg-block">
									<a class="shop_category" data-toggle="collapse" href="#myCategories" role="button" aria-expanded="false" aria-controls="myCategories"><i class="ti-menu"></i>Shop By categories</a>
									<div class="collapse" id="myCategories">
										<div id="cats_menu">
											<ul>
											   <li><a href="#"><span>Nyumbani</span></a></li>
											   <li><a href="#"><span>Masoko</span></a></li>
											   <li><a href="#"><span>Uchumi</span></a></li>
											   <li><a href="#"><span>Biashara</span></a></li>
											   <li><a href="#"><span>Teknolojia</span></a></li>
											   <li><a href="#"><span>Jiopolitiki</span></a></li>
											   <li><a href="#"><span>Mawasiliano</span></a></li>
											</ul>
										</div>
									</div>
								</div>
								
								<!-- For Mobile -->
								<div class="shopby_categories d-xl-none d-lg-none">
									<a class="shop_category" href="#" onclick="openLeftMenu()"><i class="ti-menu"></i>Shop By categories</a>
								</div>
								
							</div>
							
							<div class="col-lg-9 col-md-8 col-sm-4 col-2">
								<nav id="navigation" class="navigation navigation-landscape">
									<div class="nav-header">
										<div class="nav-toggle"></div>
									</div>
									<div class="nav-menus-wrapper" style="transition-property: none;">
										<ul class="nav-menu">

												<li  class="active" ><a href="#"><span>Nyumbani</span></a></li>
											   <li><a href="#"><span>Masoko</span></a></li>
											   <li><a href="#"><span>Uchumi</span></a></li>
											   <li><a href="#"><span>Biashara</span></a></li>
											   <li><a href="#"><span>Teknolojia</span></a></li>
											   <li><a href="#"><span>Jiopolitiki</span></a></li>
											   <li><a href="#"><span>Mawasiliano</span></a></li>
										</ul>

									</div>
								</nav>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ======================== Offer Banner Start ==================== -->
			<section class="offer-banner-wrap gray pt-4">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="owl-carousel banner-offers owl-theme">
								
								<!-- Single Item -->
								<div class="item">
									<div class="offer_item">
										<div class="offer_item_thumb">
											<div class="offer-overlay"></div>
											<img src="https://via.placeholder.com/626x417" alt="">
										</div>
										<div class="offer_caption">
											<div class="offer_bottom_caption">
												<p>10% Off</p>
												<div class="offer_title">Good Deals in Your City</div>
												<span>Save 10% on All Fruits</span>
											</div>
											<a href="#" class="btn offer_box_btn">Explore Now</a>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="offer_item">
										<div class="offer_item_thumb">
											<div class="offer-overlay"></div>
											<img src="https://via.placeholder.com/626x417" alt="">
										</div>
										<div class="offer_caption">
											<div class="offer_bottom_caption">
												<p>25% Off</p>
												<div class="offer_title">Good Offer on First Time</div>
												<span>Save 25% on Fresh Vegetables</span>
											</div>
											<a href="#" class="btn offer_box_btn">Explore Now</a>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="offer_item">
										<div class="offer_item_thumb">
											<div class="offer-overlay"></div>
											<img src="https://via.placeholder.com/626x417" alt="">
										</div>
										<div class="offer_caption">
											<div class="offer_bottom_caption">
												<p>30% Off</p>
												<div class="offer_title">Super Market Deals</div>
												<span>Save 30% on Eggs & Dairy</span>
											</div>
											<a href="#" class="btn offer_box_btn">Explore Now</a>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="offer_item">
										<div class="offer_item_thumb">
											<div class="offer-overlay"></div>
											<img src="https://via.placeholder.com/626x417" alt="">
										</div>
										<div class="offer_caption">
											<div class="offer_bottom_caption">
												<p>15% Off</p>
												<div class="offer_title">Better Offer for You</div>
												<span>Save More Thank 15%</span>
											</div>
											<a href="#" class="btn offer_box_btn">Explore Now</a>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="offer_item">
										<div class="offer_item_thumb">
											<div class="offer-overlay"></div>
											<img src="https://via.placeholder.com/626x417" alt="">
										</div>
										<div class="offer_caption">
											<div class="offer_bottom_caption">
												<p>40% Off</p>
												<div class="offer_title">Super Market Deals</div>
												<span>40% Off on All Dry Foods</span>
											</div>
											<a href="#" class="btn offer_box_btn">Explore Now</a>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="offer_item">
										<div class="offer_item_thumb">
											<div class="offer-overlay"></div>
											<img src="https://via.placeholder.com/626x417" alt="">
										</div>
										<div class="offer_caption">
											<div class="offer_bottom_caption">
												<p>15% Off</p>
												<div class="offer_title">Better Offer for You</div>
												<span>Drinking is Goodness for Health</span>
											</div>
											<a href="#" class="btn offer_box_btn">Explore Now</a>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="ht-25"></div>
			</section>
			<div class="clearfix"></div>
			<!-- ======================== Offer Banner End ==================== -->
			
			<!-- ======================== Choose Category Start ==================== -->
			<section class="pt-0 overlio">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="owl-carousel category-slider owl-theme">
							
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Fresh Vegetables</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Dairy & Eggs</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Beverages</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Meat & Seafood</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Fruits</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Grocery & Staples</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Snacks</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Pets care</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Electornics</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Home Care</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Noodles & Sauces</a></h4>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_category_box border_style rounded">
										<div class="woo_cat_thumb">
											<a href="#"><img src="https://via.placeholder.com/140x140" class="img-fluid" alt="" /></a>
										</div>
										<div class="woo_cat_caption">
											<h4><a href="#">Dry Snacks</a></h4>
										</div>
									</div>
								</div>
							
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ======================== Choose Category End ==================== -->
			
			<!-- ======================== Fresh Vegetables Start ==================== -->
			<section class="pt-0">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="sec-heading-flex pl-2 pr-2">
								<div class="sec-heading-flex-one">
									<h2>Fresh Vegetables</h2>
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
								
								<!-- Single Item -->
								<div class="item">
									<div class="woo_product_grid">
										<span class="woo_offer_sell">Save 20% Off</span>
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
			<div class="clearfix"></div>
			<!-- ======================== Fresh Vegetables End ==================== -->
			
			<!-- ======================== Fresh & Fast Fruits Start ==================== -->
			<section class="pt-0">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="sec-heading-flex pl-2 pr-2">
								<div class="sec-heading-flex-one">
									<h2>Fresh & Fast Fruits</h2>
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
							
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ======================== Fresh & Fast Fruits End ==================== -->
			
			<!-- ======================== Fruits Offers Start ==================== -->
			<section class="pt-0 pb-0">
				<div class="container">
					<div class="row align-items-center offer_flix light-yellow rounded">
					
						<div class="col-lg-7 col-md-7 col-sm-12">
							<div class="offer_block_caption">
								<h2 class="mb-4">Products Of The Week<br>Upto 40% Off on Fresh Fruits</h2>
								<a href="#" class="btn btn-warning">Explore All Products<i class="ti-arrow-right ml-2"></i></a>
							</div>
						</div>
						
						<div class="col-lg-5 col-md-5 col-sm-12">
							<div class="ordering">
								<img src="https://via.placeholder.com/500x600" class="img-fluid" alt="" />
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ======================== Fruits Offers End ==================== -->
			
			<!-- ======================== Fresh Vegetables & Fruits Start ==================== -->
			<section class="">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="sec-heading-flex pl-2 pr-2">
								<div class="sec-heading-flex-one">
									<h2>Added new Products</h2>
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
			<div class="clearfix"></div>
			<!-- ======================== Fresh Vegetables & Fruits End ==================== -->
			
			<!-- ============================ Call To Action ================================== 
			<section class="theme-bg call_action_wrap-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="call_action_wrap">
								<div class="call_action_wrap-head">
									<h3>Do You Have Questions ?</h3>
									<span>We'll help you to grow your career and growth.</span>
								</div>
								<div class="newsletter_box">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Subscribe here...">
										<div class="input-group-append">
										<button class="btn search_btn" type="button"><i class="fas fa-arrow-alt-circle-right"></i></button>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Call To Action End ================================== -->
			
			<!-- ============================ Footer Start ================================== -->
			<footer class="dark-footer skin-dark-footer style-2">
				<div class="before-footer">
					<div class="container">
						<div class="row">
					
							<div class="col-lg-4 col-md-4">
								<div class="single_facts">
									<div class="facts_icon">
										<i class="ti-shopping-cart"></i>
									</div>
									<div class="facts_caption">
										<h4>Free Home Delivery</h4>
										<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
									</div>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-4">
								<div class="single_facts">
									<div class="facts_icon">
										<i class="ti-money"></i>
									</div>
									<div class="facts_caption">
										<h4>Money Back Guarantee</h4>
										<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
									</div>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-4">
								<div class="single_facts last">
									<div class="facts_icon">
										<i class="ti-headphone-alt"></i>
									</div>
									<div class="facts_caption">
										<h4>24x7 Online Support</h4>
										<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="footer-middle">
					<div class="container">
						<div class="row">
							
							<div class="col-lg-4 col-md-4">
								<div class="footer_widget">
									<h4 class="extream">Contact us</h4>
									<p>Let's here all about it! <a href="#" class="theme-cl">Get it touch</a></p>
									
									<div class="address_infos">
										<ul>
											<li><i class="ti-home theme-cl"></i>#302 Brick Market, Jalsa California<br>United State HQS1130</li>
											<li><i class="ti-headphone-alt theme-cl"></i>(41) 254 758 4572</li>
										</ul>
									</div>
									
								</div>
							</div>
									
							<div class="col-lg-2 col-md-2">
								<div class="footer_widget">
									<h4 class="widget_title">Categories</h4>
									<ul class="footer-menu">
										<li><a href="#">Organic</a></li>
										<li><a href="#">Grocery</a></li>
										<li><a href="#">Education</a></li>
										<li><a href="#">Furniture</a></li>
									</ul>
								</div>
							</div>
									
							<div class="col-lg-2 col-md-2">
								<div class="footer_widget">
									<h4 class="widget_title">Our Company</h4>
									<ul class="footer-menu">
										<li><a href="#">About Us</a></li>
										<li><a href="#">My company</a></li>
										<li><a href="#">Our Studio</a></li>
										<li><a href="#">Nightlife</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-lg-2 col-md-2">
								<div class="footer_widget">
									<h4 class="widget_title">Latest News</h4>
									<ul class="footer-menu">
										<li><a href="#">Offers & Deals</a></li>
										<li><a href="#">My Account</a></li>
										<li><a href="#">My Products</a></li>
										<li><a href="#">Favorites</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-lg-2 col-md-2">
								<div class="footer_widget">
									<h4 class="widget_title">Customer Support</h4>
									<ul class="footer-menu">
										<li><a href="#">Conditions</a></li>
										<li><a href="#">Privacy</a></li>
										<li><a href="#">Blog</a></li>
										<li><a href="#">FAQs</a></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">
							
							<div class="col-lg-6 col-md-8">
								<p class="mb-0">©Copyright 2020 Odex. Designd By <a href="https://bootstrapdesigns.net">BootstrapDesigns</a>.</p>
							</div>
							
							<div class="col-lg-6 col-md-6 text-right">
								<ul class="footer_social_links">
									<li><a href="#"><i class="ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti-twitter"></i></a></li>
									<li><a href="#"><i class="ti-instagram"></i></a></li>
									<li><a href="#"><i class="ti-linkedin"></i></a></li>
								</ul>
							</div>
							
						</div>
					</div>
				</div>
			</footer>
			<!-- ============================ Footer End ================================== -->
			
			<!-- cart -->
			<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
				<div class="rightMenu-scroll">
					<h4 class="cart_heading">Your cart</h4>
					<button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"><i class="ti-close"></i></button>
					<div class="right-ch-sideBar" id="side-scroll">
						
						<div class="cart_select_items">
							<!-- Single Item -->
							<div class="cart_selected_single">
								<div class="cart_selected_single_thumb">
									<a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" /></a>
								</div>
								<div class="cart_selected_single_caption">
									<h4 class="product_title">Mahik Book pro</h4>
									<span class="numberof_item">$15x2</span>
									<a href="#" class="text-danger">Remove</a>
								</div>
							</div>
							<!-- Single Item -->
							<div class="cart_selected_single">
								<div class="cart_selected_single_thumb">
									<a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" /></a>
								</div>
								<div class="cart_selected_single_caption">
									<h4 class="product_title">Mahik Book pro</h4>
									<span class="numberof_item">$15x2</span>
									<a href="#" class="text-danger">Remove</a>
								</div>
							</div>
							<!-- Single Item -->
							<div class="cart_selected_single">
								<div class="cart_selected_single_thumb">
									<a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" /></a>
								</div>
								<div class="cart_selected_single_caption">
									<h4 class="product_title">Mahik Book pro</h4>
									<span class="numberof_item">$15x2</span>
									<a href="#" class="text-danger">Remove</a>
								</div>
							</div>
						</div>
						
						<div class="cart_subtotal">
							<h6>Subtotal<span class="theme-cl">$120.47</span></h6>
						</div>
						
						<div class="cart_action">
							<ul>
								<li><a href="" class="btn btn-go-cart btn-theme">View/Edit Cart</a></li>
								<li><a href="" class="btn btn-checkout">Checkout Now</a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<!-- cart -->

			<!-- Left Collapse navigation -->
			<div class="w3-ch-sideBar-left w3-bar-block w3-card-2 w3-animate-right"  style="display:none;right:0;" id="leftMenu">
				<div class="rightMenu-scroll">
					<div class="flixel">
						<h4 class="cart_heading">Navigation</h4>
						<button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large"><i class="ti-close"></i></button>
					</div>
					
					<div class="right-ch-sideBar">
						
						<div class="side_navigation_collapse">
							<div class="d-navigation">
								<ul id="side-menu">
									<li class="dropdown">
										<a href="#">Category<span class="ti-angle-left"></span></a>
										<ul class="nav nav-second-level">
											<li><a href="#">Grocery</a></li>
											<li><a href="#">Organic</a></li>
											<li><a href="#">Electronics</a></li>
											<li><a href="#">Fashion</a></li>
											<li><a href="#">Education</a></li>
											<li><a href="#">Beauty</a></li>
											
											<li class="dropdown">
												<a href="#">Digital<span class="ti-angle-left"></span></a>
												<ul class="nav nav-second-level">
													<li><a href="#">Sub Product</a></li>
													<li><a href="#">Sub Product</a></li>
													<li><a href="#">Sub Product</a></li>
													<li><a href="#">Sub Product</a></li>
												</ul>
											</li>
										</ul>
									</li>
									
									<li class="dropdown">
										<a href="#">Brands<span class="ti-angle-left"></span></a>
										<ul class="nav nav-second-level">
											<li><a href="#">Nike</a></li>
											<li><a href="#">Apple</a></li>
											<li><a href="#">Hackerl</a></li>
											<li><a href="#">Tuffan</a></li>
											<li><a href="#">Orio</a></li>
											<li><a href="#">Kite</a></li>
										</ul>
									</li>
									
									<li class="dropdown">
										<a href="#">Products<span class="ti-angle-left"></span></a>
										<ul class="nav nav-second-level">
											<li><a href="#">3 Columns products</a></li>
											<li><a href="#">4 Columns products</a></li>
											<li><a href="#">5 Columns products</a></li>
											<li><a href="#">6 Columns products</a></li>
											<li><a href="#">7 Columns products</a></li>
											<li><a href="#">8 Columns products</a></li>
										</ul>
									</li>
									
									<li><a href="#">About Us</a></li>
									<li><a href="#">Blogs</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Buy Odex</a></li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- Left Collapse navigation -->
			
			<!-- Product View -->
			<div class="modal fade" id="viewproduct-over" tabindex="-1" role="dialog" aria-labelledby="add-payment" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content" id="view-product">
						<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<div class="row align-items-center">
					
						<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="sp-wrap">
									<img src="https://via.placeholder.com/800x900" class="img-fluid rounded" alt="">
								</div>
							</div>
							
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="woo_pr_detail">
									
									<div class="woo_cats_wrps">
										<a href="#" class="woo_pr_cats">Casual Shirt</a>
										<span class="woo_pr_trending">Trending</span>
									</div>
									<h2 class="woo_pr_title">Fresh Green Pineapple</h2>
									
									<div class="woo_pr_reviews">
										<div class="woo_pr_rating">
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star"></i>
											<span class="woo_ave_rat">4.8</span>
										</div>
										<div class="woo_pr_total_reviews">
											<a href="#">(124 Reviews)</a>
										</div>
									</div>
									
									<div class="woo_pr_price">
										<div class="woo_pr_offer_price">
											<h3>$149<sup>.00</sup><span class="org_price">$199<sup>.99</sup></span></h3>
										</div>
									</div>
									
									<div class="woo_pr_short_desc">
										<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores voluptatem quia voluptas sit aspernatur.</p>
									</div>
									
									<div class="woo_pr_color flex_inline_center mb-3">
										<div class="woo_pr_varient">
											<h6>Size:</h6>
										</div>
										<div class="woo_colors_list pl-3">
											<div class="custom-varient custom-size">
												<input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioOne" value="5" data-toggle="form-caption" data-target="#sizeCaption">
												<label class="custom-control-label" for="sizeRadioOne">SM</label>
											</div>
											<div class="custom-varient custom-size">
												<input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioTwo" value="6" data-toggle="form-caption" data-target="#sizeCaption">
												<label class="custom-control-label" for="sizeRadioTwo">M</label>
											</div>
											<div class="custom-varient custom-size">
												<input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioThree" value="6.6" data-toggle="form-caption" data-target="#sizeCaption">
												<label class="custom-control-label" for="sizeRadioThree">L</label>
											</div>
											<div class="custom-varient custom-size">
												<input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioFour" value="7" data-toggle="form-caption" data-target="#sizeCaption" checked>
												<label class="custom-control-label" for="sizeRadioFour">XL</label>
											</div>
										</div>
									</div>
									
									<div class="woo_pr_color flex_inline_center mb-3">
										<div class="woo_pr_varient">
											<h6>Color:</h6>
										</div>
										<div class="woo_colors_list pl-3">
											<div class="custom-varient custom-color red">
												<input type="radio" class="custom-control-input" name="colorRadio" id="red" value="5" data-toggle="form-caption" data-target="#colorCaption">
												<label class="custom-control-label" for="red">5</label>
											</div>
											<div class="custom-varient custom-color green">
												<input type="radio" class="custom-control-input" name="colorRadio" id="green" value="6" data-toggle="form-caption" data-target="#colorCaption">
												<label class="custom-control-label" for="green">6</label>
											</div>
											<div class="custom-varient custom-color purple">
												<input type="radio" class="custom-control-input" name="colorRadio" id="purple" value="6.6" data-toggle="form-caption" data-target="#colorCaption" checked>
												<label class="custom-control-label" for="purple">6.5</label>
											</div>
											<div class="custom-varient custom-color yellow">
												<input type="radio" class="custom-control-input" name="colorRadio" id="yellow" value="7" data-toggle="form-caption" data-target="#colorCaption">
												<label class="custom-control-label" for="yellow">7</label>
											</div>
											<div class="custom-varient custom-color blue">
												<input type="radio" class="custom-control-input" name="colorRadio" id="blue" value="6" data-toggle="form-caption" data-target="#colorCaption">
												<label class="custom-control-label" for="blue">7.5</label>
											</div>
										</div>
									</div>
									
									<div class="woo_btn_action">
										<div class="col-12 col-lg-auto">
											<input type="number" class="form-control mb-2 full-width" value="1" />
										</div>
									</div>
									
									<div class="woo_btn_action">
										<div class="col-12 col-lg-auto">
											<button type="submit" class="btn btn-block btn-dark mb-2">Add to Cart <i class="ti-shopping-cart-full ml-2"></i></button>
										</div>
										<div class="col-12 col-lg-auto">
											<button class="btn btn-gray btn-block mb-2" data-toggle="button">Wishlist <i class="ti-heart ml-2"></i></button>
										</div>
									</div>
									
								</div>
							</div>
							
						</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/metisMenu.min.js"></script>
		<script src="assets/js/owl-carousel.js"></script>
		<script src="assets/js/ion.rangeSlider.min.js"></script>
		<script src="assets/js/smoothproducts.js"></script>
		<script src="assets/js/jquery-rating.js"></script>
		<script src="assets/js/jQuery.style.switcher.js"></script>
		<script src="assets/js/custom.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		
		<script>
			function openRightMenu() {
				document.getElementById("rightMenu").style.display = "block";
			}
			function closeRightMenu() {
				document.getElementById("rightMenu").style.display = "none";
			}
		</script>
		
		<script>
			function openLeftMenu() {
				document.getElementById("leftMenu").style.display = "block";
			}
			function closeLeftMenu() {
				document.getElementById("leftMenu").style.display = "none";
			}
		</script>

	</body>
</html>