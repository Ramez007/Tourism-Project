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
		include_once "dbconnection.php";
		session_start();
		if (isset($_POST['submit']))
		{
			$user=$_POST['username'];
			$pass=$_POST['password'];
			if ($_POST['Selectjob']=="Admin")
			{
				$sql="SELECT * From employees where Username='$user'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				if ($row['JobType']=="ADMIN")
				{
				$_SESSION["ID"]=$row["EmployeeID"];
				$_SESSION["Name"]=$row['Name'];
				$_SESSION["type"]=$row['JobType'];
				$_SESSION["Email"]=$row['Email'];
				header ("Location:Admin.php");
				}
				else
            	{
                echo '<script> alert("Invalid Username or Password") </script>';
           		}
			}
			else if ($_POST['Selectjob']=="Support")
			{
				$sql="SELECT * From employees where Username='$user'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				if ($row['JobType']=="SUPPORT")
				{
				$_SESSION["ID"]=$row["EmployeeID"];
				$_SESSION["Name"]=$row['Name'];
				$_SESSION["type"]=$row['JobType'];
				$_SESSION["Email"]=$row['Email'];
				header ("Location:Support.php");
				}
				else
            	{
                echo '<script> alert("Invalid Username or Password") </script>';
           		}
			}
			else if ($_POST['Selectjob']=="Guest")
			{
				$sql="SELECT* FROM guest where Username='$user'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$_SESSION["ID"]=$row["GuestID"];
				$_SESSION["fname"]=$row["FirstName"];
				$_SESSION["lname"]=$row["LastName"];
				$_SESSION["Email"]=$row["Email"];
				$_SESSION["Gender"]=$row["Gender"];
				$_SESSION["type"]="USER";
				header ("Location:Profile.php");
				
			}
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
					
						<form class="box" action = "" method ="post">
							<h1 style="color:Black"><b>Login Form</b></h1>
							<input type ="text" name= "username" placeholder ="username">
							<input type ="password" name= "password" placeholder ="password">
							<select class ="Select" name="Selectjob" id="Select">
							<option value="0"> Select Login Type </option>
								<option value="Admin"> Admin </option>
								<option value="Support"> Support Center </option>
								<option value="Guest"> Guest </option>
							</select>
							<input type ="submit" name= "submit" value ="login">
							<p style="color: Black;"><b>Do not have an account?</b></p><a href="Signup.php" style="color: Orangered;">Sign up here!</a>
						</form>
						
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