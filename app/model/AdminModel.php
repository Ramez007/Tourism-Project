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

    function AddHotel()
    {

    }

}

?>