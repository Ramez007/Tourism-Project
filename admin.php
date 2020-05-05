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
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>

    <script>
        function hide(jquery) {
            var idarr = ["tab1", "tab2","tab3","tab4","tab5"];
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
            var idarr = ["tab1", "tab2","tab3","tab4","tab5"]
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
  <?php
    session_start();
    if (isset($_SESSION['type']))
    {
        if ($_SESSION['type']!="ADMIN")
        {
            header("Location:UNOADMIN.php");
        }
    }
    else
    {
        header("Location:UNOADMIN.php");
    }

    require_once("app/model/hotelmodel.php");
    require_once("app/controller/HotelController.php");
    require_once("app/view/HotelView.php");
    $model=new Hotel();
    $controller=new HotelController($model);
    $controller->listhoteldata();
    $hotelview=new HotelView($controller,$model);


    require_once("app/model/AdminModel.php");
    require_once("app/controller/AdminController.php");
    require_once("app/view/AdminView.php");

    $adminModel = new Admin();
    $AdminController = new AdminController($adminModel);
    $AdminView = new AdminView($AdminController,$adminModel);

    if (isset($_POST['saveAddingHotel']))
	{
		$AdminController->Addhotel();
    }

    if (isset($_POST['submit-edit-hotel']))
    {
        $AdminController->Edithotel();
    }

    if (isset($_POST['SubmitAddPackage']))
    {
        $AdminController->AddPackage();
    }
    if (isset($_POST['SubmitEditPackage']))
    {
        $AdminController->EditPackage();
    }
    if (isset($_POST['saveditreviews']))
	{
		$AdminController->EditReviews();
    }
    
    if (isset($_POST['saveeditfeaturedhotels']))
	{
		$AdminController->EditFeaturedHotels();
    }

    if (isset($_POST['saveeditmainslider']))
	{
		$AdminController->EditFeaturedMainSilder();
    }

    if (isset($_POST['saveaddevent']))
	{
		$AdminController->AddEvent();
    }

    if (isset($_POST['saveeditevent']))
	{
		$AdminController->EditEvent();
    }

    if (isset($_POST['suspendevents']))
	{
		$AdminController->SuspendEvent();
    }

    if (isset($_POST['confirmbook']))
	{
		$AdminController->ConfirmBook();
    }

    if (isset($_POST['suspendpac']))
	{
		$AdminController->SuspendPackage();
    }

    if (isset($_POST['suspendhtl']))
	{
		$AdminController->SuspendHotel();
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
	
	<div class="fh5co-parallax" style="background-image: url(images/admin.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center">Welcome to admin page</h1>
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
						<h2>Edit Services</h2>
					</div>
				</div>
			</div>

			<div id="tabs">
			    <nav class="tabs-nav">
					<a href="#" class="active" onclick="ShowTab('tab1')" data-tab="tab1">
                    <img id="News" src="images\reservation1.png" width="50" height="50">
					<span>Reservations</span>
					</a>
					<a href="#"  onclick="ShowTab('tab2')" data-tab="tab2">
                    <img id="News" src="images\hotel.png" width="50" height="50">
					<span>Hotels</span>
					</a>
                    <a href="#"  onclick="ShowTab('tab3')" data-tab="tab3">
                    <img id="News" src="images\box.png" width="50" height="50">
					<span>Packages</span>
					</a>
                    <a href="#"  onclick="ShowTab('tab4')" data-tab="tab4">
                    <img id="News" src="images\about-us.png" width="50" height="50">
					<span>About us content</span>
					</a>
                    <a href="#"  onclick="ShowTab('tab5')" data-tab="tab5">
                    <img id="News" src="images\home.png" width="50" height="50">
					<span>Mainpage content</span>
					</a>
                    <!-- <a href="#"  onclick="ShowTab('tab6')" data-tab="tab6">
                    <img id="News" src="images\mail.png" width="50" height="50">
					<span>Contact page content</span>
					</a> -->
                </nav>
                <!-- end of the nav tabs -->

                <div class="tab-content-container">
					<div class="tab-content active show" id="tab1" data-tab-content="tab1">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
                                    <h3 class="text-center">Pending Reservations</h3>
                                    <h4><strong>Hotels Pending Reservations</strong></h4>
                                    <?php $AdminView->output();?>
                                    <h4><strong>Packages Pending Reservations</strong></h4>
                                    <?php $AdminView->OutofPendingPackagesReservations();?>

								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" id="tab2" data-tab-content="tab2">
						<div class="container">
							<div class="row">
								<div class="col-md-12">

                                    <h3 class="text-center" >Hotels</h3>
                                    <hr style="border-top: 1px solid black">

                        

                                    <!-- Add Hotel SubSection -->
                                    <div id="add-hotel-subsec">
                                        <h4 class="text-center">Add Hotel</h4>
                                        <form action="" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="enterhotel">Enter Hotel Name</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="enterhotel" minlength="3" pattern="[A-Za-z0-9]+" title="No Special Charcters" placeholder="Hotel Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="enterlocation">Enter Hotel Location</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="enterlocation" pattern=".{4,}" title="Four or more characters" placeholder="Hotel Name"required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Hotel Number Of Single Rooms</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min='1' max='150' name="numberofsingle" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Price Of Single Rooms</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min='1' name="priceofsingle" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Hotel Number Of Double Rooms</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min='1' max='100' name="numberofdouble" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Price Of Double Rooms</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min='1' name="priceofdouble" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Hotel Number Of Triple Rooms</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min='1' max='75' name="numberoftriple" placeholder="1" required >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Price Of Triple Rooms</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min='1'  name="priceoftriple" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Hotel Number Of Suites</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min='1' max='50' name="numberofsuites" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Price Of Suites</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min='1' name="priceofsuites" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div id="checkboxes">
                                                <label>Enter List of services offered by the hotel</label>
                                                <ul>
                                                    <li><input type="checkbox" name="check_list[]" Value="Wifi"> Wifi</li>
                                                    <li><input type="checkbox" name="check_list[]" Value="Gym"> Gym</li>
                                                    <li><input type="checkbox" name="check_list[]" Value="Bar"> Bar</li>
                                                    <li><input type="checkbox" name="check_list[]" Value="Spa"> Spa</li>
                                                    <li><input type="checkbox" name="check_list[]" Value="Swimming Pool"> Swimming Pool</li>
                                                    <li><input type="checkbox" name="check_list[]" Value="Restaurant"> Resturant</li>
                                                    <li><input type="checkbox" name="check_list[]" Value="Pets"> Pets</li>
                                                </ul>
                                            </div>
                                            <div id="stars">
                                                <label>Enter Hotel Stars</label><br>
                                                <input type="radio" name="hotelstars" value="1"> 1 <br>
                                                <input type="radio" name="hotelstars" value="2"> 2 <br>
                                                <input type="radio" name="hotelstars" value="3"> 3 <br>
                                                <input type="radio" name="hotelstars" value="4"> 4 <br>
                                                <input type="radio" name="hotelstars" value="5"> 5 <br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="hoteldescription">Enter Hotel Description</label>
                                                <textarea class="form-control" id="hoteldescription" rows="4" name="description" placeholder="Enter text here..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="hoteloverview">Enter Hotel Overview</label>
                                                <textarea class="form-control" id="hoteloverview" rows="4" name="overview" placeholder="Enter text here..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="fileToUpload">Upload Gallery of Hotel</label>
                                                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                                            </div>
                                            <br><br>
                                            <input class="btn btn-primary mb-2" type="submit" name="saveAddingHotel" value="Save Hotel">
                                        </form>  
                                    </div>
                        <!-- end add hotel subsection   -->

                                    <br><br>
                                    <hr style="border-top: 1px solid black">
                                    <!-- Edit Hotel Subsection -->
            
                                    <div id="edit-hotel-subsec">
                                        <form action="" method="post">
                                            <h4 class="text-center">Edit Hotel</h4>
                                            <?php $AdminView->ReadEditHotels(); ?>
                                            <input class="btn btn-primary mb-2" type="submit" name='submit-edit-hotel' value="Save Editing Hotel">

                                            <script>

                                            document.getElementById("hotels-editing-dropdown").addEventListener("change",function(){
                                                var res=document.getElementById("hotels-editing-dropdown").value.split("&");
                                                document.getElementById("edithotelname").value=res[0];
                                                document.getElementById("edithotellocation").value=res[1];
                                                var inputs = document.querySelectorAll('.check'); 
                                                var val=2;
                                                for (var i = 0; i < inputs.length; i++) {
                                                    if(res[val]=="TRUE")
                                                    { 
                                                    inputs[i].checked = true;
                                                    }
                                                    else
                                                    {
                                                    inputs[i].checked=false;
                                                    }
                                                    val++
                                                } 
                                                document.getElementById("edithoteldescription").value=res[9];
                                                document.getElementById("edithoteloverview").value=res[10];
                                                document.getElementById("HotelId").value=res[11];
                                                document.getElementById("pricesingle").value=res[12];
                                                document.getElementById("pricedouble").value=res[13];
                                                document.getElementById("pricetriple").value=res[14];
                                                document.getElementById("pricesuites").value=res[15];

                                                
                                                if(res[16]=="1")
                                                {
                                                    document.getElementById("s1").checked=true;
                                                }
                                                else if (res[16]=="2")
                                                {
                                                    document.getElementById("s2").checked=true;  
                                                }
                                                else if (res[16]=="3")
                                                {
                                                    document.getElementById("s3").checked=true;  
                                                }
                                                else if (res[16]=="4")
                                                {
                                                    document.getElementById("s4").checked=true;  
                                                }
                                                else if (res[16]=="5")
                                                {
                                                    document.getElementById("s5").checked=true;  
                                                }
                                                
                                                
                                                });
                                                
                                            
                                            </script>
                                        </form>        
                                    </div>   
                        <!-- End Edit Hotel Subsection -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- Suspend Hotel Section -->
                                    <div id="suspend-hotel-sec">
                                        <h4 class="text-center">Suspend Hotels</h4>
                                        <form action="" method="post">
                                        <div id="checkboxes">
                                            <label>Select Hotels To Suspended</label>
                                            <?php $AdminView->ReadSuspendHotels(); ?>
                                        </div>
                                        <br><br>
                                        <input type="submit" class="btn btn-primary mb-2" value="Save Suspension" name="suspendhtl">
                                        </form>
                                    </div>    

								</div>
							</div>
						</div>
					</div>
                    <div class="tab-content" id="tab3" data-tab-content="tab3">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
                                    <h3 class="text-center" >Packages</h3>
                                    <hr style="border-top: 1px solid black">
                                    <!-- Add Package SubSection -->
                                    <div id="add-package-subsec">
                                        <h4 class="text-center">Add Package</h4>
                                        <form action="" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Enter Package Name</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="packagename" name="packagename" pattern=".{4,}" title="Four or more characters" placeholder="Package Name ..." required>
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Enter Package Number of Days</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min="1" id="numberofdays" name="numberofdays" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Enter Package Number of Nights</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min="1" id="numberofnights" name="numberofnights" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Enter Package Reserve Limit</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min="1" id="reservelimit" name="reservelimit" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Enter Package Total Price/Person</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min="100" id="totalprice" name="totalprice" placeholder="1" required>
                                                </div>
                                            </div>
                                            <div class="input-field">
                                                <label>Start Date</label>
                                                <input type="text" class="form-control" data-date-format="yyyy-mm-dd" id="date-start" name="date-start" required >
                                            </div>
                                            <div class="input-field">
                                                <label>End Date</label>
                                                <input type="text" class="form-control" data-date-format="yyyy-mm-dd" id="date-end" name="date-end" required>
                                            </div>
                                            <div id="checkboxes">
                                                <label>Enter List of services offered</label>
                                                <ul>
                                                    <li><input type="checkbox" name="pkg_service[]" value="trans"> Transportation</li>
                                                    <li><input type="checkbox" name="pkg_service[]" value="guide"> Tour Guide</li>
                                                    <li><input type="checkbox" name="pkg_service[]" value="map"> Tourist Map</li>
                                                </ul>
                                            </div>                
                                            <div class="boardtype">
                                                <input type="radio" name="boardtype" value="Full"> Full Board <br>
                                                <input type="radio" name="boardtype" value="Half"> Half Board<br>
                                            </div>

                                               

                                            <div class="assigncruise">
                                                <label for="">Assign Cruise</label><br>
                                                <input type="radio" name="cruise" value="None"> None <br>
                                                <?php $AdminView->ReadCruises(); ?>
                                            </div>

                                            <!-- readhotelshere -->
                                            <div class="assignhotel">
                                                <label for="">Assign Hotel</label><br>
                                                <?php $AdminView->ReadHotels(); ?>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="edithoteldescription">Enter Package Visits/Details</label>
                                                <textarea class="form-control" id="edithoteldescription" name="addpackagedescription" rows="4"  Placeholder="Enter Text Here..." required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="edithoteldescription">Enter Package overview</label>
                                                <textarea class="form-control" id="edithoteldescription" name="addpackageoverview" rows="4"  Placeholder="Enter Text Here..." required></textarea>
                                            </div>
                                            <label for="fileToUpload">Upload Pictures</label>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <br><br>
                                            <input type="submit"  class="btn btn-primary mb-2" value="Save Package" name="SubmitAddPackage">
                                        </form>
                                    </div>
                                    <hr style="border-top: 1px solid black">
                                    <!-- Edit Package SubSection -->
                                    <div id="edit-package-subsec">
                                        <h4 class="text-center">Edit Package</h4>
                                        <form action="" method="post">
                                            <?php $AdminView->ReadEditPackages(); ?>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Editing Package" name="SubmitEditPackage">
                                            <script>
                                            document.getElementById("Packages-editing-dropdown").addEventListener("change",function(){
                                                var res1=document.getElementById("Packages-editing-dropdown").value.split("&");
                                                document.getElementById("packagetitle").value=res1[0];
                                                document.getElementById("packagedays").value=res1[7];
                                                document.getElementById("packagenights").value=res1[8];
                                                document.getElementById("packagelimit").value=res1[1];
                                                document.getElementById("packageprice").value=res1[2];
                                                document.getElementsByName("edit-date-start")[0].value=res1[11];
                                                document.getElementsByName("edit-date-end")[0].value=res1[9];
                                                document.getElementById("packagedetails").value=res1[10];
                                                document.getElementById("packageID").value=res1[14];
                                                document.getElementById("editpackageoverview").value=res1[15];
                                                
                                                document.getElementById(res1[13]).checked=true;

                                                

                                                if(res1[6]=="Full")
                                                {
                                                    document.getElementById("full").checked=true;
                                                    // document.getElementById("half").checked=false;
                                                }
                                                else
                                                {
                                                    // document.getElementById("full").checked=false;
                                                    document.getElementById("half").checked=true;
                                                }

                                                if(res1[12]=="empty")
                                                {
                                                    document.getElementById("cruisenone").checked=true;
                                                    // document.getElementById("cruischeck").checked=false;
                                                    // document.getElementsByName("cruise").checked=false;
                                                }
                                                else
                                                {
                                                    // alert(res1[12]);
                                                    
                                                    var x = parseInt(res1[12]);
                                                    document.getElementById(x).checked=true;
                                                    // document.getElementById("cruisenone").checked=false;
                                                }
                                                
                                                var inputsp = document.querySelectorAll('.checkp'); 
                                                var valp=3;
                                                for (var i = 0; i < inputsp.length; i++) 
                                                {
                                                    if(res1[valp]=="TRUE")
                                                    { 
                                                    inputsp[i].checked = true;
                                                    }
                                                    else
                                                    {
                                                    inputsp[i].checked=false;
                                                    }
                                                    valp++
                                                } 
                                                
                                                
                                                
                                                // var y = res1[13];
                                                // var yy = y.toString();
                                                // var z = "+h";
                                                // var hid = yy.concat(z);
                                                // var n = hid.toString();
                                                // alert(n);
                                                
                                                
                                                });
                                                
                                            </script>
                                        </form>  
                                    </div>
                                    <!-- end edit Package subsection   -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- Suspend Pakage Section -->
                                    <div id="suspend-package-sec">
                                        <h4 class="text-center">Suspend Pacakges</h4>
                                        <form action="" method="post">
                                            <div id="checkboxes">
                                                <label>Select Packages To Be Suspended</label>
                                                <?php $AdminView->ReadSuspendPackages(); ?>
                                            </div>
                                            <br><br>
                                            
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Suspension" name="suspendpac">
                                        </form>
                                    </div>    

                                    <!-- end of packages -->
								</div>
							</div>
						</div>
					</div>
                    <div class="tab-content" id="tab4" data-tab-content="tab4">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
                                    <h3 class="text-center" >Edit About us Page Content</h3>
                                    <hr style="border-top: 1px solid black">
                                    <!-- Add event section -->
                                    <div id="add-event-sec">
                                        <h4 class="text-center">Add Events</h4>
                                        <form action="" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Enter Event Title</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="eventtitle" pattern=".{4,}" title="Four or more characters" name="eventtitle" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Enter Event Month</label>
                                                <div class="col-sm-3" >
                                                    <input type="text" class="form-control" data-toggle="tooltip" title="Only 3 Charcters For Example: SEP" maxlength="3" id="eventmonth" name="eventmonth" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Enter Event Year</label>
                                                <div class="col-sm-3">
                                                    <input type="number" min="1900" max="3000" class="form-control" id="eventyear" name="eventyear" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Event Details</label>
                                                <textarea rows="4" class="form-control" name="eventpost" id="eventpost" placeholder="Enter text here" required></textarea>
                                            </div>
                                            <br><br><br> Upload Photo of Event <br>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Event" name="saveaddevent">
                                        </form>        
                                    </div>
                                    <!-- end event section -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- Edit Event Section -->
                                    <div id="edit-event-sec">
                                        <h4 class="text-center">Edit Events</h4>
                                        <form action="" method="post">
                                            <?php $AdminView->ReadEditEvents(); ?>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Editing Event" name="saveeditevent">
                                            <script>
                                            document.getElementById("events-editing-dropdown").addEventListener("change",function(){
                                                var res1=document.getElementById("events-editing-dropdown").value.split("&");
                                                document.getElementById("editeventtitle").value=res1[0];
                                                document.getElementById("editeventmonth").value=res1[1];
                                                document.getElementById("editeventyear").value=res1[2];
                                                document.getElementById("blogposttext").value=res1[3];
                                                document.getElementById("postid").value=res1[4];
                                                
                                                });
                                                
                                            </script>
                                        </form>        
                                    </div>
                                    <!-- end edit event section -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- suspend Event Section -->
                                    <div id="suspend-event-sec">
                                        <h4 class="text-center">Suspend Events</h4>
                                        <form action="" method="post">
                                            <div id="checkboxes">
                                                <label for="deletevent">Select Events To Be Suspended</label>
                                                <?php $AdminView->ReadSuspendEvents(); ?>
                                            </div>
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Suspension" name="suspendevents">
                                        </form>
                                    </div>    
								</div>
							</div>
						</div>
					</div>
                    <div class="tab-content" id="tab5" data-tab-content="tab5">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
                                    <h3 class="text-center" >Edit Main Page Content</h3>
                                    <hr style="border-top: 1px solid black">
                                    <!-- editing main slider section -->
                                    <div id="edit-main-slider">
                                        <form action="" method="post">
                                            <div id="checkboxes">
                                                <label>Select Three Hotels To Be Feautred in Main Slider</label>
                                                <?php $AdminView->ReadMainSliderHotels(); ?>
                                            </div>
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Changes" name="saveeditmainslider">
                                        </form>    
                                    </div>
                                    <!-- end editing main slider section -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- editing featured hotels section -->
                                    <div id="edit-featured-hotels-section">
                                        <form action="" method="post">
                                            <div id="checkboxes">
                                                <label>Select One Hotel To Be Shown in Featured Hotels Section's Header in Main Page</label>
                                                <?php $AdminView->ReadFeaturedHotels(); ?>
                                            </div>
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Changes" name="saveeditfeaturedhotels">
                                        </form>
                                    </div>
                                    <!-- end editing featured hotels section -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- editing happy customer says section -->
                                    <div id="edit-reviews-section">
                                        <form action="" method="post">
                                            <div id="checkboxes">
                                                <label>Select Three Reviews To Be Shown in Reviews Section in Main Page</label>
                                                <ul>
                                                    <?php $AdminView->ReadPReviews(); ?>
                                                    <?php $AdminView->ReadHReviews(); ?>
                                                </ul>
                                            </div>
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Changes" name="saveditreviews">
                                        </form>
                                    </div>
                                    <!-- end editing happy customer says section -->
								</div>
							</div>
						</div>
					</div>
                    <!-- <div class="tab-content" id="tab6" data-tab-content="tab6">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
                                    <h3 class="text-center" >Edit Contact Page Content</h3>
                                    <hr style="border-top: 1px solid black">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="editaddress">Edit Address</label>
                                            <textarea rows="4" class="form-control" name="comment" form="usrform">7 Ali Ibn Abi Taleb Street, Luxor, Egypt</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="editmessage">Edit Address Message</label>
                                            <textarea rows="4" class="form-control" name="comment" form="usrform">We would be delighted to have you in our headquarters.</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="editemail">Edit Email</label>
                                            <textarea rows="4" class="form-control" name="comment" form="usrform">info@speedotours.com</textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary mb-2" value="Save Changes">
                                    </form>
								</div>
							</div>
						</div>
					</div> -->

                <!-- end of data content class -->
				</div>				
            <!-- end of tabs class -->
			</div>
        <!-- end of container -->
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

    <script src="js/sweetalert.min.js"></script>

	<script src="js/custom.js"></script>

    <script>
        var limit = 4;
        var limit2 = 3;
        var limit3 = 2;
                $('input.single-checkbox').on('change', function(evt) {
                if($("input[id='hotelscheck']:checked").length >= limit) {
                    this.checked = false;
                }
                });

                $('input.single-checkbox').on('change', function(evt) {
                if($("input[id='fhotelcheck']:checked").length >= limit2) {
                    this.checked = false;
                }
                });

                $('input.single-checkbox').on('change', function(evt) {
                if($("input[id='reviewcheck']:checked").length >= limit) {
                    this.checked = false;
                }
                });

                $('input.single-checkbox').on('change', function(evt) {
                if($("input[id='headerhotelcheck']:checked").length >= limit3) {
                    this.checked = false;
                }
                });
    </script>

</body>
</html>