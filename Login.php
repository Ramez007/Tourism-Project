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
    <link rel="stylesheet" href="css/Login.css">
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
	<?php
		require_once("app/model/user.php");
		require_once("app/controller/UserController.php");
		require_once("app/view/login_view.php");
		$usermodel = new User();
		$usercontrol = new UserController($usermodel);
		// $loginview=new ViewLogin($usercontrol, $usermodel);
		session_start();

		if (isset($_POST['submit']))
		{
			$usercontrol->login();
			
		}

		
		require_once("app/model/hotelmodel.php");
		require_once("app/controller/HotelController.php");
		require_once("app/view/HotelView.php");
		$model=new Hotel();
		$controller=new HotelController($model);
		$controller->listhoteldata();
		$controller->updaterooms();
		$hotelview=new HotelView($controller,$model);
		?>

		
		<?php

		//index.php

		//Include Configuration File
		include('configapi.php');

		$login_button = '';

		//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
		if(isset($_GET["code"]))
		{
			//It will Attempt to exchange a code for an valid authentication token.
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

			//This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
			if(!isset($token['error']))
			{
				//Set the access token used for requests
				$google_client->setAccessToken($token['access_token']);

				//Store "access_token" value in $_SESSION variable for future use.
				$_SESSION['access_token'] = $token['access_token'];

				//Create Object of Google Service OAuth 2 class
				$google_service = new Google_Service_Oauth2($google_client);

				//Get user profile data from google
				$data = $google_service->userinfo->get();

				//Below you can find Get profile data and store into $_SESSION variable
				if(!empty($data['given_name']))
				{
				$_SESSION['fname'] = $data['given_name'];
				$_SESSION["type"]="USER";
				}

				if(!empty($data['family_name']))
				{
				$_SESSION['lname'] = $data['family_name'];
				}

				if(!empty($data['email']))
				{
				$_SESSION['Email'] = $data['email'];
				}

				//   if(!empty($data['gender']))
				//   {
				//    $_SESSION['user_gender'] = $data['gender'];
				//   }

				if(!empty($data['picture']))
				{
					$_SESSION['user_image'] = $data['picture'];
				}
			}
		}

		//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
		if(!isset($_SESSION['access_token']))
		{
		//Create a URL to obtain user authorization
		$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="sign-in-with-google.png" style="width: 250px;margin-top: -103px;"></a>';
		
		}

		?>
</head>
<body> 
	<div id="fh5co-wrapper">
	<div id="fh5co-page">
	<div id="fh5co-header">
			

		<header id="fh5co-header-section">
			<div class="container">
				<div class="nav-header">
					<!-- <div>
				<img id="LogoImg" src="WebAppLogo.png" alt="Flowers in Chania" width="300" height="200">
				</div> -->
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
							<li><a href="SignUp.php">Register</a></li>
							

							
						</ul>
					</nav>
				</div>
			
			</div>
		</header>



		
	</div>

	<div class="fh5co-parallax" style="background-image: url(images/packagehomepic.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center">Login Here!</h1>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="fh5co-hotel-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="wrapper">
						<div id="mydivform">
						<form class="box" action = "" method ="post">
							<h1 style="color:Black"><b>Login Form</b></h1>
							<input type ="text" name= "username" placeholder ="username" required>
							<input type ="password" name= "password" placeholder ="password" required>
							<input type ="submit" name= "submit" value ="login">
							<p style="color: Black;"><b>Do not have an account?</b></p><a href="Signup.php" style="color: Orangered;">Sign up here!</a>
						</form>
						</div>

						<?php
						if($login_button == '')
						{
							
							// echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
							// echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
							// echo '<h3><b>Name :</b> '.$_SESSION['fname'].' '.$_SESSION['lname'].'</h3>';
							// echo '<h3><b>Email :</b> '.$_SESSION['Email'].'</h3>';
							// echo '<h3><a href="logout.php">Logout</h3></div>';
							$usercontrol->login_with_G();
							// echo $_SESSION['ID'];
							// header ("Location:http://localhost/testapi/test.php");
							// header ("Location:Admin.php");
							echo'<script>
							var x = document.getElementById("mydivform");
							if (x.style.display === "none") {
								x.style.display = "block";
							} else {
								x.style.display = "none";
							}
							
							</script>';
							echo '
							<img src="g.png" style="margin-left: 494px;margin-bottom: 20px;" width="150" height="50">
							<h1 class="text-center">Your Login With Google Has Been Succesfull</h1>
							<h2 class="text-center">Click On My Profile Button To Go to your Profile Page</h2>
							<h3 class="text-center"><a href="Profile.php">My Profile</h3></div>';
							
						}
						else
						{
							//echo $_SESSION['fname'];
							echo '<div align="center">'.$login_button . '</div>';
						}
						?>
						
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