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
            var idarr = ["tab1", "tab2","tab3","tab4","tab5","tab6"]
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
                    <a href="#"  onclick="ShowTab('tab6')" data-tab="tab6">
                    <img id="News" src="images\mail.png" width="50" height="50">
					<span>Contact page content</span>
					</a>
                </nav>
                <!-- end of the nav tabs -->

                <div class="tab-content-container">
					<div class="tab-content active show" id="tab1" data-tab-content="tab1">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
                                    <h3 class="text-center">Pending Reservations</h3>
                                    <h4>Hotels Pending Reservations</h4>
                                    <?php $AdminView->output();?>
                                    <h4>Packages Pending Reservations</h4>
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
                                                    <input type="text" class="form-control" name="enterhotel" placeholder="Hotel Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="enterlocation">Enter Hotel Location</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="enterlocation" placeholder="Hotel Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Hotel Number of Rooms</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" name="numberofrooms" placeholder="1">
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
                                                    <li><input type="checkbox" name="check_list[]" Value="Resturant"> Resturant</li>
                                                    <li><input type="checkbox" name="check_list[]" Value="Resort"> Resort</li>
                                                    <li><input type="checkbox" name="check_list[]" Value="Pets"> Pets</li>
                                                </ul>
                                            </div>
                                            <div class="form-group">
                                                <label for="hoteldescription">Enter Hotel Description</label>
                                                <textarea class="form-control" id="hoteldescription" rows="4" name="comment" form="usrform" placeholder="Enter text here..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="hoteloverview">Enter Hotel Overview</label>
                                                <textarea class="form-control" id="hoteloverview" rows="4" name="comment" form="usrform" placeholder="Enter text here..."></textarea>
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
                                            
                                            <!-- <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="hotels-editing-dropdown">Choose Hotel To Edit</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control form-control-sm" style="margin-left:-102px;" id="hotels-editing-dropdown">
                                                        <option value="wph">Winter Palace</option>
                                                        <option value="ih">Isis</option>
                                                        <option value="sh">Steinberger</option>
                                                        <option value="eh">Emilio</option>
                                                        <option value="ibh">Iberotel</option>
                                                        <option value="ssh">Sunset</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="edithotelname">Hotel Name</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="edithotelname" value="Winter Palace">
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="edithotellocation">Hotel Location</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="edithotellocation" value="Luxor,Egypt">
                                                </div>
                                            </div>
                                            <div id="checkboxes">
                                                <label>Edit List of services offered by the hotel</label>
                                                <ul>
                                                    <li><input type="checkbox" checked> Wifi</li>
                                                    <li><input type="checkbox" checked> Gym</li>
                                                    <li><input type="checkbox" checked> Bar</li>
                                                    <li><input type="checkbox" checked> Spa</li>
                                                    <li><input type="checkbox" checked> Swimming Pool</li>
                                                    <li><input type="checkbox" checked> Resturant</li>
                                                </ul>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="edithoteldescription">Enter Hotel Description</label>
                                                <textarea class="form-control" id="edithoteldescription" rows="15" name="comment" form="usrform">The Sofitel Winter Palace Hotel, also known as the Old Winter Palace Hotel, is a historic British colonial-era 5-star luxury resort hotel located on the banks of the River Nile in Luxor, Egypt, just south of Luxor Temple, with 86 rooms and 6 suites.
                                                The hotel was built by the Upper Egypt Hotels Co, an enterprise founded in 1905 by Cairo hoteliers Charles Baehler and George Nungovich in collaboration with Thomas Cook & Son (Egypt). It was inaugurated on Saturday 19 January 1907, with a picnic at the Valley of the Kings followed by dinner at the hotel and speeches.[1] The architect was Leon Stienon, the Italian construction company G.GAROZZO & Figli Costruzioni in Cemento Armato, Sistema SIACCI brevettato. During World War I the hotel was temporarily closed to paying guests and employed as a hospice for convalescing soldiers. A regular guest at the hotel from 1907 on was George Herbert, 5th Earl of Carnarvon, better known simply as Lord Carnarvon. Carnarvon was the patron of Egyptologist Howard Carter, who in 1922 discovered the intact tomb of Tutankhamun. After the discovery was announced the Winter Palace played host to the international press corps and foreign visitors there to follow the story. Carter used the hotel's noticeboard to deliver occasional news and information on the discovery. In 1975 the complex was expanded with the construction of the New Winter Palace. The addition, classified as a 3-star hotel, was joined by corridors to the original. It was demolished in 2008. In 1996, the Pavillon, a 4-star annex with 116 rooms, was built in the rear garden of the Winter Palace, close to the swimming pool. The Pavillon shares many amenities with the Winter Palace, including the gardens, pools, tennis courts, terraces and restaurants. The hotel is owned by the Egyptian General Company for Tourism & Hotels ("EGOTH") of Egypt and managed by Accor, a French Hotel company, where it is part of the prime division Sofitel. The Hotel is featured on the exclusive Palace Hotels of the World. The Winter Palace has 5 restaurants. The 1886 Restaurant, which serves French cuisine, is named after the date the hotel inaccurately advertises that it was founded. It and the la Corniche Restaurant (international cuisine) are both located in the historic Palace wing. The Bougainvilliers (international cuisine) is in the Pavilion wing, while the Palmetto (Italian cuisine and snacks) and the El Tarboush (Egyptian cuisine) are in the garden close to the swimming pool.</textarea>
                                            </div>
                                            <a href="#">Show Gallery</a><br>
                                            <div class="form-group">
                                                <label for="fileToUpload">Upload Gallery of Hotel</label>
                                                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                                            </div>
                                            <br><br> -->
                                            <?php $AdminView->ReadEditHotels(); ?>
                                            <input class="btn btn-primary mb-2" type="submit" value="Save Editing Hotel">
                                            <script>

                                            document.getElementById("hotels-editing-dropdown").addEventListener("change",function(){
                                                var res=document.getElementById("hotels-editing-dropdown").value.split("&");
                                                document.getElementById("edithotelname").value=res[0];
                                                document.getElementById("edithotellocation").value=res[1];
                                                if(res[2]==" TRUE ")
                                                {
                                                document.getElementById("wifi").checked=true;
                                                }
                                                else
                                                {
                                                document.getElementById("wifi").checked=false;  
                                                }
                                                if(res[3]==" TRUE ")
                                                {
                                                document.getElementById("gym").checked=true;
                                                }
                                                else
                                                {
                                                document.getElementById("gym").checked=false;  
                                                }
                                                if(res[4]==" TRUE ")
                                                {
                                                document.getElementById("bar").checked=true;
                                                }
                                                else
                                                {
                                                document.getElementById("bar").checked=false;  
                                                }
                                                if(res[5]==" TRUE ")
                                                {
                                                document.getElementById("spa").checked=true;
                                                }
                                                else
                                                {
                                                document.getElementById("spa").checked=false;  
                                                }
                                                if(res[6]==" TRUE ")
                                                {
                                                document.getElementById("pool").checked=true;
                                                }
                                                else
                                                {
                                                document.getElementById("pool").checked=false;  
                                                }
                                                if(res[7]==" TRUE ")
                                                {
                                                document.getElementById("restaurant").checked=true;
                                                }
                                                else
                                                {
                                                document.getElementById("restaurant").checked=false;  
                                                }
                                                document.getElementById("edithoteldescription").value=res[8];
                                                document.getElementById("edithoteloverview").value=res[9];
                                                });
                                                
                                            
                                            </script>
                                        </form>        
                                    </div>   
                        <!-- End Edit Hotel Subsection -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- Suspend Hotel Section -->
                                    <div id="suspend-hotel-sec">
                                        <h4 class="text-center">Suspend Hotels</h4>
                                        <div id="checkboxes">
                                            <label>Select Hotels To Suspended</label>
                                            <ul>
                                                <li><input type="checkbox"> Winter palace</li>
                                                <li><input type="checkbox"> Isis</li>
                                                <li><input type="checkbox"> Stienberger</li>
                                                <li><input type="checkbox"> Iberotel</li>
                                                <li><input type="checkbox"> Emilio</li>
                                                <li><input type="checkbox"> Sunset</li>
                                            </ul>
                                        </div>
                                        <br><br>
                                        <input type="submit" class="btn btn-primary mb-2" value="Save Suspension">
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
                                        <form action="">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="packagename">Enter Package Name</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="packagename" placeholder="Package Name ...">
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofdays">Enter Package Number of Days</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="numberofdays" placeholder="1">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofdays">Enter Package Number of Nights</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="numberofnights" placeholder="1">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="reservelimit">Enter Package Reserve Limit</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="reservelimit" placeholder="1">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="totalprice">Enter Package Total Price</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="totalprice" placeholder="1">
                                                </div>
                                            </div>
                                            <div class="input-field">
                                                <label for="date-start">Start Date</label>
                                                <input type="text" class="form-control" id="date-start" />
                                            </div>
                                            <div class="input-field">
                                                <label for="date-start">End Date</label>
                                                <input type="text" class="form-control" id="date-start" />
                                            </div>
                                            <div id="checkboxes">
                                                <label>Enter List of services offered</label>
                                                <ul>
                                                    <li><input type="checkbox"> Transportation</li>
                                                    <li><input type="checkbox"> Tour Guide</li>
                                                    <li><input type="checkbox"> Tourist Map</li>
                                                </ul>
                                            </div>                
                                            <div class="boardtype">
                                                <input type="radio" name="boardtype" value="fullboard"> Full Board <br>
                                                <input type="radio" name="boardtype" value="halfboard"> Half Board<br>
                                            </div>
                                            <div class="form-group">
                                                <label for="edithoteldescription">Enter Package Visits/Details</label>
                                                <textarea class="form-control" id="edithoteldescription" rows="4" name="comment" Placeholder="Enter Text Here..." form="usrform"></textarea>
                                            </div>
                                            <label for="fileToUpload">Enter Package Visits/Details</label>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <br><br>
                                            <input type="submit"  class="btn btn-primary mb-2" value="Save Package">
                                        </form>
                                    </div>
                                    <hr style="border-top: 1px solid black">
                                    <!-- Edit Package SubSection -->
                                    <div id="edit-package-subsec">
                                        <h4 class="text-center">Edit Package</h4>
                                        <form action="">
                                            <div class="form-group row">
                                                <label style="margin-left:-275px" for="Packages-editing-dropdown">Choose a Pakage to edit:</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control form-control-sm" style="margin-left:198px;"  id="Packages-editing-dropdown">
                                                        <option value="">Cairo/Ain-Sokhna</option>
                                                        <option value="">Luxor/Aswan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="packagetitle">Edit Package Title</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="packagetitle" value="Cairo/Ain-Sokhna">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="packagedays">Edit Package Number of Days</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="packagedays" value="10">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="packagenights">Edit Package Number of Nights</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="packagenights" value="9">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="packagelimit">Edit Package Reserve Limit</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="packagelimit" value="100">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="packagelimit">Edit Package Total Price</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="packagelimit" value="5000">
                                                </div>
                                            </div>
                                            <div class="input-field">
                                                <label for="date-start">Start Date</label>
                                                <input type="text" class="form-control" id="date-start" value="20/9/2020" />
                                            </div>
                                            <div class="input-field">
                                                <label for="date-start">End Date</label>
                                                <input type="text" class="form-control" id="date-start" value="20/10/2020" />
                                            </div>
                                            <div id="checkboxes">
                                                <label>Edit List of services offered</label>
                                                <ul>
                                                    <li><input type="checkbox" checked> Transportation</li>
                                                    <li><input type="checkbox" checked> Tour Guide</li>
                                                    <li><input type="checkbox" checked> Tourist Map</li>
                                                </ul>
                                            </div>
                                            <div class="boardtype">
                                                <input type="radio" name="boardtype" value="fullboard" checked="checked"> Full Board <br>
                                                <input type="radio" name="boardtype" value="halfboard"> Half Board<br>
                                            </div>
                                            
                                            <label class="col-sm-4 col-form-label" for="packagedetails">Edit Package Visits/Details</label>
                                            <textarea rows="15" class="form-control" id="packagedetails" name="comment" form="usrform">
                                                Day 1: Cairo
                                                Upon arrival at the Cairo International Airport, you will be greeted by a Travco representative and transferred by our deluxe coach to Cairo Marriott Hotel or similar for check in and overnight.

                                                Day 2: Cairo
                                                Enjoy a hearty breakfast at the hotel, before being transferred to Katameya Heights Golf Resort to enjoy one round of Golf (18 holes) and back. The remainder of the day can be spent. Overnight at the hotel.

                                                Day 3: Cairo
                                                Enjoy a hearty breakfast at the hotel, before being transferred to Dream Land Golf Resort to enjoy one round of Golf (18 holes) and back. Overnight at the hotel.

                                                Day 4: Cairo
                                                Enjoy a hearty Breakfast at hotel, and spend a free day at your own pace and leisure. Upon request, we can arrange for you a tour to the Great Pyramids of Giza or the Egyptian Museum. Overnight at hotel.

                                                Day 5: Cairo | Ain Sokhna
                                                Check out after breakfast at the hotel, then drive to Ain Sokhna (100km). Upon arrival, check-in hotel then prepare yourself to enjoy one round of Golf (18 holes) at Sokhna Golf Club. Overnight at the hotel.

                                                Day 6: Ain Sokhna
                                                Enjoy a hearty breakfast at the hotel, before playing one round of Golf (18 holes) at Sokhna Golf Club. Overnight at the hotel.

                                                Day 7: Ain Sokhna | Cairo
                                                Breakfast at the hotel. Enjoy one last round of Golf (18 holes) at Sokhna Golf Club. Check-out from hotel and drive back to Cairo. Upon arrival check-in hotel and overnight.

                                                Day 8: Cairo
                                                Check-out after breakfast and transfer to Cairo International Airport for final departure.
                                            </textarea>                                                        
                                            <br><br><br><a href="#">Show Gallery of Pacakage</a><br>
                                            Update Gallery of Package <br>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Editing Package">
                                        </form>  
                                    </div>
                                    <!-- end edit Package subsection   -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- Suspend Pakage Section -->
                                    <div id="suspend-package-sec">
                                        <h4 class="text-center">Suspend Pacakges</h4>
                                        <div id="checkboxes">
                                            <label>Select Packages To Be Suspended</label>
                                            <ul>
                                                <li><input type="checkbox"> Cairo/Ain-Sokhna</li>
                                                <li><input type="checkbox"> Luxor/Aswan</li>
                                            </ul>
                                        </div>
                                        <br><br>
                                        <input type="submit" class="btn btn-primary mb-2" value="Save Suspension">
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
                                        <form action="">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="eventtitle">Enter Event Title</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="eventtitle" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="eventmonth">Enter Event Month</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="eventmonth">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="eventyear">Enter Event Year</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="eventyear">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="eventdetails">Enter Event Details</label>
                                                <textarea rows="4" class="form-control" name="comment" form="usrform" placeholder="Enter text here"></textarea>
                                            </div>
                                            <br><br><br> Upload Photo of Event <br>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Event">
                                        </form>        
                                    </div>
                                    <!-- end event section -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- Edit Event Section -->
                                    <div id="edit-event-sec">
                                        <h4 class="text-center">Edit Events</h4>
                                        <form action="">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="events-editing-dropdown">Choose an event to edit</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control" id="events-editing-dropdown">
                                                        <option value="">Establishing The Company</option>
                                                        <option value="">Our First Bus</option>
                                                        <option value="">1st Anniversary of Speedo tours</option>
                                                        <option value="">Ten Years Of Experince</option>
                                                        <option value="">Entering The 21st Century</option>
                                                        <option value="">Twenty Years Of Experince</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="editeventtitle">Edit Event Title</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" value="Establishing the company" id="editeventtitle" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="editeventmonth">Edit Event Month</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" value="sep" id="editeventmonth" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="editeventyear">Edit Event Year</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" value="1989" id="editeventyear" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="eventdetails">Edit Event Details</label>
                                                <textarea rows="4" class="form-control" name="comment" form="usrform" placeholder="Enter text here"></textarea>
                                            </div>
                                            <br><br><br> Upload Photo of Event <br>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Editing Event">
                                        </form>        
                                    </div>
                                    <!-- end edit event section -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- suspend Event Section -->
                                    <div id="suspend-event-sec">
                                        <h4 class="text-center">Suspend Events</h4>
                                        <form action="">
                                            <div id="checkboxes">
                                                <label for="deletevent">Select Events To Be Suspended</label>
                                                <ul>
                                                    <li><input type="checkbox"> Establishing The Company</li>
                                                    <li><input type="checkbox"> Our First Bus</li>
                                                    <li><input type="checkbox"> 1st Anniversary of Speedo tours</li>
                                                    <li><input type="checkbox"> Ten Years Of Experince</li>
                                                    <li><input type="checkbox"> Entering The 21st Century</li>
                                                    <li><input type="checkbox"> Twenty Years Of Experince</li>
                                                </ul>
                                            </div>
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Suspension">
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
                                        <form action="">
                                            <div id="checkboxes">
                                                <label>Select Three Hotels To Be Feautred in Main Slider</label>
                                                <ul>
                                                    <li><input class="single-checkbox" name="hotel" type="checkbox" checked> Winter palace</li>
                                                    <li><input class="single-checkbox" name="hotel" type="checkbox"> Isis</li>
                                                    <li><input class="single-checkbox" name="hotel" type="checkbox" checked> Stienberger</li>
                                                    <li><input class="single-checkbox" name="hotel" type="checkbox"> Iberotel</li>
                                                    <li><input class="single-checkbox" name="hotel" type="checkbox" checked> Emilio</li>
                                                    <li><input class="single-checkbox" name="hotel" type="checkbox"> Sunset</li>
                                                </ul>
                                            </div>
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Changes">
                                        </form>    
                                    </div>
                                    <!-- end editing main slider section -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- editing featured hotels section -->
                                    <div id="edit-featured-hotels-section">
                                        <form action="">
                                            <div id="checkboxes">
                                                <label>Select Three Hotels To Be Shown in Featured Hotels Section in Main Page</label>
                                                <ul>
                                                    <li><input class="single-checkbox" name="fhotel" type="checkbox" checked> Winter palace</li>
                                                    <li><input class="single-checkbox" name="fhotel" type="checkbox"> Isis</li>
                                                    <li><input class="single-checkbox" name="fhotel" type="checkbox" checked> Stienberger</li>
                                                    <li><input class="single-checkbox" name="fhotel" type="checkbox"> Iberotel</li>
                                                    <li><input class="single-checkbox" name="fhotel" type="checkbox" checked> Emilio</li>
                                                    <li><input class="single-checkbox" name="fhotel" type="checkbox"> Sunset</li>
                                                </ul>
                                            </div>
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Changes">
                                        </form>
                                    </div>
                                    <!-- end editing featured hotels section -->
                                    <hr style="border-top: 1px solid black">
                                    <!-- editing happy customer says section -->
                                    <div id="edit-reviews-section">
                                        <form action="">
                                            <div id="checkboxes">
                                                <label>Select Three Reviews To Be Shown in Reviews Section in Main Page</label>
                                                <ul>
                                                    <li><input class="single-checkbox" name="review" type="checkbox" checked> Review 1</li>
                                                    <li><input class="single-checkbox" name="review" type="checkbox"> Review 2</li>
                                                    <li><input class="single-checkbox" name="review" type="checkbox" checked> Review 3</li>
                                                    <li><input class="single-checkbox" name="review" type="checkbox"> Review 4</li>
                                                    <li><input class="single-checkbox" name="review" type="checkbox" checked> Review 5</li>
                                                    <li><input class="single-checkbox" name="review" type="checkbox"> Review 6</li>
                                                </ul>
                                            </div>
                                            <br><br>
                                            <input type="submit" class="btn btn-primary mb-2" value="Save Changes">
                                        </form>
                                    </div>
                                    <!-- end editing happy customer says section -->
								</div>
							</div>
						</div>
					</div>
                    <div class="tab-content" id="tab6" data-tab-content="tab6">
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
					</div>

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

	<script src="js/custom.js"></script>

    <script>
        var limit = 4;
                $('input.single-checkbox').on('change', function(evt) {
                if($("input[name='hotel']:checked").length >= limit) {
                    this.checked = false;
                }
                });

                $('input.single-checkbox').on('change', function(evt) {
                if($("input[name='fhotel']:checked").length >= limit) {
                    this.checked = false;
                }
                });

                $('input.single-checkbox').on('change', function(evt) {
                if($("input[name='review']:checked").length >= limit) {
                    this.checked = false;
                }
                });
    </script>

</body>
</html>