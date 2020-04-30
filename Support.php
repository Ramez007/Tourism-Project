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
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
        function hide(jquery) {
            var idarr = ["tab1", "tab2","tab3", "tab4"];
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
            var idarr = ["tab1", "tab2", "tab3" , "tab4"]

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
	<!-- php for mailling -->
<?php

require_once("app/model/Support_model.php");
	require_once("app/controller/SupportController.php");
	require_once("app/view/supportview.php");
			// require_once("app/view/susbcribeview.php");
			$support_operatormodel = new support_operator();
			$suport_operatorcontroller = new Support_operatorController($support_operatormodel);
			// $viewsuccess= new Viewalert($subscribecontrol,$visitormodel);
			if(isset($_POST['submitnewwire']))
			$suport_operatorcontroller->Send_newwire();
			if(isset($_POST['submitreply']))
			$suport_operatorcontroller->Reply_to_Inquiry();
			
			$suport_operatorcontroller->FetchInquiries();
			$supportview=new supportview($suport_operatorcontroller,$support_operatormodel);

?>
<!-- php for mailling end -->
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
                             
                            if ($_SESSION["type"]==="SUPPORT" )
                            {
                                echo "<li><a href='Support.php'>Support center</a></li>";
                                echo "<li><a href='Logout.php'>Log Out</a></li>";
                            }
                            else if ( $_SESSION["type"]==="USER" )
                            {
                                echo "<li><a href='profile.php'>Profile</a></li>";
                                echo "<li><a href='Logout.php'>Log Out</a></li>";
                            }
                            else if ($_SESSION["type"]==="ADMIN")
                            {
                                echo "<li><a href='admin.php'>Admin page</a></li>";
                                echo "<li><a href='logout.php'>Log Out</a></li>";
                            }
                        
                            ?> 

                            
                        </ul>
                    </nav>
                </div>
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
					<a href="#" class="active" onclick="ShowTab('tab1')" data-tab="tab1">
                    <img id="News" src="images\inquiry.png" width="50" height="50">
						<span>Reply To Inquiry</span>
					</a>
					<a href="#"  onclick="ShowTab('tab2')" data-tab="tab2">
                    <img id="News" src="images\news.png" width="50" height="50">
						<span>Send newswire</span>
					</a>
					<!-- new tab to show in the nav change png here in the src -->
					<a href="#"  onclick="ShowTab('tab3')" data-tab="tab3">
                    <img id="News" src="images\news.png" width="50" height="50">
						<span>Send newswire</span>
					</a>
					<a href="#"  onclick="ShowTab('tab4')" data-tab="tab4">
                    <img id="News" src="images\news.png" width="50" height="50">
						<span>Send newswire</span>
					</a>
                </nav>

                <div class="tab-content-container">
					<div class="tab-content active show" id="tab1" data-tab-content="tab1">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h3 class="heading">Replying To Inquiry</h3>
									<!-- first form start--><form action="" method="post">
                                     <div class="form-group">
                                        <label for=Emails>Please select an email to write reply to </label>
                                    <select id="Emails" class="form-control" name="emailinquiry">
        
										<?php 
										$supportview->output();
										?>
                                        
										

                                    </select> 
                                    </div>
										<script>
											

											document.getElementById("Emails").addEventListener("change",function(){
												document.getElementById("staticEmail2").value=document.getElementById("Emails").value.split("&").pop();
											});
											

											function change(jQuery)
											{
												$("#staticEmail2").val()=$("#Emails").val();
											}
											$(document).ready(change);
										
										</script>
                                    <div class="form-group">
									<label for="staticinquiry">User's Inquiry</label>
									
									<?php $supportview->output2();?>                                    
								</div>

                                    <div class="form-group">
                                    <textarea class="form-control form-control-lg" id="Reply" placeholder="Please write your reply..." name="reply" rows="5"cols="20"></textarea>
                                    </div>

									<p class="service-hour">
										<span>Submit reply</span>
                                    </p>
									<button type="submit" class="btn btn-primary mb-2" name="submitreply">Submit</button>
                                    <!-- first form end--></form>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" id="tab2" data-tab-content="tab2">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h3 class="heading">Send NewsWire</h3>
									<!-- second form--><form action="" method="post"> 
                                    <div class="form-group">
                                    <textarea class="form-control form-control-lg" id="news" placeholder="Please write news to be sent to all subscribed mails" name ="news"rows="10"></textarea>
                                    </div>

									<p class="service-hour">
										<span>Send news</span>
                                    </p>
									<button type="submit" class="btn btn-primary mb-2" id="submitnewwire" name="submitnewwire">Send</button>
                                   <!-- Second form end--> </form>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" id="tab3" data-tab-content="tab3">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<!-- Insert some code here -->
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" id="tab4" data-tab-content="tab4">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<!-- Insert some code here -->
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
	include "Footer.php";
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