<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->




	<head>
	
	<?php
	session_start();
	if (isset($_POST['booking']))
	{
		if (!isset($_SESSION['ID']))
		{
			
			echo "<script>
			
			
			alert('Please Login to Continue Booking');
			window.location.href = 'Login.php';
			</script>";
			
			
		}
		 

		
	}
	
	
	
	?>
	<script src="js/refresh.js"></script>
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
    <link rel="stylesheet" href="css/Singlepackage.css">
    
    <!-- Slidshow Styles -->
    <link rel="stylesheet" href="css/slidshowstyles.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
        function hide(jquery) {
            var idarr = ["tab1", "tab2","tab3","tab4","tab5","tab6"];
            var count = 0;

            for (var i = 0; i < idarr.length; i++) {
                var l = document.getElementById(idarr[count] + '');
                l.style.display = "none";
                count++;
            }
        }

    $(document).ready(hide);
    </script>
	<script>
        function ShowTab(y) {
            var idarr = ["tab1", "tab2"]

            // document.getElementById("poll").style.display="none";
            y += "";
            var x = document.getElementById(y);
            var count = 0;

            for (var i = 0; i < idarr.length; i++) {
                var l = document.getElementById(idarr[count] + '');
                l.style.display = "none";
                count++;
            }

            x.style.display = "block";

        }

	</script>
	

</head>
<body>
<?php

require_once("app/model/hotelmodel.php");
require_once("app/controller/HotelController.php");
require_once("app/view/HotelView.php");
$model=new Hotel();
$controller=new HotelController($model);
$controller->listhoteldata();
$hotelview=new HotelView($controller,$model);


require_once("app/model/package.php");
require_once("app/controller/PackageController.php");
require_once("app/view/PackageView.php");

$PKModel = new Package();
$PkController = new PackageController($PKModel);
$PkController->ListSinglePackage($_GET['action']);
$PkController->ListPackageServices();
$PKView = new PackageView($PkController,$PKModel);

require_once("app/model/singlehotelmodel.php");
require_once("app/controller/singlehotelcontroller.php");
require_once("app/view/singlehotelview.php");
$pagemodel=new singlehotelmodel($PKModel->GetHotelName());
$pagecontroller=new singlehotelcontroller($pagemodel);
$pagecontroller->listhoteldata();
$pageview=new singlehotelview($pagecontroller,$pagemodel);


require_once("app/model/guest.php");
require_once("app/controller/GuestController.php");
$guestmodel=new Guest();
$guestcontroller=new GuestController($guestmodel);

	if (isset($_POST['subreviewpkg']))
	{
		$guestcontroller->AddPkgReview();
	}
	if (isset($_POST['booking']))
	{
		
		$guestcontroller->booking($_SESSION['ID'],$_GET['action']);
	
	}


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
                                    <?php
									$hotelview->headerhotellist();
									?>
                                </ul>
                            </li>
                            <li><a href="services.php">Packages</a></li>
                            <li><a href="blog.php">About Us</a></li>
                            <li><a href="contact.php">Contact</a></li>
                    
                            <?php
                             
                            if (isset($_SESSION['type']) &&$_SESSION["type"]==="SUPPORT" )
                            {
                                echo "<li><a href='Support.php'>Support center</a></li>";
                                echo "<li><a href='Logout.php'>Log Out</a></li>";
                            }
                            else if (isset($_SESSION['type']) && $_SESSION["type"]==="USER" )
                            {
                                echo "<li><a href='profile.php'>Profile</a></li>";
                                echo "<li><a href='Logout.php'>Log Out</a></li>";
                            }
                            else if (isset($_SESSION['type']) &&$_SESSION["type"]==="ADMIN")
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
	
	<div class="fh5co-parallax" style="background-image: url(images/bloghomepic.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center"><?php echo ''.$PKView->PackageHeader().'' ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
                       
                       <div id="slide">
	                        <div class="container">
			                    <div class="row">
				                    <div class="col-md-15">
                                        <!-- Slidshow Section -->
                                        <div class="w3-content" style="max-width:800px">
                                        <img class="mySlides" src="images/wph1.jpg" style="width:100%">
                                        <img class="mySlides" src="images/wph2.jpg" style="width:100%">
                                        <img class="mySlides" src="images/wph3.jpg" style="width:100%">
                                        </div>

                                        <div class="w3-center">
                                        <div class="w3-section">
                                            <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>
                                            <button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>
                                        </div>
                                        <button class="w3-button demo" onclick="currentDiv(1)">1</button> 
                                        <button class="w3-button demo" onclick="currentDiv(2)">2</button> 
                                        <button class="w3-button demo" onclick="currentDiv(3)">3</button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        


	

	<div id="hotel-facilities">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
					</div>			
				</div>
			</div>

			<div id="tabs">
			<nav class="tabs-nav">
					<a href="#" class="active" onclick="ShowTab('tab1')" data-tab="tab1">
                    <img id="News" src="images\list.png" width="50" height="50">
						<span>Details</span>
					</a>
					<a href="#"  onclick="ShowTab('tab2')" data-tab="tab2">
                    <img id="News" src="images\support.png" width="50" height="50">
						<span>Services</span>
					</a>
                    <a href="#"  onclick="ShowTab('tab3')" data-tab="tab3">
                    <img id="News" src="images\Booking.png" width="50" height="50">
						<span>Booking</span>
					</a>
                </nav>
                <div class="tab-content-container">
					<div class="tab-content active show" id="tab1" data-tab-content="tab1">
					<!-- Details -->
					<?php $PKView->DetailsOutput(); ?>
					<h3> Reviews </h3>
					<?php $PKView->PackageReviewOutput(); ?>



					<?php 
					
					if (isset($_SESSION['type']) && $_SESSION["type"]==="USER" )
						{
						echo'
						<br><br>
						<h3>Add Your Own Review</h3>
						<form action="" method="post">
								<div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="ReviewHotel">Add Your Review:</label>
                                    <div class="col-sm-3">
                                    	<input type="text" class="form-control" id="" name="reviewpkg" required>
                                    </div>
								</div>
								<input type="submit" name="subreviewpkg" value="Submit Review" class="btn btn-primary btn-lg">
						</form>
						';
						} 
					
					?>



					</div>
					<div class="tab-content" id="tab2" data-tab-content="tab2">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h3 class="heading">Hotel includes</h3>
                                    <?php $pageview->outputservices(); ?>
                                    <!-- <div class="services">
                                        <span><i class="ti-rss-alt"></i></span>
                                        <div class="desc"> Wifi</div>
                                    </div>

                                    <div class="services">
                                        <span><i class="flaticon-swimming icon"></i></span>
                                        <div class="desc"> Swimming Pool</div>
                                    </div>

                                    <div class="services">
                                        <span><i class="flaticon-bicycle icon"></i></span>
                                        <div class="desc"> Gym</div>
                                    </div>

                                    <div class="services">
                                        <span><i class="flaticon-massage icon"></i></span>
                                        <div class="desc"> Spa</div>
                                    </div>

                                    <div class="services">
                                        <span><i class="flaticon-cup icon"></i></span>
                                        <div class="desc"> Bar</div>
                                    </div>

                                    <div class="services">
                                        <span><i class="flaticon-restaurant icon"></i></span>
										<div class="desc" >Resturant</div>
									</div> -->
									<?php $PKView->CruiseServicesOutput(); ?>
									<?php $PKView->HotelHyperlink(); ?>
									<!-- <div class="services">
                                        <span><i class="ti-medall"></i></span>
										<div class="desc" >Pets</div>
									</div>
									<div class="services">
                                        <span><i class="ti-bag"></i></span>
										<div class="desc" >Fishing</div>
									</div>
									<div class="services">
                                        <span><i class="ti-shine"></i></span>
										<div class="desc" >Sunbathing</div>
									</div> -->

									<!-- <a href="single-hotel.php" style="color:orangered"><b>hotel/cruise details here</b></a> -->
								</div>
							</div>
						</div>
					</div>
                    <div class="tab-content " id="tab3" data-tab-content="tab3">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h3 class="heading">Booking</h3>
                                    <h3>Book Now</h3> 
                        <form method='post' action="">

                                
						<div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Number of Adults:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" class="form-control" id="quantity" name='noofadults' min="0" required max="100" placeholder="1">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Number of Children:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" class="form-control" id="quantity" name='noofchildren' min="0" required max="100" placeholder="0">
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="enterhotel">Boarding type</label>
                                    <div class="col-sm-3">
										<div class="boardtype">
											<input required type="radio" class="form-check-input" name="boardtype" value="Full"> Full Board <br>
											<input required type="radio" class="form-check-input" name="boardtype" value="Half"> Half Board<br>
                                		</div>
                                    </div>
                                </div>
                                
                                

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Choose Number of Single Rooms:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" required class="form-control" name='singlerooms' id="quantity" min="1" max="100" placeholder="0">
                                    </div>
                                </div>
                                 
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Choose Number of Double Rooms:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" required class="form-control" name='doublerooms' id="quantity" min="1" max="100" placeholder="0">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Choose Number of Triple Rooms:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" required class="form-control" name='triplerooms' id="quantity" min="1" max="100" placeholder="0">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Choose Number of suites:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" class="form-control" required name='suites' id="quantity" min="1" max="100" placeholder="0">
                                    </div>
                                </div>

                                <input type="submit" name='booking' value="Book" class="btn btn-primary btn-lg">
								<br><br>
								<label>* You must be logged in to book package</label>


                            </form>
									
								</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>

	



	<footer id="footer" class="fh5co-bg-color">
	<?php
	include "Footer.php"
	?>
		
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
    <script src="js/Slideshow.js"></script>
    <script src="js/multi-level-drop.js"></script>
	


</body>
</html>