<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<!-- Za3'rat lel kemya ya beeeeeh -->


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
	
	<div class="fh5co-parallax" style="background-image: url(images/help.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center">Support Center</h1>
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
						<h2>Client Services</h2>
					</div>
				</div>
			</div>

			<div id="tabs">
			<nav class="tabs-nav">
					<a href="#" class="active" data-tab="tab1">
                    <img id="News" src="images\inquiry.png" width="50" height="50">
						<span>Reply To Inquiry</span>
					</a>
					<a href="#" data-tab="tab2">
                    <img id="News" src="images\news.png" width="50" height="50">
						<span>Send newswire</span>
					</a>
                </nav>
                <div class="tab-content-container">
					<div class="tab-content active show" data-tab-content="tab1">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h3 class="heading">Replying To Inquiry</h3>
									<form action="" method="post">
                                     <div class="form-group">
                                        <label for=Emails>Please select an email to write reply to </label>
                                    <select id="Emails" class="form-control" name="email">
                                        <option value="Email 1">Ramez1700124@miuegypt.edu.eg</option>
                                        <option value="Email 2">Khaled1701294@miuegypt.edu.eg</option>
                                        <option value="Email 3">Ahmed1700299@miuegypt.edu.eg</option>
                                        <option value="Email 4">Nour179123@miuegypt.edu.eg</option>
                                    </select> 
                                    </div>

                                    <div class="form-group">
                                    <label for="staticinquiry">User's Inquiry</label>
                                    <input type="text" readonly class="form-control " id="staticEmail2" value="I would like to ask if you like this form please submit your answer quickly">
                                    </div>

                                    <div class="form-group">
                                    <textarea class="form-control form-control-lg" id="Reply" placeholder="Please write your reply..." rows="5"cols="20"></textarea>
                                    </div>

									<p class="service-hour">
										<span>Submit reply</span>
                                    </p>
									<button type="submit" class="btn btn-primary mb-2">Submit</button>
                                    </form>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" data-tab-content="tab2">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h3 class="heading">Send NewsWire</h3>
									<form action="" method="post">
                                    <div class="form-group">
                                    <textarea class="form-control form-control-lg" id="Reply" placeholder="Please write news to be sent to all subscribed mails" rows="10"></textarea>
                                    </div>

									<p class="service-hour">
										<span>Send news</span>
                                    </p>
									<button type="submit" class="btn btn-primary mb-2">Send</button>
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

</body>
</html>