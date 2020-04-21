<?php
  require_once("app/model/model.php");
  require_once("app/model/employee.php");
  require_once("app/model/hotelmodel.php");
  
?>

<?php

class Admin extends Employee {


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

        $sql="SELECT guest.LastName, Hotel.Name, reserves.NoofChildren ,reserves.NoofAdults ,reserves.DateIn ,reserves.DateOut, reserves.NoOfSingleRooms ,reserves.NoOfDoubleRooms
        ,reserves.NoOfTripleRooms, reserves.NoOfSuits ,reserves.BoardType 
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
            <button class="btn btn-primary mb-2" style="margin-left:20px;">Confirm Book</button>
            <br>
            <br>
            ';
        }

    }
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    

//Reading packages reservations section-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    function ReadPendingReservations2()
    {

        $sql1="SELECT guest.LastName, packages.PackageName , reserves.NoofChildren ,reserves.NoofAdults ,packages.DateIn ,packages.DateOut, reserves.NoOfSingleRooms ,reserves.NoOfDoubleRooms
        ,reserves.NoOfTripleRooms, reserves.NoOfSuits ,reserves.BoardType 
          from reserves
        INNER JOIN guest ON guest.GuestID=reserves.Guestid
        INNER JOIN packages ON reserves.PackageId=packages.PackageID
        where reserves.Suspended='Enabled' AND reserves.HotelId is null;";
        $Result1 = mysqli_query($this->db->getConn(),$sql1);
        while($row1=$Result1->fetch_assoc())
        {
            echo'  <span>Mr. '.$row1["LastName"].' reserving '.$row1["PackageName"].' Hotel for '.$row1["NoofAdults"].' Adults and '.$row1["NoofChildren"].' Children Rooms:  '.$row1["NoOfSingleRooms"].' Single Rooms , '.$row1["NoOfDoubleRooms"].' Double Rooms  
            , '.$row1["NoOfTripleRooms"].' Triple Rooms and '.$row1["NoOfSuits"].' Suits. Board : '.$row1["BoardType"].' From '.$row1["DateIn"].' to '.$row1["DateOut"].'
            </span>
            <button class="btn btn-primary mb-2" style="margin-left:20px;">Confirm Book</button>
            <br>
            <br>
            ';
        }

    }
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    

    function ReadEditHotelsSection()
    {
        
        $sql="SELECT Name,location,WiFI,Gym,Bar,Spa,Swimming_Pool,Restaurant,description,overview From Hotel";
        $Result = mysqli_query($this->db->getConn(),$sql);

                $optionString = '';
                while($row=$Result->fetch_assoc())
                {
                    $optionString .= "<option value='".$row['Name']." & ".$row['location']." & ".$row['WiFI']." & ".$row['Gym']." & ".$row['Bar']." & ".$row['Spa']." & ".$row['Swimming_Pool']." & ".$row['Restaurant']." & ".$row['description']." & ".$row['overview']."'>".$row["Name"]."</option>";

                }

            $sql="SELECT Name,location,WiFI,Gym,Bar,Spa,Swimming_Pool,Restaurant,description,overview From Hotel";
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
                                                    <input type="text" class="form-control" id="edithotelname" value="'.$row['Name'].'">
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="edithotellocation">Hotel Location</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="edithotellocation" value="'.$row['location'].'">
                                                </div>
                                            </div>
                                            <div id="checkboxes">
                                                <label>Edit List of services offered by the hotel</label>
                                                <ul>
                                                    <li><input type="checkbox" class="check" '.($row['WiFI']=="TRUE"?"checked":"").'> Wifi</li>
                                                    <li><input type="checkbox" class="check" '.($row['Gym']=="TRUE"?"checked":"").'> Gym</li>
                                                    <li><input type="checkbox" class="check" '.($row['Bar']=="TRUE"?"checked":"").'> Bar</li>
                                                    <li><input type="checkbox" class="check" '.($row['Spa']=="TRUE"?"checked":"").'> Spa</li>
                                                    <li><input type="checkbox" class="check" '.($row['Swimming_Pool']=="TRUE"?"checked":"").'> Swimming Pool</li>
                                                    <li><input type="checkbox" class="check" '.($row['Restaurant']=="TRUE"?"checked":"").'> Resturant</li>
                                                </ul>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="edithoteldescription">Enter Hotel Description</label>
                                                <textarea class="form-control" id="edithoteldescription" rows="15" name="comment" form="usrform">'.$row['description'].'</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="edithoteloverview">Enter Hotel Overview</label>
                                                <textarea class="form-control" id="edithoteloverview" rows="15" name="comment" form="usrform">'.$row['overview'].'</textarea>
                                            </div>
                                            <a href="#">Show Gallery</a><br>
                                            <div class="form-group">
                                                <label for="fileToUpload">Upload Gallery of Hotel</label>
                                                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                                            </div>
                                            <br><br>
                                            ';
        


    }

    function ReadSuspendHotelsSection()
    {
        $sql="SELECT Name,Suspended From Hotel";
        $Result = mysqli_query($this->db->getConn(),$sql);
        echo '<ul>';
        while ($row=$Result->fetch_assoc()){

            echo'<li><input type="checkbox" '.($row['Suspended']=="Enabled"?"checked":"").'>  ' .$row['Name'].'</li>';
        }
        echo '<ul>';

    }

    function ReadEditPackagesSection()
    {
        $sql="SELECT PackageName,ReserveLimit,Price ,TourGuide,Transportation,TouristMap,BoardType,NumberofDays,NumberofNights,DateOut,Description,DateIn From packages";
        $Result = mysqli_query($this->db->getConn(),$sql);

                $optionString = '';
                while($row=$Result->fetch_assoc())
                {
                    $optionString .= "<option value='".$row['PackageName']." & ".$row['ReserveLimit']." & ".$row['Price']." & ".$row['TourGuide']." & ".$row['Transportation']." & ".$row['TouristMap']." & ".$row['BoardType']." & ".$row['NumberofDays']." & ".$row['NumberofNights']." & ".$row['DateOut']." & ".$row['Description']." & ".$row['DateIn']. "'>".$row["PackageName"]."</option>";

                }
        
        $sql="SELECT PackageName,ReserveLimit,Price ,TourGuide,Transportation,TouristMap,BoardType,NumberofDays,NumberofNights,DateOut,Description,DateIn From packages";
        $Result = mysqli_query($this->db->getConn(),$sql);
        $row=$Result->fetch_assoc();


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
                    <input type="text" class="form-control" id="packagetitle" value="'.$row['PackageName'].'">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Edit Package Number of Days</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="packagedays" value="'.$row['NumberofDays'].'">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Edit Package Number of Nights</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="packagenights" value="'.$row['NumberofNights'].'">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Edit Package Reserve Limit</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="packagelimit" value="'.$row['ReserveLimit'].'">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Edit Package Total Price</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="packageprice" value="'.$row['Price'].'">
                </div>
            </div>
            <div class="input-field">
                <label for="date-start">Start Date</label>
                <input type="text" class="form-control" id="date-start" value="'.$row['DateIn'].'" />
            </div>
            <div class="input-field">
                <label for="date-start">End Date</label>
                <input type="text" class="form-control" id="date-end" value="'.$row['DateOut'].'" />
            </div>
            <div id="checkboxes">
                <label>Edit List of services offered</label>
                <ul>
                    <li><input type="checkbox" class="checkp" '.($row['TourGuide']=="TRUE"?"checked":"").'> Tour Guide</li>
                    <li><input type="checkbox" class="checkp" '.($row['Transportation']=="TRUE"?"checked":"").'> Transportation</li>
                    <li><input type="checkbox" class="checkp" '.($row['TouristMap']=="TRUE"?"checked":"").'> Tourist Map</li>
                </ul>
            </div>
            <div class="boardtype">
                <input type="radio" name="boardtype"  id="full"  '.($row['BoardType']=="Full"?"checked":"").'> Full Board <br>
                <input type="radio" name="boardtype"  id="half"  '.($row['BoardType']=="Half"?"checked":"").'> Half Board<br>
            </div>
            
            <label class="col-sm-4 col-form-label" for="packagedetails">Edit Package Visits/Details</label>
            <textarea rows="15" class="form-control" id="packagedetails" name="comment" form="usrform">
            '.$row['Description'].'
            </textarea>                                                        
            <br><br><br><a href="#">Show Gallery of Pacakage</a><br>
            Update Gallery of Package <br>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br><br>
            ';        
    }

    function ReadSuspendPackagesSection()
    {
        $sql="SELECT PackageName,Suspended From packages";
        $Result = mysqli_query($this->db->getConn(),$sql);
        echo '<ul>';
        while ($row=$Result->fetch_assoc()){

            echo'<li><input type="checkbox" '.($row['Suspended']=="Enabled"?"checked":"").'>  ' .$row['PackageName'].'</li>';
        }
        echo '<ul>';

    }

    function AddHotel()
    {
                    //     $hotelname = $_POST["enterhotel"];
                    //     $hotellocation = $_POST["enterlocation"];
                    //     $servicesarray=array();
                        
                    //     if(!empty($_POST['check_list']))   
				    //  {
					// 		    foreach($_POST['check_list'] as $check)
					// 		    {
                    //                     array_push($servicesarray,$check); 
					// 				//check what is checked in checkboxes
					// 		    }

                    //  }
                    //  $NewHotel = New Hotel($hotelname,$servicesarray,$hotellocation);
                              
    }

}

?>