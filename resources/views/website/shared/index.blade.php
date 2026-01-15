<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
        <title>JUBITA</title>
		 
        <!-- Custom CSS -->
        <link href="assets/css/styles.css" rel="stylesheet">
		
    </head>
	
    <body class="electronic-theme">
	
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
			<div class="header">
				<!-- Main header -->
				<div class="main_header">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-2 col-md-2 col-sm-3 col-4">
								<a class="nav-brand" href="#">
									<img src="{{asset('assets/img/logo2.png')}}" class="logo" alt="" />
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
											<span>+255 855 606 8402</span>
										</div>
									</div>
									
								</div>
								
								<div class="blocks search_blocks d-none d-xl-block d-lg-block">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search all information here...">
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
								<input type="text" class="form-control" placeholder="Search all information here...">
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
															
							</div>
							
							<div class="col-lg-9 col-md-8 col-sm-4 col-2">
								<nav id="navigation" class="navigation navigation-landscape">
									<div class="nav-header">
										<div class="nav-toggle"></div>
									</div>
									<div class="nav-menus-wrapper" style="transition-property: none;">
										<ul class="nav-menu">
										
											<li class="active"><a href="#">Nyumbani </a></li>
                                            <li><a href="#"><span>Masoko</span></a></li>
                                            <li><a href="#"><span>Uchumi</span></a></li>
                                            <li><a href="#"><span>Biashara</span></a></li>
                                            <li><a href="#"><span>Teknolojia</span></a></li>
                                            <li><a href="#"><span>Jiopolitiki</span></a></li>
                                            <li><a href="#"><span>Fedha</span></a></li>
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
		

            @yield('content')
			


			<!-- ============================ Call To Action ================================== -->
			<section class="theme-bg call_action_wrap-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="call_action_wrap">
								<div class="call_action_wrap-head">
									<h3>Do You want to stay connected?</h3>
									<span>Subscribe and get more updates from JUBITA.</span>
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
										<h4>Breaking News/h4>
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
										<h4>Clear and Real Info</h4>
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
										<h4>Always available Support</h4>
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
											<li><i class="ti-home theme-cl"></i>#DODOMA HQ Building, Dodoma<br>Tanzania</li>
											<li><i class="ti-headphone-alt theme-cl"></i>(255) 254 758 4572</li>
										</ul>
									</div>
									
								</div>
							</div>
									
							<div class="col-lg-2 col-md-2">
								<div class="footer_widget">
									<h4 class="widget_title">Categories</h4>
									<ul class="footer-menu">
											<li class="active"><a href="#">Nyumbani </a></li>
                                            <li><a href="#"><span>Masoko</span></a></li>
                                            <li><a href="#"><span>Uchumi</span></a></li>
                                            <li><a href="#"><span>Biashara</span></a></li>
                                           
									</ul>
								</div>
							</div>

							<div class="col-lg-2 col-md-2">
								<div class="footer_widget">
									<h4 class="widget_title">More Category</h4>
									<ul class="footer-menu">
											<li><a href="#"><span>Teknolojia</span></a></li>
                                            <li><a href="#"><span>Jiopolitiki</span></a></li>
                                            <li><a href="#"><span>Fedha</span></a></li>
											<li><a href="#"><span>Mawasiliano</span></a></li>
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
									<h4 class="widget_title">Customer Support</h4>
									<ul class="footer-menu">
										<li><a href="#">Conditions</a></li>
										<li><a href="#">Privacy</a></li>
										<li><a href="#">FAQs</a></li>
										<li><a href="#"><span>Mawasiliano</span></a></li>
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
								<p class="mb-0">Â©Copyright 2025 JUBITA.</p>
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