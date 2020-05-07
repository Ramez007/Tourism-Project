<html>
<head><script src="js/sweetalert.min.js"></script>
</head>

<body>
<?php
  require_once("app/model/model.php");
  require_once("app/model/employee.php");
  require_once("app/model/hotelmodel.php");
  require_once("app/interfaces/iReviewHotels.php");
  require_once("app/interfaces/iReviewPackages.php");

  use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';
  
?>

<?php

class Admin extends Employee implements ireviewhotels,ireviewpackages {


    function __construct() {
        $this->dbh = $this->connect();
    }

//reading hotels reservations section---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    function ReadPendingReservations()
    {
        // $sql="SELECT guest.LastName, packages.PackageName, Hotel.Name
        // FROM reserves
        // INNER JOIN guest ON guest.GuestID=reserves.Guestid
        // INNER JOIN Hotel ON reserves.HotelId=Hotel.HotelID
        // INNER JOIN packages ON reserves.Packageid=packages.PackageID;";

        $sql="SELECT guest.LastName,guest.NationalID ,guest.PassportNumber,guest.Phone,guest.Email,Hotel.Name, reserves.NoofChildren ,reserves.NoofAdults ,reserves.DateIn ,reserves.DateOut, reserves.NoOfSingleRooms ,reserves.NoOfDoubleRooms
        ,reserves.NoOfTripleRooms, reserves.NoOfSuits ,reserves.BoardType,reserves.ReserveID 
          from reserves
        INNER JOIN guest ON guest.GuestID=reserves.Guestid
        INNER JOIN Hotel ON reserves.HotelId=Hotel.HotelID
        where reserves.Suspended='Enabled' AND Packageid is null;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        while($row=$Result->fetch_assoc())
        {
            echo'  <span>Mr. '.$row["LastName"].' reserving '.$row["Name"].' Hotel for '.$row["NoofAdults"].' Adults and '.$row["NoofChildren"].' Children Rooms:  '.$row["NoOfSingleRooms"].' Single Rooms , '.$row["NoOfDoubleRooms"].' Double Rooms  
            , '.$row["NoOfTripleRooms"].' Triple Rooms and '.$row["NoOfSuits"].' Suits. Board : '.$row["BoardType"].' From '.$row["DateIn"].' to '.$row["DateOut"].'
            </span>
            <br><br>
            <h5><Strong>Client Detalis</strong></span>
            <br><br>
            <span>NationalID : '.$row["NationalID"].' </span>
            <br><br>
            <span>PassportNumber : '.$row["PassportNumber"].' </span>
            <br><br>
            <span>Phone : '.$row["Phone"].' </span>
            <br><br>
            <span>Email : '.$row["Email"].' </span>
            <br><br>
            <form action="" method="post">
            <input type="hidden" class="form-control" value="'.$row['ReserveID'].'" id="reserveid" name="reserveid"> 
            <input class="btn btn-primary mb-2" type="submit" name="confirmbook" id="confirmbook" style="margin-left:20px;" value="Confirm Book">
            </form>
            <br>
            <br>
            ';
        }

    }
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    

//Reading packages reservations section-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    function ReadPendingReservations2()
    {

        $sql1="SELECT guest.LastName,guest.NationalID ,guest.PassportNumber,guest.Phone,guest.Email, packages.PackageName , reserves.NoofChildren ,reserves.NoofAdults ,packages.DateIn ,packages.DateOut, reserves.NoOfSingleRooms ,reserves.NoOfDoubleRooms
        ,reserves.NoOfTripleRooms, reserves.NoOfSuits ,reserves.BoardType,reserves.ReserveID  
          from reserves
        INNER JOIN guest ON guest.GuestID=reserves.Guestid
        INNER JOIN packages ON reserves.PackageId=packages.PackageID
        where reserves.Suspended='Enabled' AND reserves.HotelId is null;";
        $Result1 = mysqli_query($this->db->getConn(),$sql1);
        while($row1=$Result1->fetch_assoc())
        {
            echo'  <span>Mr. '.$row1["LastName"].' reserving '.$row1["PackageName"].' Package for '.$row1["NoofAdults"].' Adults and '.$row1["NoofChildren"].' Children Rooms:  '.$row1["NoOfSingleRooms"].' Single Rooms , '.$row1["NoOfDoubleRooms"].' Double Rooms  
            , '.$row1["NoOfTripleRooms"].' Triple Rooms and '.$row1["NoOfSuits"].' Suits. Board : '.$row1["BoardType"].' From '.$row1["DateIn"].' to '.$row1["DateOut"].'
            </span>
            <br><br>
            <h5><Strong>Client Detalis</strong></span>
            <br><br>
            <span>NationalID : '.$row1["NationalID"].' </span>
            <br><br>
            <span>PassportNumber : '.$row1["PassportNumber"].' </span>
            <br><br>
            <span>Phone : '.$row1["Phone"].' </span>
            <br><br>
            <span>Email : '.$row1["Email"].' </span>
            <br><br>
            <form action="" method="post">
            <input type="hidden" class="form-control" value="'.$row1['ReserveID'].'" id="reserveid" name="reserveid"> 
            <input class="btn btn-primary mb-2" type="submit" name="confirmbook" id="confirmbook" style="margin-left:20px;" value="Confirm Book">
            </form>
            <br>
            <br>
            ';
        }

    }
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    

    function ReadEditHotelsSection()
    {
        
        $sql="SELECT HotelID,Name,location,WiFI,Gym,Bar,Spa,Swimming_Pool,Restaurant,Pets,description,overview,PriceSingle,PriceDouble,PriceTriple,PriceSuites,stars From Hotel";
        $Result = mysqli_query($this->db->getConn(),$sql);

                $optionString = '';
                while($row=$Result->fetch_assoc())
                {
                    $optionString .= "<option value='".$row['Name']."&".$row['location']."&".$row['WiFI']."&".$row['Gym']."&".$row['Bar']."&".$row['Spa']."&".$row['Swimming_Pool']."&".$row['Restaurant']."&".$row['Pets']."&".$row['description']."&".$row['overview']."&".$row['HotelID']."&".$row['PriceSingle']."&".$row['PriceDouble']."&".$row['PriceTriple']."&".$row['PriceSuites']."&".$row['stars']."'>".$row["Name"]."</option>";

                }

            $sql="SELECT HotelID,Name,location,WiFI,Gym,Bar,Spa,Swimming_Pool,Restaurant,Pets,description,overview,PriceSingle,PriceDouble,PriceTriple,PriceSuites,stars From Hotel";
            $Result = mysqli_query($this->db->getConn(),$sql);
            $row=$Result->fetch_assoc();
            echo'<div class="form-group row">
                     <label class="col-sm-3 col-form-label" for="hotels-editing-dropdown">Choose Hotel To Edit</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control form-control-sm" style="margin-left:-102px;" name="hotels-editing-dropdown" id="hotels-editing-dropdown" onchange="">   
                                                        '.$optionString.'
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="edithotelname">Hotel Name</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="edithotelname" minlength="3" pattern="[a-zA-Z0-9\s]+" title="No Special Charcters" id="edithotelname" value="'.$row['Name'].'" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="edithotellocation">Hotel Location</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="edithotellocation" pattern=".{4,}" title="Four or more characters" id="edithotellocation" value="'.$row['location'].'"required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Price Of Single Rooms</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min="1" id="pricesingle" name="priceofsingle" value="'.$row['PriceSingle'].'" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Price Of Double Rooms</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min="1" id="pricedouble" name="priceofdouble" value="'.$row['PriceDouble'].'" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Price Of Triple Rooms</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min="1" id="pricetriple" name="priceoftriple" value="'.$row['PriceTriple'].'" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="numberofrooms">Enter Price Of Suites</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" min="1" id="pricesuites" name="priceofsuites" value="'.$row['PriceSuites'].'" required>
                                                </div>
                                            </div>
                                            <div id="checkboxes">
                                                <label>Edit List of services offered by the hotel</label>
                                                <ul>
                                                    <li><input type="checkbox" value="Wifi" name="check[]" class="check" '.($row['WiFI']=="TRUE"?"checked":"").'> Wifi</li>
                                                    <li><input type="checkbox" value="Gym" name="check[]" class="check" '.($row['Gym']=="TRUE"?"checked":"").'> Gym</li>
                                                    <li><input type="checkbox" value="Bar" name="check[]" class="check" '.($row['Bar']=="TRUE"?"checked":"").'> Bar</li>
                                                    <li><input type="checkbox" value="Spa" name="check[]" class="check" '.($row['Spa']=="TRUE"?"checked":"").'> Spa</li>
                                                    <li><input type="checkbox" value="Swimming" name="check[]" class="check" '.($row['Swimming_Pool']=="TRUE"?"checked":"").'> Swimming Pool</li>
                                                    <li><input type="checkbox" value="Restaurant" name="check[]" class="check" '.($row['Restaurant']=="TRUE"?"checked":"").'> Resturant</li>
                                                    <li><input type="checkbox" value="Pets" name="check[]" class="check" '.($row['Pets']=="TRUE"?"checked":"").'> Pets</li>
                                                </ul>
                                            </div>
                                            <div id="stars">
                                                <label>Enter Hotel Stars</label><br>
                                                <input type="radio" id="s1" name="hotelstars" '.($row['stars']=="1"?"checked":"").' value="1"> 1 <br>
                                                <input type="radio" id="s2" name="hotelstars" '.($row['stars']=="2"?"checked":"").' value="2"> 2 <br>
                                                <input type="radio" id="s3" name="hotelstars" '.($row['stars']=="3"?"checked":"").' value="3"> 3 <br>
                                                <input type="radio" id="s4" name="hotelstars" '.($row['stars']=="4"?"checked":"").' value="4"> 4 <br>
                                                <input type="radio" id="s5" name="hotelstars" '.($row['stars']=="5"?"checked":"").' value="5"> 5 <br><br>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="edithoteldescription">Enter Hotel Description</label>
                                                <textarea class="form-control" id="edithoteldescription" rows="15" name="description" required>'.$row['description'].'</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="edithoteloverview">Enter Hotel Overview</label>
                                                <textarea class="form-control" id="edithoteloverview" rows="15" maxlength="140" name="overview" required>'.$row['overview'].'</textarea>
                                            </div>
                                            <a href="#">Show Gallery</a><br>
                                            <div class="form-group">
                                                <label for="fileToUpload">Upload Gallery of Hotel</label>
                                                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                                            </div>
                                            <input type="hidden" class="form-control" value="'.$row['HotelID'].'" id="HotelId" name="HotelId">
                                            <br><br>
                                            ';
        


    }

    function ReadSuspendHotelsSection()
    {
        $sql="SELECT Name,Suspended,HotelID From Hotel";
        $Result = mysqli_query($this->db->getConn(),$sql);
        echo '<ul>';
        while ($row=$Result->fetch_assoc()){

            echo'<li><input type="checkbox" name="suspendhtls[]" value="'.$row['HotelID'].'"  '.($row['Suspended']=="Enabled"?"checked":"").'>  ' .$row['Name'].'</li>';
        }
        echo '<ul>';

    }

    function ReadEditPackagesSection()
    {
        $sql="SELECT PackageID,PackageName,ReserveLimit,Price ,TourGuide,Transportation,TouristMap,BoardType,NumberofDays,NumberofNights,DateOut,Description,DateIn,CruiseID,HotelID,Overview From packages";
        $Result = mysqli_query($this->db->getConn(),$sql);

                $optionString = '';
                while($row=$Result->fetch_assoc())
                {
                    if ($row['CruiseID'] =='')
                    {
                        $optionString .= "<option value='".$row['PackageName']."&".$row['ReserveLimit']."&".$row['Price']."&".$row['TourGuide']."&".$row['Transportation']."&".$row['TouristMap']."&".$row['BoardType']."&".$row['NumberofDays']."&".$row['NumberofNights']."&".$row['DateOut']."&".$row['Description']."&".$row['DateIn']. "&empty&h".$row['HotelID']."&".$row['PackageID']."&".$row["Overview"]."'>".$row["PackageName"]."</option>";
                    }
                    else
                    {
                    $optionString .= "<option value='".$row['PackageName']."&".$row['ReserveLimit']."&".$row['Price']."&".$row['TourGuide']."&".$row['Transportation']."&".$row['TouristMap']."&".$row['BoardType']."&".$row['NumberofDays']."&".$row['NumberofNights']."&".$row['DateOut']."&".$row['Description']."&".$row['DateIn']. "&".$row['CruiseID']." &h".$row['HotelID']."&".$row['PackageID']."&".$row["Overview"]."'>".$row["PackageName"]."</option>";
                    }
                }
        
        $sql="SELECT PackageID,PackageName,ReserveLimit,Price ,TourGuide,Transportation,TouristMap,BoardType,NumberofDays,NumberofNights,DateOut,Description,DateIn,CruiseID,HotelID,Overview From packages";
        $Result = mysqli_query($this->db->getConn(),$sql);
        $row=$Result->fetch_assoc();

       //for cruises radio buttons
        $cruises = '';
        $sql2="SELECT CruiseName,CruiseID from cruise;";
        $Result2 = mysqli_query($this->db->getConn(),$sql2);
        while ($row2=$Result2->fetch_assoc())
        {
                    
            $cruises .="<input type='radio' name='cruise' value='".$row2['CruiseID']."' id='".$row2['CruiseID']."' ".($row['CruiseID']=="".$row2['CruiseID'].""?"checked":"")."> ".$row2['CruiseName']." <br>";
                    
        }

        //for hotels radio buttons
        $hotels = '';
        $sql3="SELECT Name,HotelID from hotel;";
        $Result3 = mysqli_query($this->db->getConn(),$sql3);
        while ($row3=$Result3->fetch_assoc())
        {
                    
            $hotels .="<input type='radio' name='hotel' value='".$row3['HotelID']."' id='h".$row3['HotelID']."' ".($row['HotelID']=="".$row3['HotelID'].""?"checked":"")."> ".$row3['Name']." <br>";
                    
        }

    



        echo'<div class="form-group row">
                <label style="margin-left:-275px" for="Packages-editing-dropdown">Choose a Pakage to edit:</label>
                <div class="col-sm-3">
                    <select class="form-control form-control-sm" style="margin-left:198px;" id="Packages-editing-dropdown" onchange="">
                    '.$optionString.'
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Edit Package Title</label>
                <div class="col-sm-3">
                    <input type="text" name="Editpackagename" class="form-control" id="packagetitle" pattern=".{4,}" title="Four or more characters" value="'.$row['PackageName'].'" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Edit Package Number of Days</label>
                <div class="col-sm-3">
                    <input type="number" name="numberofdays" min="1" class="form-control" id="packagedays" value="'.$row['NumberofDays'].'" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Edit Package Number of Nights</label>
                <div class="col-sm-3">
                    <input type="number" name="numberofnights" min="1" class="form-control" id="packagenights" value="'.$row['NumberofNights'].'" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Edit Package Reserve Limit</label>
                <div class="col-sm-3">
                    <input type="number" name="reservelimit" min="1" class="form-control" id="packagelimit" value="'.$row['ReserveLimit'].'" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Edit Package Total Price</label>
                <div class="col-sm-3">
                    <input type="number" name="totalprice" min="100" class="form-control" id="packageprice" value="'.$row['Price'].'" required>
                </div>
            </div>
            <div class="input-field">
                <label for="date-start">Start Date</label>
                <input type="text" class="form-control" name="edit-date-start" data-date-format="yyyy-mm-dd" id="date-start" value="'.$row['DateIn'].'" required>
            </div>
            <div class="input-field">
                <label for="date-start">End Date</label>
                <input type="text" class="form-control" name="edit-date-end" data-date-format="yyyy-mm-dd" id="date-end" value="'.$row['DateOut'].'" required>
            </div>
            <div id="checkboxes">
                <label>Edit List of services offered</label>
                <ul>
                    <li><input type="checkbox" name="pkg_service[]" value="guide" class="checkp" '.($row['TourGuide']=="TRUE"?"checked":"").'> Tour Guide</li>
                    <li><input type="checkbox" name="pkg_service[]" value="trans" class="checkp" '.($row['Transportation']=="TRUE"?"checked":"").'> Transportation</li>
                    <li><input type="checkbox" name="pkg_service[]" value="map" class="checkp" '.($row['TouristMap']=="TRUE"?"checked":"").'> Tourist Map</li>
                </ul>
            </div>
            <div class="boardtype">
                <input type="radio" name="boardtype"  value="Full" id="full"  '.($row['BoardType']=="Full"?"checked":"").'> Full Board <br>
                <input type="radio" name="boardtype" value="Half"  id="half"  '.($row['BoardType']=="Half"?"checked":"").'> Half Board<br>
            </div>

            <div class="assigncruise">
                <label for="">Assign Cruise</label><br>
                <input type="radio" name="cruise" id="cruisenone" value="None" '.($row['CruiseID']==""?"checked":"").'> None <br>
                '.$cruises.'
            </div>

            <div class="assignhotel">
                <label for="">Assign Hotel</label><br>
                '.$hotels.'
            </div>
            
            
            <div class="form-group">
                <label for="edithoteldescription">Edit Package Visits/Details</label>
                <textarea class="form-control" id="packagedetails" name="editpackagedescription" rows="4"  Placeholder="Enter Text Here..." required>'.$row['Description'].'</textarea>
            </div> 
            <div class="form-group">
                <label for="edithoteldescription">Edit Package overview</label>
                <textarea class="form-control" id="editpackageoverview" name="editpackageoverview" rows="4" maxlength="140"  Placeholder="Enter Text Here..." required>'.$row['Overview'].'</textarea>
            </div>                                                       
            <br><br><br><a href="#">Show Gallery of Pacakage</a><br>
            Update Gallery of Package <br>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br><br>
            <input type="hidden" name="packageid" id="packageID" value="'.$row['PackageID'].'">
            ';        
    }

    function ReadSuspendPackagesSection()
    {
        $sql="SELECT PackageName,Suspended,PackageID From packages";
        $Result = mysqli_query($this->db->getConn(),$sql);
        echo '<ul>';
        while ($row=$Result->fetch_assoc()){

            echo'<li><input type="checkbox" name="suspendpkgs[]" value="'.$row['PackageID'].'" '.($row['Suspended']=="Enabled"?"checked":"").'>  ' .$row['PackageName'].'</li>';
        }
        echo '<ul>';

    }

    function ReadEditEventsSection()
    {
        $sql="SELECT PostTitle,PostMonth,PostYear,PostText,PostID From blogposts";
        $Result = mysqli_query($this->db->getConn(),$sql);

        $optionString = '';
        while($row=$Result->fetch_assoc())
        {
          $optionString .= "<option value='".$row['PostTitle']." & ".$row['PostMonth']." & ".$row['PostYear']." & ".$row['PostText']." & ".$row['PostID']."'>".$row["PostTitle"]."</option>";
        }

        $sql="SELECT PostTitle,PostMonth,PostYear,PostText,PostID From blogposts";
        $Result = mysqli_query($this->db->getConn(),$sql);
        $row=$Result->fetch_assoc();


        echo '<div class="form-group row">
                <label class="col-sm-2 col-form-label" for="events-editing-dropdown">Choose an event to edit</label>
                <div class="col-sm-3">
                    <select class="form-control" id="events-editing-dropdown">
                    '.$optionString.'
                    </select>
                </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="editeventtitle">Edit Event Title</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="'.$row['PostTitle'].'" pattern=".{4,}" title="Four or more characters" id="editeventtitle" name="editeventtitle" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="editeventmonth">Edit Event Month</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" data-toggle="tooltip" title="Only 3 Charcters For Example: SEP" maxlength="3" value="'.$row['PostMonth'].'" id="editeventmonth" name="editeventmonth" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="editeventyear">Edit Event Year</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="'.$row['PostYear'].'" id="editeventyear" name="editeventyear" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="eventdetails">Edit Event Details</label>
                    <textarea rows="4" class="form-control" id="blogposttext" name="blogposttext" required>'.$row['PostText'].'</textarea>
                </div>
                <input type="hidden" class="form-control" value="'.$row['PostID'].'" id="postid" name="postid">
                <br><br><br> Upload Photo of Event <br>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <br><br>';
    }

    function ReadSuspendEventsSection()
    {
        $sql="SELECT PostTitle,Suspended,PostID From blogposts";
        $Result = mysqli_query($this->db->getConn(),$sql);
        echo '<ul>';
        while ($row=$Result->fetch_assoc()){

            echo'<li><input type="checkbox" name="events[]" value="'.$row['PostID'].'" '.($row['Suspended']=="Enabled"?"checked":"").'>  ' .$row['PostTitle'].'</li>';
        }
        echo '<ul>';

    }

    function ReadMainSliderHotelsSection(){
        $sql="SELECT Name,FeaturedMainSilder,HotelID From hotel";
        $Result = mysqli_query($this->db->getConn(),$sql);
        echo '<ul>';
        while ($row=$Result->fetch_assoc()){

            echo'<li><input class="single-checkbox" name="hotel[]" id="hotelscheck" value="'.$row['HotelID'].'" type="checkbox" '.($row['FeaturedMainSilder']=="TRUE"?"checked":"").'> '.$row['Name'].'</li>';
        }
        echo '</ul>';
    }

    function ReadFeaturedHotelsSection(){
        $sql="SELECT Name,featured,HotelID From hotel";
        $Result = mysqli_query($this->db->getConn(),$sql);
        echo '<ul>';
        while ($row=$Result->fetch_assoc()){

            echo'<li><input class="single-checkbox" name="headerhotel[]" id="headerhotelcheck" value="'.$row['HotelID'].'" type="checkbox" '.($row['featured']=="header"?"checked":"").'> '.$row['Name'].'</li>';
        }
        echo '</ul>';
        echo'<label>Select Two Hotels To Be Shown in Featured Hotels Section in Main Page</label>';
        echo '<ul>';
        $Result2 = mysqli_query($this->db->getConn(),$sql);
        while ($row2=$Result2->fetch_assoc()){

            echo'<li><input class="single-checkbox" name="fhotel[]" id="fhotelcheck" value="'.$row2['HotelID'].'" type="checkbox" '.($row2['featured']=="feature"?"checked":"").'> '.$row2['Name'].'</li>';
        }
        echo '</ul>';

    }

    function ReadPackagesReviews(){
        $sql="SELECT guest.LastName, packages.PackageName ,reviews.review,Featured,reviews.ReviewID from reviews
        INNER JOIN guest ON guest.GuestID=reviews.GuestID
        INNER JOIN packages ON reviews.PackageID=packages.PackageID;"; 
        $Result = mysqli_query($this->db->getConn(),$sql);
        while ($row=$Result->fetch_assoc()){
            echo'<li><input class="single-checkbox" name="review[]" id="reviewcheck" value="'.$row['ReviewID'].'" type="checkbox" '.($row['Featured']=="TRUE"?"checked":"").'> MR. '.$row['LastName'].' revwied '.$row['PackageName'].' Package. Review: '.$row['review'].' </li>';
        }
        
    }

    function ReadHotelsReviews(){
        $sql="SELECT guest.LastName,hotel.Name,reviews.review,reviews.Featured,reviews.ReviewID from reviews
        INNER JOIN guest ON guest.GuestID=reviews.GuestID
        INNER JOIN hotel ON reviews.HotelID=hotel.HotelID;"; 
        $Result = mysqli_query($this->db->getConn(),$sql);
        while ($row=$Result->fetch_assoc()){
            echo'<li><input class="single-checkbox" name="review[]" id="reviewcheck" value="'.$row['ReviewID'].'" type="checkbox" '.($row['Featured']=="TRUE"?"checked":"").'> MR. '.$row['LastName'].' revwied '.$row['Name'].' Hotel. Review: '.$row['review'].' </li>';
            // echo'<input type="hidden" name="reviewid" value="'.$row['ReviewID'].'"> ';
        }
        
    }

    function ReadCruises(){
                    $sql="SELECT CruiseName,CruiseID from cruise;";
                    $Result = mysqli_query($this->db->getConn(),$sql);
                    while ($row=$Result->fetch_assoc()){
                        echo'
                    <input type="radio" name="cruise" value="'.$row['CruiseID'].'" required> '.$row['CruiseName'].' <br>
                   
                    ';
                    }
    }

    function ReadHotels(){
        $sql="SELECT Name,HotelID from hotel where Suspended='Disabled';";
                    $Result = mysqli_query($this->db->getConn(),$sql);
                    while ($row=$Result->fetch_assoc()){
                        echo'
                    <input type="radio" name="hotels" value="'.$row['HotelID'].'"> '.$row['Name'].' <br>
                    
                    ';
                    }
    }

    function EditReviews()
    {
        $a=array();
        if(!empty($_POST['review']))   
				     {
							    foreach($_POST['review'] as $check)
							    {
                                        array_push($a,$check);
                                        // echo'<script>alert('.$a.')</script>'; 
                                }
                            
                                
                                if(count($a)<3 || empty($a) || count($a)==0)
                                {
                                    echo'<script>
                                    swal("Oops","You Need To Choose Exactly 3 Reviews !","error");
                                    </script>';
                                }
                                else
                                {

                                    $sql2="UPDATE reviews SET Featured='False'";
                                    $Result = mysqli_query($this->db->getConn(),$sql2);
                                    for($i=0;$i<count($a);$i++)
                                    {
                                    $sql="UPDATE reviews
                                    SET Featured='TRUE'
                                    WHERE ReviewID=".$a[$i].";";
                                    $Result = mysqli_query($this->db->getConn(),$sql);
                                    echo'<script>swal("Successfully Updated", "", "success");</script>'; 
                                    }
                                }  
                                

                     } 
                     else {
                        echo'<script>
                        swal("Oops","You Need To Choose Exactly 3 Reviews !","error");
                        </script>';

                     }       
    }

    function EditFeaturedHotels()
    {
        $a=array();
        if(!empty($_POST['headerhotel']))   
				     {
							    foreach($_POST['headerhotel'] as $check)
							    {
                                        array_push($a,$check);
                                }
                                
                                if(empty($a) || count($a)<1)
                                {
                                    echo'<script>
                                    swal("Oops","You Need To Choose Exactly 1 Hotel to be featured as header !","error");
                                    </script>';
                                }
                                else
                            {

                                $sql2="UPDATE hotel SET featured='false'";
                                $Result = mysqli_query($this->db->getConn(),$sql2);
                                for($i=0;$i<count($a);$i++)
					            {
                                $sql="UPDATE hotel
                                SET featured='header'
                                WHERE HotelID=".$a[$i].";";
                                $Result = mysqli_query($this->db->getConn(),$sql);
                                }
                                
                                $b=array();
                                if(!empty($_POST['fhotel']))   
                                  {
                                             foreach($_POST['fhotel'] as $check)
                                             {
                                                     array_push($b,$check);
                                                     // echo'<script>alert('.$a.')</script>'; 
                                             }
                                             
                                             if(count($b)<2)
                                             {
                                                 echo'<script>
                                                 swal("Oops","You Need To Choose Exactly 2 Hotels to be featured !","error");
                                                 </script>';
                                             }
                                             else
                                        {
                                            $index="0";
                                             $sql3="UPDATE hotel SET featured='false' where HotelID !=".$a[$index]."";
                                             $Result = mysqli_query($this->db->getConn(),$sql3);
                                             for($i=0;$i<count($b);$i++)
                                             {
                                             $sql4="UPDATE hotel
                                             SET featured='feature'
                                             WHERE HotelID=".$b[$i].";";
                                             $Result = mysqli_query($this->db->getConn(),$sql4);
             
                                             }
                                         }
             
                                  }
                                  else{
                                    echo'<script>
                                    swal("Oops","You Need To Choose Exactly 2 Hotels to be featured !","error");
                                    </script>';
                                  }       
                            }
                            echo'<script>swal("Successfully Updated", "", "success");</script>';

                     } 
                     else{
                        echo'<script>
                        swal("Oops","You Need To Choose Exactly 1 Hotel to be featured as header !","error");
                        </script>';
                     } 
                                 
    }

    function EditFeaturedMainSilder()
    {
        $a=array();
        if(!empty($_POST['hotel']))   
				     {
							    foreach($_POST['hotel'] as $check)
							    {
                                        array_push($a,$check);
                                        // echo'<script>alert('.$a.')</script>'; 
                                }
                            
                                
                                if(count($a)<3 || empty($a) || count($a)==0)
                                {
                                    echo'<script>
                                    swal("Oops","You Need To Choose Exactly 3 Hotels !","error");
                                    </script>';
                                }
                                else
                                {

                                $sql2="UPDATE hotel SET FeaturedMainSilder='FALSE'";
                                $Result = mysqli_query($this->db->getConn(),$sql2);
                                for($i=0;$i<count($a);$i++)
					            {
                                $sql="UPDATE hotel
                                SET FeaturedMainSilder='TRUE'
                                WHERE HotelID=".$a[$i].";";
                                $Result = mysqli_query($this->db->getConn(),$sql);

                                }
                                echo'<script>swal("Successfully Updated", "", "success");</script>';
                                }   

                     } 
                     else {
                        echo'<script>
                        swal("Oops","You Need To Choose Exactly 3 Hotels !","error");
                        </script>';

                     }       
    }

    Function AddEvent($Event_Title,$Event_Month,$Event_Year,$Event_Post)
    {
        $adminid=$_SESSION["ID"];
        $disabled="Disabled";
        $Event_Month1= strtoupper($Event_Month);
        $sql30="INSERT INTO blogposts (EmployeeID,PostTitle,PostMonth,PostYear,PostText,Suspended) 
        VALUES ('$adminid','$Event_Title','$Event_Month1','$Event_Year','$Event_Post','$disabled');";
         $Result = mysqli_query($this->db->getConn(),$sql30);
         if($Result){
            echo'<script>swal("Successfully Added Event", "", "success");</script>';
         }
         else{
            echo'<script>
            swal("Oops","error Adding Event !","error");
            </script>';
         }
    }

    function EditEvent($id)
    {
        $sql="UPDATE blogposts SET PostTitle='".$_POST['editeventtitle']."', PostMonth='".$_POST['editeventmonth']."',PostYear='".$_POST['editeventyear']."',PostText='".$_POST['blogposttext']."' where PostID=$id;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        if($Result){
            echo'<script>swal("Successfully Updated Event", "", "success");</script>';
         }
         else{
            echo'<script>
            swal("Oops","Error Updating Event !","error");
            </script>';
         }
    }

    function SuspendEvent()
    {
                    $a=array();
                    if(!empty($_POST['events']))   
				     {
							    foreach($_POST['events'] as $check)
							    {
                                        array_push($a,$check);
                                } 
                                
                                for($i=0;$i<count($a);$i++)
					            {
                                $sql99="UPDATE blogposts
                                SET Suspended='Disabled'
                                WHERE PostID!=".$a[$i].";";
                                $Result99 = mysqli_query($this->db->getConn(),$sql99);
                                }
                                
                                for($i=0;$i<count($a);$i++)
					            {
                                $sql="UPDATE blogposts
                                SET Suspended='Enabled'
                                WHERE PostID=".$a[$i].";";
                                $Result = mysqli_query($this->db->getConn(),$sql);

                                }
                                echo'<script>swal("Successfully Suspended Events", "", "success");</script>';
                                  
                     } 
                     else 
                     {
                        $sql2="UPDATE blogposts
                                SET Suspended='Disabled';";
                                $Result2 = mysqli_query($this->db->getConn(),$sql2); 
                                echo'<script>swal("All Events are now Visible in Blog Page", "", "success");</script>';

                     } 
    }

    function ConfirmReserve($reserveid)
    {
        $sql2="UPDATE reserves SET Suspended='Disabled',Status='Approved and reserved' where ReserveID=$reserveid;";
        $Result3 = mysqli_query($this->db->getConn(),$sql2); 
        if($Result3)
        {
            $sql3="Select GuestId from reserves where ReserveID=$reserveid;";
            $Result4 = mysqli_query($this->db->getConn(),$sql3);
            $row=$Result4->fetch_assoc();
            $sql4="Select Email from guest where GuestID='".$row['GuestId']."'";
            $Result5=mysqli_query($this->db->getConn(),$sql4);
            $row2=$Result5->fetch_assoc();
            $sql5="Select PackageId,HotelId,NoOfSingleRooms,NoOfDoubleRooms,NoOfTripleRooms,NoOfSuits,BoardType,DateIn,DateOut from reserves where ReserveID=$reserveid;";
            $Result6=mysqli_query($this->db->getConn(),$sql5);
            $row3=$Result6->fetch_assoc();
            
            $sql6="
            Update rooms
            set Status='Not',GuestID='".$row['GuestId']."',DateIn='".$row3['DateIn']."' ,DateOut='".$row3['DateOut']."'
            where HotelID='".$row3['HotelId']."' and RoomType='Single' and Status='Pending' LIMIT ".$row3['NoOfSingleRooms']." ";
            mysqli_query($this->db->getConn(),$sql6);

            $sql7="
            Update rooms
            set Status='Not',GuestID='".$row['GuestId']."',DateIn='".$row3['DateIn']."' ,DateOut='".$row3['DateOut']."'
            where HotelID='".$row3['HotelId']."' and RoomType='Double' and Status='Pending' LIMIT ".$row3['NoOfDoubleRooms']." ";
            mysqli_query($this->db->getConn(),$sql7);

            $sql8="
            Update rooms
            set Status='Not',GuestID='".$row['GuestId']."',DateIn='".$row3['DateIn']."' ,DateOut='".$row3['DateOut']."'
            where HotelID='".$row3['HotelId']."' and RoomType='Triple' and Status='Pending' LIMIT ".$row3['NoOfTripleRooms']." ";
            mysqli_query($this->db->getConn(),$sql8);

            $sql9="
            Update rooms
            set Status='Not',GuestID='".$row['GuestId']."',DateIn='".$row3['DateIn']."' ,DateOut='".$row3['DateOut']."'
            where HotelID='".$row3['HotelId']."' and RoomType='Suites' and Status='Pending' LIMIT ".$row3['NoOfSuits']." ";
            mysqli_query($this->db->getConn(),$sql9);


            $Email_Body="<h2>Your Booking Has been confirmed and successfully booked</h2>
            <br>
            Booking Detalis:
            <br>
            ".$row3['NoOfSingleRooms']." Single Rooms
            <br>
            ".$row3['NoOfDoubleRooms']." Double Rooms
            <br>
            ".$row3['NoOfTripleRooms']." Triple Rooms
            <br>
            ".$row3['NoOfSuits']." Suites
            <br>
            ".$row3['BoardType']." Board
            <br>
            ".$row3['DateIn']." : Check In Date
            <br>
            ".$row3['DateOut']." : Check Out Date
            <br>
            
            <h4> May You Have A Pleasent Stay </h4>
            <br>
            <h4> Best Regards From Speedo Tours </h4>";
            
            include_once "serverdetails.php";
            try{
            $email->Subject="Confirm Book";
            $email->Body=$Email_Body;
            $email->addAddress($row2["Email"]);
            $email->send();
            }
            catch(Exception $e)
            {
                echo $e->errorMessage();
            }
            echo'<script>swal("Reserve Confirmed", "", "success");</script>';
        }
        else
        {
            echo'<script>
                        swal("Oops","Error Confirming Book !","error");
                        </script>';
        }
    }

    function SuspendPackage()
    {
                    $a=array();
                    if(!empty($_POST['suspendpkgs']))   
				     {
							    foreach($_POST['suspendpkgs'] as $check)
							    {
                                        array_push($a,$check);
                                } 
                                
                                for($i=0;$i<count($a);$i++)
					            {
                                $sql99="UPDATE packages
                                SET Suspended='Disabled'
                                WHERE PackageID!=".$a[$i].";";
                                $Result99 = mysqli_query($this->db->getConn(),$sql99);
                                }

                                for($i=0;$i<count($a);$i++)
					            {
                                $sql="UPDATE packages
                                SET Suspended='Enabled'
                                WHERE PackageID=".$a[$i].";";
                                $Result = mysqli_query($this->db->getConn(),$sql);

                                }
                                echo'<script>swal("Successfully Suspended Packages", "", "success");</script>';
                                  
                     } 
                     else 
                     {
                        $sql2="UPDATE packages
                                SET Suspended='Disabled';";
                                $Result2 = mysqli_query($this->db->getConn(),$sql2); 
                                echo'<script>swal("All Packages are now Visible in Packages Page", "", "success");</script>';

                     }
    }

    function SuspendHotel()
    {
        $a=array();

                    if(!empty($_POST['suspendhtls']))   
				     {
							    foreach($_POST['suspendhtls'] as $check)
							    {
                                        array_push($a,$check);
                                }
                                
                                for($i=0;$i<count($a);$i++)
					            {
                                $sql99="UPDATE hotel
                                SET Suspended='Disabled'
                                WHERE HotelID!=".$a[$i].";";
                                $Result99 = mysqli_query($this->db->getConn(),$sql99);
                                }

                                for($i=0;$i<count($a);$i++)
					            {   
                                $sql="UPDATE hotel
                                SET Suspended='Enabled'
                                WHERE HotelID=".$a[$i].";";
                                $Result = mysqli_query($this->db->getConn(),$sql);

                                }
                                
                                
                                echo'<script>swal("Successfully Suspended Hotels", "", "success");</script>';
                                  
                     }
                    
                     else 
                     {
                        $sql2="UPDATE hotel
                                SET Suspended='Disabled';";
                                $Result2 = mysqli_query($this->db->getConn(),$sql2); 
                                echo'<script>swal("All Hotels are now Visible in Hotels Page", "", "success");</script>';

                     }
    }

    function AddHotel()
    {   
        $sql="SELECT MAX(HotelID) from hotel";
        $result=mysqli_query($this->db->getConn(),$sql);
        $row=mysqli_fetch_assoc($result);
        $id=$row['MAX(HotelID)']+1;
        $services=array();
           if(!empty($_POST['check_list']))
           {
                foreach($_POST['check_list'] as $check)
                {
                    array_push($services,$check);
                }
           }

        $types=[$_POST['numberofsingle'],$_POST['numberofdouble'],$_POST['numberoftriple'],$_POST['numberofsuites']];
        $desc=$_POST['description'];
        $overview=$_POST['overview'];
        
        $hotel=new Hotel($id,$_POST['enterhotel'],$services,$_POST['enterlocation'],$types,$desc,$overview,$_POST['priceofsingle'],$_POST['priceofdouble'],$_POST['priceoftriple'],$_POST['priceofsuites'],$_POST['hotelstars']);

        echo'<script>swal("Hotel Inserted Successfully", "", "success");</script>';
        
                              
    }

    function Edithotel($id)
    {

        $wifi="FALSE";
        $swimming="FALSE";
        $Spa="FALSE";
        $gym="FALSE";
        $pets="FALSE";
        $bar="FALSE";
        $restaurant="FALSE";
        
        $values=array();
        foreach($_POST['check'] as $check)
        {
            array_push($values,$check);
        }

        for ($i=0;$i<count($values);$i++)
        {
            if($values[$i]=="Wifi")
            {
                $wifi="TRUE";
            }
            else if($values[$i]=="Swimming")
            {   
                $swimming="TRUE";
            }
            else if($values[$i]=="Spa")
            {   
                $Spa="TRUE";
            }
            else if($values[$i]=="Gym")
            {   
                $gym="TRUE";
            }
            else if($values[$i]=="Bar")
            {   
                $bar="TRUE";
            }
            else if($values[$i]=="Restaurant")
            {   
                $restaurant="TRUE";
            }
            else if($values[$i]=="Pets")
            {   
                $pets="TRUE";
            }
        }

        $desc=$_POST['description'];
        $overview=$_POST['overview'];
        $sql="UPDATE hotel SET Name='".$_POST['edithotelname']."', location='".$_POST['edithotellocation']."',WiFi='".$wifi."',Swimming_Pool='".$swimming."',Spa='".$Spa."',Gym='".$gym."',Bar='".$bar."',Restaurant='".$restaurant."',Pets='".$pets."',description='$desc',overview='$overview',PriceSingle='".$_POST['priceofsingle']."',PriceDouble='".$_POST['priceofdouble']."',PriceTriple='".$_POST['priceoftriple']."',PriceSuites='".$_POST['priceofsuites']."',stars='".$_POST['hotelstars']."'
        where HotelID=$id;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        if($Result){
            echo'<script>swal("Successfully Updated Hotel", "", "success");</script>';
         }
         else{
            echo'<script>
            swal("Oops","Error Updating Hotel !","error");
            </script>';
         }
    }

    function AddPackage($cruise,$name,$days,$nights,$limit,$price,$start,$end,$transport,$guide,$map,$boardtype,$hotel,$overview,$description)
    {
        if($cruise=="NULL")
        {
            $sql="INSERT INTO packages (CruiseID,PackageName,ReserveLimit,HotelID,Price,TourGuide,Transportation,TouristMap,BoardType,NumberofDays,NumberofNights,Suspended,DateIn,DateOut,Overview,Description) values($cruise,'$name','$limit','$hotel','$price','$guide','$transport','$map','$boardtype','$days','$nights','Disabled','$start','$end','$overview','$description')";
        }
        else
        {
        $sql="INSERT INTO packages (CruiseID,PackageName,ReserveLimit,HotelID,Price,TourGuide,Transportation,TouristMap,BoardType,NumberofDays,NumberofNights,Suspended,DateIn,DateOut,Overview,Description) values('$cruise','$name','$limit','$hotel','$price','$guide','$transport','$map','$boardtype','$days','$nights','Disabled','$start','$end','$overview','$description')";
        }
        $Result = mysqli_query($this->db->getConn(),$sql);
        if($Result)
        {
            echo'<script>swal("Successfully Added Package", "", "success");</script>';
         }
         else{
            echo'<script>
            swal("Oops","Error Adding Package !","error");
            </script>';
         }
    }

    function EditPackage($id,$cruise,$name,$days,$nights,$limit,$price,$start,$end,$transport,$guide,$map,$boardtype,$hotel,$overview,$description)
    {
        if($cruise=="NULL")
        {
            $sql="UPDATE packages
            SET CruiseID=NULL,PackageName='$name',ReserveLimit='$limit',HotelID='$hotel',Price='$price',TourGuide='$guide',Transportation='$transport',TouristMap='$map',BoardType='$boardtype',NumberofDays='$days',NumberofNights='$nights',DateIn='$start',DateOut='$end',Overview='$overview',Description='$description'
            WHERE PackageID='$id'"; 
        }
        else
        {
        $sql="UPDATE packages
        SET CruiseID='$cruise',PackageName='$name',ReserveLimit='$limit',HotelID='$hotel',Price='$price',TourGuide='$guide',Transportation='$transport',TouristMap='$map',BoardType='$boardtype',NumberofDays='$days',NumberofNights='$nights',DateIn='$start',DateOut='$end',Overview='$overview',Description='$description'
        WHERE PackageID='$id'";
        }
        $Result = mysqli_query($this->db->getConn(),$sql);
        if($Result)
        {
            echo'<script>swal("Successfully Updated Package", "", "success");</script>';
         }
         else{
            echo'<script>
            swal("Oops","Error Updating Package !","error");
            </script>';
         }
    }

}

?>
</body>
</html>