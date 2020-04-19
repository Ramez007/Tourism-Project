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
        
        $sql="SELECT Name From Hotel";
        $Result = mysqli_query($this->db->getConn(),$sql);

                $optionString = '';
                while($row=$Result->fetch_assoc())
                {
                    $optionString .= "<option>".$row["Name"]."</option>";
                    $hotelstring=$row["Name"];
                    $sql2="SELECT location,description ,overview FROM Hotel WHERE Name='$hotelstring'";
                    $Result2 = mysqli_query($this->db->getConn(),$sql2);
                    $row2=$Result2->fetch_assoc();
                        echo '<script>
                            function changeopt()
                        {
                    
                                var x=document.getElementById("hotels-editing-dropdown").value;
                                if(x=="'.$row["Name"].'")
                                {
                                    document.getElementById("edithotelname").value="'.$row["Name"].'";
                                    document.getElementById("edithotellocation").value="'.$row2["location"].'";
                                    document.getElementById("edithoteldescription").value="'.$row2["description"].'";
                                    document.getElementById("edithoteloverview").value="'.$row2["overview"].'";

                                }
                    
                    
                         }
                         setInterval(changeopt,50);
                         </script>';  
                }

             

                
            echo'<div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="hotels-editing-dropdown">Choose Hotel To Edit</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control form-control-sm" style="margin-left:-102px;" name="hotels-editing-dropdown" id="hotels-editing-dropdown" onchange="changeopt()">   
                                                        '.$optionString.'
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
                                                The hotel was built by the Upper Egypt Hotels Co, an enterprise founded in 1905 by Cairo hoteliers Charles Baehler and George Nungovich in collaboration with Thomas Cook & Son (Egypt). It was inaugurated on Saturday 19 January 1907, with a picnic at the Valley of the Kings followed by dinner at the hotel and speeches.[1] The architect was Leon Stienon, the Italian construction company G.GAROZZO & Figli Costruzioni in Cemento Armato, Sistema SIACCI brevettato. During World War I the hotel was temporarily closed to paying guests and employed as a hospice for convalescing soldiers. A regular guest at the hotel from 1907 on was George Herbert, 5th Earl of Carnarvon, better known simply as Lord Carnarvon. Carnarvon was the patron of Egyptologist Howard Carter, who in 1922 discovered the intact tomb of Tutankhamun. After the discovery was announced the Winter Palace played host to the international press corps and foreign visitors there to follow the story. Carter used the hotels noticeboard to deliver occasional news and information on the discovery. In 1975 the complex was expanded with the construction of the New Winter Palace. The addition, classified as a 3-star hotel, was joined by corridors to the original. It was demolished in 2008. In 1996, the Pavillon, a 4-star annex with 116 rooms, was built in the rear garden of the Winter Palace, close to the swimming pool. The Pavillon shares many amenities with the Winter Palace, including the gardens, pools, tennis courts, terraces and restaurants. The hotel is owned by the Egyptian General Company for Tourism & Hotels ("EGOTH") of Egypt and managed by Accor, a French Hotel company, where it is part of the prime division Sofitel. The Hotel is featured on the exclusive Palace Hotels of the World. The Winter Palace has 5 restaurants. The 1886 Restaurant, which serves French cuisine, is named after the date the hotel inaccurately advertises that it was founded. It and the la Corniche Restaurant (international cuisine) are both located in the historic Palace wing. The Bougainvilliers (international cuisine) is in the Pavilion wing, while the Palmetto (Italian cuisine and snacks) and the El Tarboush (Egyptian cuisine) are in the garden close to the swimming pool.</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="edithoteloverview">Enter Hotel Overview</label>
                                                <textarea class="form-control" id="edithoteloverview" rows="15" name="comment" form="usrform"> Overview </textarea>
                                            </div>
                                            <a href="#">Show Gallery</a><br>
                                            <div class="form-group">
                                                <label for="fileToUpload">Upload Gallery of Hotel</label>
                                                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                                            </div>
                                            <br><br>
                                            ';
        


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