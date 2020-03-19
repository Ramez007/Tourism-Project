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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<script type="text/javascript">
		function showsec(y) {
			idarr = ["tab1", "tab2"]

			y += "";
			var x = document.getElementById(y);
			var count = 0;

            for (var i = 0; i < idarr.length; i++) 
            {
				var l = document.getElementById(idarr[count] + '');
				l.style.display = "none";
				count++;
			}

			x.style.display = "block";

		}

	</script>
<body>
	<div id="fh5co-wrapper">
	<div id="fh5co-page">
	<div id="fh5co-header">
		<header id="fh5co-header-section">
			<div class="container">
				<?php 
                include "header.php";
				?>
			</div>
		</header>
	</div>
    <!-- end:fh5co-header -->

	<div class="fh5co-parallax" style="background-image: url(images/profile-background.png);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center">Profile</h1>
					</div>
				</div>
			</div>
		</div>
    </div>

        <div id="hotel-facilities">
		    <div id="tabs">
				<nav class="tabs-nav">
					<a href="#" class="active" data-tab="tab1"   onclick="showsec('tab1')">
                        <!-- <i class="flaticon-restaurant icon"></i> -->
                        <img id="Profile" src="images\profile.png" width="50" height="50">
						<span>Personal Info</span>
					</a>
					<a href="#" data-tab="tab2"   onclick="showsec('tab2')">
                        <!-- <i class="flaticon-cup icon"></i> -->
                        <img id="History" src="images\clock.png" width="50" height="50">
						<span>History</span>
					</a>
				</nav>
				<div class="tab-content-container">
					<div class="tab-content active show" data-tab-content="tab1" id="tab1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                <img id="Profile-Picture" src = "images\blank-profile-picture.jpg" width="250" height = "300">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary mb-2" style="margin-left: 50px; margin-top: 20px;"> Change Picture </button>
                                            <button class="btn btn-primary mb-2" style="margin-top: 20px; margin-left: 700px;"> Edit Profile </button>
                                        </div>
                                    </div>
                                </div>
                    <div class="col-md-8">
                    <p> First Name: John</p><br>
                    <p> Last Name: Doe</p><br>
                    <p> Email: JohnDoe@email.com</p><br>
                    <p> Country: Westeros</p><br>
                    </div>
                    </div>
                    </div>
                    </div>
					<div class="tab-content" data-tab-content="tab2" id="tab2">
                        <div class="container">
  <h2>Past reservations</h2>           
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Type of reservation</th>
        <th>Date in</th>
        <th>Date out</th>
        <th>Notes</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Package</td>
        <td>20/12/2017</td>
        <td>23/12/2017</td>
        <td>December offer, Hurghada, 2 Double rooms</td>
      </tr>
    </tbody>
  </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- <div id="fh5co-hotel-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img id="Profile-Picture" src = "images\blank-profile-picture.jpg" width="250" height = "300">
                    <div class="row">
                        <div class="col-md-12">
                          <button id="Change-Profile-Picture"> Change Picture </button>
                       </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <p> First Name: </p><br>
                    <p> Last Name: </p><br>
                    <p> Email: </p><br>
                    <p> Country: </p><br>
                </div>
            </div>
        </div>
    </div> -->


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

</body>
</html>