<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->



	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Speedo Tours &mdash; License No. 782</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->
	 <script src="js/refresh.js"></script>

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->

	<!-- Stylesheets -->
	<script src="js/sweetalert.min.js"></script>
	<!-- Dropdown Menu -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Owl Slider -->
	<!-- <link rel="stylesheet" href="css/owl.carousel.css"> -->
	<!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">

	<!-- Themify Icons -->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Flat Icon -->
	<link rel="stylesheet" href="css/flaticon.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	
	<!-- Style -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	

</head>
<body>
<?php 
session_start();
require_once("app/model/mainpagemodel.php");
require_once("app/controller/MainpageController.php");
require_once("app/view/MainpageView.php");
$pagemodel=new mainpage();
$pagecontroller=new MainpageController($pagemodel);
$pagecontroller->listhoteldata();
$pageview=new MainpageView($pagecontroller,$pagemodel);

require_once("app/model/hotelmodel.php");
require_once("app/controller/HotelController.php");
require_once("app/view/HotelView.php");
$model=new Hotel();
$controller=new HotelController($model);
$controller->listhoteldata();
$hotelview=new HotelView($controller,$model);

require_once("app/model/user.php");
require_once("app/controller/UserController.php");


$guestmodel=new User();
$guestcontroller=new UserController($guestmodel);


?>

	<div id="fh5co-wrapper">
	<div id="fh5co-page">
	<div id="fh5co-header">
		<header id="fh5co-header-section">
			<div class="container">
				<div class="nav-header">
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
                    <h1 id="fh5co-logo"><img id="LogoImg" src="images\WebAppLogo.png" alt="Flowers in Chania" width="150" height="100"><a href="index.php">Speedo Tours</a></h1>
                    <nav id="fh5co-menu-wrap" role="navigation">
                        <ul class="sf-menu" id="fh5co-primary-menu">
                            <li><a href="index.php">Home</a></li>
                            <li>
                                <a class="active" href="hotel.php" class="fh5co-sub-ddown">Hotels</a>
                                <ul class="fh5co-sub-menu">
                                    <?php $hotelview->headerhotellist(); ?> 
                                </ul>
                            </li>
                            <li><a href="services.php">Packages</a></li>
                            <li><a href="blog.php">About Us</a></li>
                            <li><a href="contact.php">Contact</a></li>
                    
                            <?php
                             
                            if (isset($_SESSION['type']) && $_SESSION["type"]==="SUPPORT" )
                            {
                                echo "<li><a href='Support.php'>Support center</a></li>";
                                echo "<li><a href='Logout.php'>Log Out</a></li>";
                            }
                            else if (isset($_SESSION['type']) && $_SESSION["type"]==="USER" )
                            {
                                echo "<li><a href='profile.php'>Profile</a></li>";
                                echo "<li><a href='Logout.php'>Log Out</a></li>";
                            }
                            else if (isset($_SESSION['type']) && $_SESSION["type"]==="ADMIN")
                            {
                                echo "<li><a href='admin.php'>Admin page</a></li>";
                                echo "<li><a href='logout.php'>Log Out</a></li>";
                            }
                            else if(!isset($_SESSION['type']))
                            {
                                echo "<li><a href='SignUp.php'>Register</a></li>";
                                echo "<li><a href='Login.php'>Login</a></li>";
                            }
                        
                            ?> 

                            
                        </ul>
                    </nav>
                </div>
			</div>
		</header>
		
	</div>


	
	<!-- end:fh5co-header -->
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<?php $pageview->outputslider(); ?>
		  	</ul>
	  	</div>
	</aside>

	

	<div class="wrap">
		<div class="container">
			<div class="row">
				<div id="availability">
					<form id="formcheck" action="" method="post">
						<div class="a-col">
							<section>
								<select id="hotelselect" name="hotelselect" onchange="" class="cs-select cs-skin-border">
									<option value="" disabled selected>Select Hotel</option>
									<?php $pageview->output()?>
								</select>
							</section>
						</div>
						<div class="a-col alternate">
							<div class="input-field">
								<label for="date-start">Check In</label>
								<input type="text" class="form-control" id="date-start" />
							</div>
						</div>
						<div class="a-col alternate">
							<div class="input-field">
								<label for="date-end">Check Out</label>
								<input type="text" class="form-control" id="date-end" />
							</div>
						</div>
						<div class="a-col action">
							<a onclick="document.getElementById('formcheck').submit()">
								<span>Check</span>
								Availability
							</a>
						</div>

						

					</form>
				</div>
			</div>
		</div>
	</div>

	<?php 

		$guestcontroller->checkavailabilty();
		// $guestview->outputavailiabilty();
	?>

	
	
	<div id="fh5co-counter-section" class="fh5co-counters">
		<div class="container">
			<div class="row">
				<?php $pagecontroller->countdata(); ?>
				<?php $pageview->outputdatacount(); ?>
			</div>
		</div>
	</div>

	<div id="featured-hotel" class="fh5co-bg-color">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Featured Hotels</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="feature-full-1col">
					<?php
					$pageview->outputfeatureheader();
					?>
				</div>

				<div class="feature-full-2col">
					<?php
					$pageview->outputdivs();
					?>
				</div>
			</div>

		</div>
	</div>

	<div id="hotel-facilities">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Hotel Facilities</h2>
					</div>
				</div>
			</div>

			<div id="tabs">
				<nav class="tabs-nav">
					<a href="#" class="active" data-tab="tab1">
						<i class="flaticon-restaurant icon"></i>
						<span>Restaurant</span>
					</a>
					<a href="#" data-tab="tab2">
						<i class="flaticon-cup icon"></i>
						<span>Bar</span>
					</a>
					<a href="#" data-tab="tab3">
					
						<i class="flaticon-car icon"></i>
						<span>Pick-up</span>
					</a>
					<a href="#" data-tab="tab4">
						
						<i class="flaticon-swimming icon"></i>
						<span>Swimming Pool</span>
					</a>
					<a href="#" data-tab="tab5">
						
						<i class="flaticon-massage icon"></i>
						<span>Spa</span>
					</a>
					<a href="#" data-tab="tab6">
						
						<i class="flaticon-bicycle icon"></i>
						<span>Gym</span>
					</a>
				</nav>
				<div class="tab-content-container">
					<div class="tab-content active show" data-tab-content="tab1">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<img src="images/tab_img_1.jpg" class="img-responsive" alt="Image">
								</div>
								<div class="col-md-6">
									<span class="super-heading-sm">World Class</span>
									<h3 class="heading">Restaurants</h3>
									<p>Though the poolside views of the city and the smell of fresh bread baking in the brick oven are enticing, the real star of Aura is the modern Shami cuisine, a delightful mix of Arabian and Oriential flavours, best enjoyed at night, when the lights reflect off the water and cast a beautiful glow. Whether you’re time-zone–hopping, feeding a hungry team during an impromptu meeting, or looking for quiet, private dining, you can choose from our extensive In-Room menu day or night.</p>
									<p>Gaze out at panoramic Nile views while you dine on exotic Egyptian cuisine at luxurious restaurants and lounge on the First Nile Boat.</p>
									<!-- <p class="service-hour">
										<span>Service Hours</span>
										<strong>7:30 AM - 8:00 PM</strong>
									</p> -->
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" data-tab-content="tab2">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<img src="images/tab_img_2.jpg" class="img-responsive" alt="Image">
								</div>
								<div class="col-md-6">
									<span class="super-heading-sm">World Class</span>
									<h3 class="heading">Bars</h3>
									<p>Bars offers a selection of delicacies and a wide range of champagnes, wines and cocktails, making it the perfect spot for a relaxed, social get-together. The first of its kind in downtown Cairo, the luxury lounge offers an unmatched relaxing ambience. Enjoy a refreshing beer or beverage while gazing over stunning views of the city and the River Nile or indulge in a signature cocktail mixed by one of our expert bar staff. Listen to the vibrant mix of music and enjoy the lively atmosphere at this sophisticated venue.</p>
									
									<!-- <p class="service-hour">
										<span>Service Hours</span>
										<strong>7:30 AM - 8:00 PM</strong>
									</p> -->
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" data-tab-content="tab3">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<img src="images/tab_img_3.jpg" class="img-responsive" alt="Image">
								</div>
								<div class="col-md-6">
									<span class="super-heading-sm">World Class</span>
									<h3 class="heading">Pick Up</h3>
									<p>Our Transportation sets new standards with its luxury buses, not just when it comes to comfort but also with respect to flexibility in service and in environmental compatibility. The interior of our buses was designed to meet the highest standards and focuses on the needs of our passengers. Regardless of whether you just want to travel relaxedly and comfortably with us or you want to hold a conference during the journey – our luxury buses are aimed at making each of your journeys more pleasant. </p>
									<p>Simply lean back and let your every wish be anticipated. All technical options are available to you at all times to make sensible use of the journey time or to enjoy it with entertainment.</p>
									<!-- <p class="service-hour">
										<span>Service Hours</span>
										<strong>7:30 AM - 8:00 PM</strong>
									</p> -->
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" data-tab-content="tab4">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<img src="images/tab_img_4.jpg" class="img-responsive" alt="Image">
								</div>
								<div class="col-md-6">
									<span class="super-heading-sm">World Class</span>
									<h3 class="heading">Swimming Pools</h3>
									<p>Many health clubs, fitness centers, and private clubs have pools used mostly for exercise or recreation. Many hotels have pools available for their guests to use at their own leisure. Our hotels have pools for physical education classes, recreational activities, leisure, and competitive athletics such as swimming teams. Hot tubs and spas are pools filled with hot water, used for relaxation or hydrotherapy.</p>
									
									<!-- <p class="service-hour">
										<span>Service Hours</span>
										<strong>7:30 AM - 8:00 PM</strong>
									</p> -->
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" data-tab-content="tab5">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<img src="images/tab_img_5.jpg" class="img-responsive" alt="Image">
								</div>
								<div class="col-md-6">
									<span class="super-heading-sm">World Class</span>
									<h3 class="heading">Spa</h3>
									<p>Spring is a time for renewal, for blowing the cobwebs off and emerging into the year ahead with a renewed focus. For many people, a wellness retreat is a central part of the strategy, but the trick is to find the right fit. As hotel spas can come in all shapes and sizes, we’ve provided some inspiration with ten of our favorites from around the globe.</p>
									<p>Keeping the leading position to Beauty SPA by World Class has become possible due to its great team – high qualified specialists, well-known both in Egypt and abroad: the experienced doctors, cosmetologists, steam therapists, stylists, massage therapists, makeup artists, osteopathologists and nail artists.</p>
									<!-- <p class="service-hour">
										<span>Service Hours</span>
										<strong>7:30 AM - 8:00 PM</strong>
									</p> -->
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" data-tab-content="tab6">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<img src="images/tab_img_6.jpg" class="img-responsive" alt="Image">
								</div>
								<div class="col-md-6">
									<span class="super-heading-sm">World Class</span>
									<h3 class="heading">Gyms</h3>
									<p>We Always Strive to make sure you enjoy the hotel's gym and don't miss any of your daily workout schedule.Our Hotels Gyms is worth a visit for two reasons: It’s nestled in the heart of one of the world’s best tourism towns and has a gym with incomparable views. Seriously—with floor-to-ceiling windows overlooking Banff’s mighty mountain range, this’ll be the most enjoyable treadmill run of your life.</p>
									<p>The gym has a variety of fitness and yoga classes, along with one-on-one training with certified trainers. And don’t worry if you forgot to pack your workout gear. Fairmont Fit can provide guests with Reebok workout apparel, shoes, and a yoga mat on request.</p>
									<!-- <p class="service-hour">
										<span>Service Hours</span>
										<strong>7:30 AM - 8:00 PM</strong>
									</p> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="testimonial">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Happy Customer Says...</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				$pagecontroller->listreviews();
				$pageview->outputreviews();
				?>
			</div>
		</div>
	</div>


	<!-- <div id="fh5co-blog-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Our Blog</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="blog-grid" style="background-image: url(images/image-1.jpg);">
						<div class="date text-center">
							<span>09</span>
							<small>Aug</small>
						</div>
					</div>
					<div class="desc">
						<h3><a href="#">Most Expensive Hotel</a></h3>
					</div>
				</div>
				<div class="col-md-4">
					<div class="blog-grid" style="background-image: url(images/image-2.jpg);">
						<div class="date text-center">
							<span>09</span>
							<small>Aug</small>
						</div>
					</div>
					<div class="desc">
						<h3><a href="#">1st Anniversary of Luxe Hotel</a></h3>
					</div>
				</div>
				<div class="col-md-4">
					<div class="blog-grid" style="background-image: url(images/image-3.jpg);">
						<div class="date text-center">
							<span>09</span>
							<small>Aug</small>
						</div>
					</div>
					<div class="desc">
						<h3><a href="#">Discover New Adventure</a></h3>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<footer id="footer" class="fh5co-bg-color">
	<?php
	include "Footer.php"
	?>
		<!-- <div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="copyright">
						<p><small>&copy; 2016 Free HTML5 Template. <br> All Rights Reserved. <br>
						Designed by <a href="http://freehtml5.co" target="_blank">FreeHTML5.co</a> <br> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small></p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-3">
							<h3>Company</h3>
							<ul class="link">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Hotels</a></li>
								<li><a href="#">Customer Care</a></li>
								<li><a href="#">Contact Us</a></li>
							</ul>
						</div>
						<div class="col-md-3">
							<h3>Our Facilities</h3>
							<ul class="link">
								<li><a href="#">Resturant</a></li>
								<li><a href="#">Bars</a></li>
								<li><a href="#">Pick-up</a></li>
								<li><a href="#">Swimming Pool</a></li>
								<li><a href="#">Spa</a></li>
								<li><a href="#">Gym</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<h3>Subscribe</h3>
							<p>Sed cursus ut nibh in semper. Mauris varius et magna in fermentum. </p>
							<form action="#" id="form-subscribe">
								<div class="form-field">
									<input type="email" placeholder="Email Address" id="email">
									<input type="submit" id="submit" value="Send">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<ul class="social-icons">
						<li>
							<a href="#"><i class="icon-twitter-with-circle"></i></a>
							<a href="#"><i class="icon-facebook-with-circle"></i></a>
							<a href="#"><i class="icon-instagram-with-circle"></i></a>
							<a href="#"><i class="icon-linkedin-with-circle"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div> -->
	</footer>

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->
	
	<!-- Javascripts -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- Dropdown Menu -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Owl Slider -->
	<!-- // <script src="js/owl.carousel.min.js"></script> -->
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	<script src="js/classie.js"></script>
	<script src="js/selectFx.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<script src="js/custom.js"></script>

</body>
</html>