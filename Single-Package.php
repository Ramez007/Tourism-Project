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
session_start();
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
                                    <li><a href="#">Steinberger Hotel</a></li>
                                    <li><a href="single-hotel.php">Winter Palace Hotel</a></li>
                                    <li><a href="#">Isis Hotel</a></li>
                                    <li><a href="#">Ibertol Hotel</a></li>
                                    <li><a href="#">Sunset Hotel</a></li>
                                    <!-- <li>
                                        <a href="#" class="fh5co-sub-ddown">King Hotel</a>
                                        <ul class="fh5co-sub-menu">
                                            <li><a href="http://freehtml5.co/preview/?item=build-free-html5-bootstrap-template" target="_blank">Build</a></li>
                                            <li><a href="http://freehtml5.co/preview/?item=work-free-html5-template-bootstrap" target="_blank">Work</a></li>
                                            <li><a href="http://freehtml5.co/preview/?item=light-free-html5-template-bootstrap" target="_blank">Light</a></li>
                                            <li><a href="http://freehtml5.co/preview/?item=relic-free-html5-template-using-bootstrap" target="_blank">Relic</a></li>
                                            <li><a href="http://freehtml5.co/preview/?item=display-free-html5-template-using-bootstrap" target="_blank">Display</a></li>
                                            <li><a href="http://freehtml5.co/preview/?item=sprint-free-html5-template-bootstrap" target="_blank">Sprint</a></li>
                                        </ul>
                                    </li> -->
                                    <li><a href="#">Emilio Hotel</a></li> 
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
						<h1 class="text-center">Cairo/Abu-Simble Package</h1>
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
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h4> a brief description on package 1  include visits , information about the hotel,cruise including cruise name and the landmarks </h4>
									
								</div>
								<div class="services"style="top: 12px;">
									<span style="margin-bottom:20px;top: 39px;"><img id="News" src="images\sun.png" width="50" height="50"style="margin-bottom:20px"></span>
                                        <div class="desc"> Number of days:</div>
									</div>
									<div class="services">
									<span style="margin-bottom:20px;top: 5px;"><img id="News" src="images\moon.png" width="50" height="50"style="margin-bottom:40px"></span>
                                        <div class="desc"style=""> number of nights:</div>
									</div>
									<div class="services">
									<span style="margin-bottom:20px;top: 5px;"><img id="News" src="images\city.png" width="50" height="50"style="margin-bottom:40px"></span>
										<div class="desc" style="margin-top: 0px;padding-top: 30px;"> cities:</div>
									</div>
									<div class="services">
									<span><img id="News" src="images\dollar.png" width="50" height="50"style="margin-bottom:40px"></span>
                                        <div class="desc"style="padding-top: 45px;"> Basic cost:</div>
									</div>
							</div>
						</div>
					</div>
					<div class="tab-content" id="tab2" data-tab-content="tab2">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h3 class="heading">Hotel includes</h3>
                                    
                                    <div class="services">
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
									</div>
									<h3 class="heading">Cruise includes</h3>
									<div class="services">
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
									</div>

									<a href="single-hotel.php" style="color:orangered"><b>hotel/cruise details here</b></a>
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
                        <form action="">

                                
						<div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Number of Adults:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" class="form-control" id="quantity" min="0" max="100" placeholder="1">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Number of Children:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" class="form-control" id="quantity" min="0" max="100" placeholder="0">
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="enterhotel">Boarding type</label>
                                    <div class="col-sm-3">
										<div class="boardtype">
											<input type="radio" class="form-check-input" name="boardtype" value="fullboard"> Full Board <br>
											<input type="radio" class="form-check-input" name="boardtype" value="halfboard"> Half Board<br>
                                		</div>
                                    </div>
                                </div>
                                
                                

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Choose Number of Single Rooms:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" class="form-control" id="quantity" min="1" max="100" placeholder="0">
                                    </div>
                                </div>
                                 
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Choose Number of Double Rooms:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" class="form-control" id="quantity" min="1" max="100" placeholder="0">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Choose Number of Triple Rooms:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" class="form-control" id="quantity" min="1" max="100" placeholder="0">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="quantity">Choose Number of suites:</label>
                                    <div class="col-sm-3">
                                    	<input type="number" class="form-control" id="quantity" min="1" max="100" placeholder="0">
                                    </div>
                                </div>

                                <input type="submit" value="Book" class="btn btn-primary btn-lg">
                                


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