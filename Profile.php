<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->



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
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
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

<script type="text/javascript">
    function showsec(y) {
        idarr = ["tab1", "tab2", "tab3", "tab4"]

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
    require_once("app/model/hotelmodel.php");
    require_once("app/controller/HotelController.php");
    require_once("app/view/HotelView.php");
    $model=new Hotel();
    $controller=new HotelController($model);
    $controller->listhoteldata();
    $hotelview=new HotelView($controller,$model);
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
                <div class="container">    
                    <div id="tabs">
                        <nav class="tabs-nav">
                            <a href="#" class="active" data-tab="tab1" onclick="showsec('tab1')">
                                <img id="Profile" src="images\profile.png" width="50" height="50">
                                <span>Personal Info</span>
                            </a>
                            <a href="#" data-tab="tab2" onclick="showsec('tab2')">
                                <img id="History" src="images\clock.png" width="50" height="50">
                                <span>History</span>
                            </a>
                            <a href="#" data-tab="tab3" onclick="showsec('tab3')">
                                <img id="QnA" src="images\QnA.png" width="50" height="50">
                                <span>Questions and Answers</span>
                            </a>
                            <a href="#" data-tab="tab4" onclick="showsec('tab4')">
                                <img id="Reservations" src="images\reservation.png" width="50" height="50">
                                <span>Reservations</span>
                            </a>
                        </nav>
                        <div class="tab-content-container">
                            <div class="tab-content active show" data-tab-content="tab1" id="tab1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img id="Profile-Picture" src="images\blank-profile-picture.jpg" width="250" height="300">
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
                                            <p> Country: Westeros</p>
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
                            <div class="tab-content" data-tab-content="tab3" id="tab3">
                                <div class="container">
                                    <h2>Asked questions</h2>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>19/12/2017</td>
                                                <td>Here goes the question</td>
                                                <td>Here goes the answer</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <p> Want to ask another question?. Enter your question here:</p>
                                    <textarea class="form-control" rows="3"></textarea>
                                    <button class="btn btn-primary mb-2" style="margin-top: 20px;">Send Question</button>
                                </div>
                            </div>

                            <div class="tab-content" data-tab-content="tab4" id="tab4">
                                <div class="container">
                                    <h2>Current/Upcoming reservations</h2>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Type of reservation</th>
                                                <th>Date in</th>
                                                <th>Date out</th>
                                                <th>Notes</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Hotel</td>
                                                <td>14/3/2018</td>
                                                <td>17/3/2018</td>
                                                <td>Winter Palace, Luxor, 1 Double rooms</td>
                                                <td>
                                                    <button class="btn btn-danger">Cancel Reservation</button>
                                                    <button class="btn btn-success">Track Reservation</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
