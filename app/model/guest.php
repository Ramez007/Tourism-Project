<html>
<head><script src="js/sweetalert.min.js"></script>
</head>
<body>

<?php
  require_once("app/model/model.php");
  require_once("app/model/user.php");
  require_once("app/model/reservations.php");
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'C:\xampp\composer\vendor\autoload.php';
?>

<?php

class Guest extends User {
    private $Bank_Account_No;
    private $Country;
    private $City;
    private $Passport_No;
    private $National_ID_No;
    private $reservations = array();
    private $img;

    function __construct() {
        $this->dbh = $this->connect();
    }

   
    function register()
    {
        if ($_POST['SelecGender']=="0")
        {
            echo '<script>
                            alert("Please Select a valid gender")
                            </script>';
        }
        else{
        $user=$_POST['UserName'];
        $sql1="Select * from login where username='$user' ";
        $res=mysqli_query($this->dbh->getConn(),$sql1);
        $rowcount=mysqli_num_rows($res);
        $SQL = 'SELECT Email from guest WHERE Email="'.$_POST['Email'].'"';
        $Result = mysqli_query($this->dbh->getConn(),$SQL);
        $rowcount2 = mysqli_num_rows($Result);
        if ($rowcount<1 && $rowcount2 < 1){
            $fname=$_POST['FirstName'];
            $lname=$_POST['LastName'];
            $email=$_POST['Email'];
            $pass=$_POST['Password'];
            $gend=$_POST['SelecGender'];
            $country = $_POST['Country'];
            $sql="INSERT INTO guest (FirstName,LastName,Gender,Email,Username,Password,Country) VALUES('$fname','$lname','$gend','$email','$user','$pass','$country');";
            $result=mysqli_query($this->dbh->getConn(),$sql);
            $sql1="INSERT INTO login (username,password) values('$user','$pass')";
            $result1=mysqli_query($this->dbh->getConn(),$sql1);
            $this->name=$fname;
            $this->email=$email;
            $this->password=$pass;
            $this->username->$user;
            $this->Country = $country;
            header("Location:Login.php");
        }
        else {echo '<script> alert("Username and/or Email Already Exists")</script>';}
    
        }
    }

    public function GetProfileData($ID)
    {
        $SQL = 'SELECT ReserveID,HotelID,PackageID,DateIn,DateOut,reserves.Suspended,Status FROM guest INNER JOIN reserves ON guest.GuestID ='.$ID.' AND reserves.GuestID = '.$ID.'';
        $Result = mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);        
        while ($row = $Result->fetch_assoc())
        {
        $Res = new Reservation();
        $Res->setReserveID($row['ReserveID']);
        $Res->setHotelID($row['HotelID']);
        $Res->setPackageID($row['PackageID']);
        $Res->setDateIn($row['DateIn']);
        $Res->setDateOut($row['DateOut']);
        $Res->setSuspended($row['Suspended']);
        $Res->setStatus($row['Status']);
        array_push($this->reservations,$Res);
        }
        $SQL2 = 'SELECT Country,BankAccount,NationalID,PassportNumber,Username,Password,Image FROM guest WHERE GuestID='.$ID.'';
        $Res2 = mysqli_query($this->dbh->getConn(),$SQL2);
        $Data = $Res2->fetch_assoc();
        $this->setCountry($Data['Country']);
        $this->setBank_Account_No($Data['BankAccount']);
        $this->setPassport_No($Data['PassportNumber']);
        $this->setNational_ID_No($Data['NationalID']);
        $this->setUsername($Data['Username']);
        $this->setPassword($Data['Password']);
        $this->setImg($Data['Image']);

        
    }

    public function EditProfile($Fname,$Lname,$Email,$BankAcc,$Passport,$NationalID,$User,$Pass,$Country)
    {
        if($Pass !="")
        {
        $SQL = 'UPDATE guest SET FirstName="'.$Fname.'",LastName="'.$Lname.'", Email="'.$Email.'", BankAccount="'.$BankAcc.'", PassportNumber="'.$Passport.'", NationalID="'.$NationalID.'", Country="'.$Country.'", Password="'.$Pass.'" WHERE GuestID='.$_SESSION["ID"].'';
        $_SESSION["fname"]=$Fname;
        $_SESSION["lname"]=$Lname;
        $_SESSION["Email"]=$Email;
        mysqli_query($this->dbh->getConn(),$SQL) ;

        
        $sql1="UPDATE login set password='$Pass' where username='$User'";
        return mysqli_query($this->dbh->getConn(),$sql1);
        }
        else
        {
        $SQL = 'UPDATE guest SET FirstName="'.$Fname.'",LastName="'.$Lname.'", Email="'.$Email.'", BankAccount="'.$BankAcc.'", PassportNumber="'.$Passport.'", NationalID="'.$NationalID.'", Country="'.$Country.'" WHERE GuestID='.$_SESSION["ID"].'';
        $_SESSION["fname"]=$Fname;
        $_SESSION["lname"]=$Lname;
        $_SESSION["Email"]=$Email;
        return mysqli_query($this->dbh->getConn(),$SQL) ;

        }
        
    }
    public function EditProfilePic($file)
    {
        $SQL = 'UPDATE guest SET Image="'.$file.'" WHERE GuestID='.$_SESSION["ID"].'';
        return mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);
    }
    public function CancelPackage($PackageID,$ReserveID)
    {
        $SQL = 'DELETE FROM reserves WHERE PackageID='.$PackageID.' AND GuestID='.$_SESSION["ID"].' AND ReserveID='.$ReserveID.'';
        return mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);
    }
    public function CancelHotel($HotelID,$ReserveID,$DateIn,$DateOut)
    {
        $SQL = 'DELETE FROM reserves WHERE HotelID='.$HotelID.' AND GuestID='.$_SESSION["ID"].' AND ReserveID='.$ReserveID.'';
        $SQL2= 'UPDATE rooms SET Status="Free", DateIn="2000-01-01", DateOut="2000-01-01", GuestID = NULL WHERE HotelID='.$HotelID.' AND GuestID='.$_SESSION["ID"].' AND DateIn="'.$DateIn.'" AND DateOut="'.$DateOut.'"';
        $RoomQuery = mysqli_query($this->dbh->getConn(),$SQL2) or die($this->dbh->getConn()->error);
        $ResQuery = mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);
        if($RoomQuery == true && $ResQuery == true)
        {
            return true;
        }
        else return false;
    }

    public function ReviewHotel($hotelname,$review)
    {
        $sql="SELECT HotelID from hotel where Name='$hotelname'";
        $Result = mysqli_query($this->db->getConn(),$sql);
        $row=$Result->fetch_assoc();

        $gid=$_SESSION["ID"];
        $hid=$row["HotelID"];

        $sql1="INSERT INTO reviews (GuestID,HotelID,Review,Featured) values ('$gid','$hid','$review','FALSE')";
        $Result1 = mysqli_query($this->db->getConn(),$sql1);
        if($Result1){
            echo'<script>swal("Successfully Added", "", "success");</script>';
        }
        else{
            echo'<script>
                                    swal("Oops","Error Adding Review !","error");
                                    </script>';
        }
    }

    public function ReviewPkg($pkgid,$review)
    {
        $gid=$_SESSION["ID"];
        $sql1="INSERT INTO reviews (GuestID,PackageID,Review,Featured) values ('$gid','$pkgid','$review','FALSE')";
        $Result1 = mysqli_query($this->db->getConn(),$sql1);
        if($Result1){
            echo'<script>swal("Successfully Added", "", "success");</script>';
        }
        else{
            echo'<script>
                                    swal("Oops","Error Adding Review !","error");
                                    </script>';
        }
    }

    public function BookPackage($GuestID,$PackageID)
    {

        $mysql="select NoofChildren,NoofAdults from reserves where PackageId=$PackageID";
        $res=mysqli_query($this->db->getConn(),$mysql);
        $numberofadults=0;
        $numberofchildren=0;
        while ($row2=$res->fetch_assoc())
        {
            $numberofadults+=$row2['NoofAdults'];
            $numberofchildren+=$row2['NoofChildren'];
        }

        $sumofpeople=$numberofadults+$numberofchildren+$_POST['noofchildren']+$_POST['noofadults'];


        $sql="Select * from packages where PackageID='$PackageID'";
        $result=mysqli_query($this->db->getConn(),$sql);
        $row=mysqli_fetch_assoc($result);

        if ($sumofpeople<=$row['ReserveLimit'])
        {

        $sql5="Select Email from guest where GuestID=$GuestID";
        $result6=mysqli_query($this->db->getConn(),$sql5);
        $row6=mysqli_fetch_assoc($result6);

        $children=$_POST['noofchildren'];
        $adults=$_POST['noofadults'];
        $Datein=$row['DateIn'];
        $Dateout=$row['DateOut'];
        $single=$_POST['singlerooms'];
        $double=$_POST['doublerooms'];
        $triple=$_POST['triplerooms'];
        $suites=$_POST['suites'];
        $board=$_POST['boardtype'];

        $totalprice=$row['Price'];
        $totalprice=$totalprice*(int) $_POST['noofadults'];
        $price=($row['Price']/2)*(int) $children;
        $totalprice=$totalprice+$price;
        $confirmprice=$totalprice*0.1;

        $sql2="INSERT INTO reserves (GuestId,PackageId,NoofChildren,NoofAdults,DateIn,Suspended,DateOut,NoOfSingleRooms,NoOfDoubleRooms,NoOfTripleRooms,NoOfSuits,BoardType,price,Status) values ('$GuestID','$PackageID','$children','$adults','$Datein','Enabled','$Dateout','$single','$double','$triple','$suites','$board','$totalprice','Waiting for approval')";
        $res4=mysqli_query($this->db->getConn(),$sql2);

        if ($res4)
        {
            $Email_Body="<h2>Your Booking Has been Sent To SpeedoTours And Pending Approval</h2>
            <br>
            <h3> for ".$row['PackageName']."<h3>
            <br>
            Booking Detalis:
            <br>
            $single :Single Rooms
            <br>
            $double :Double Rooms
            <br>
            $triple :Triple Rooms
            <br>
            $suites :Suits
            <br>
            $board Board
            <br>
            $Datein : Check In Date
            <br>
            $Dateout : Check Out Date
            <br>
            $totalprice : Price
            <br>

            <h3>Please Pay 10% of the total price which is $confirmprice in order to confirm the booking</h3>
            <h3>Please contact us by telephone number : 0212244553 in order to pay the deposit</h3>
            <br>
            <h3>For Other Inquires Please contact us through our contact us page or by using our email which is : Speedotourscentral@gmail.com</h3> 


            <h4> May You Have A Pleasent Stay </h4>
            <br>
            <h4> Best Regards From Speedo Tours </h4>";
            
            include_once "serverdetails.php";
            try{
            $email->Subject="Book Package Request";
            $email->Body=$Email_Body;
            $email->addAddress($row6["Email"]);
            $email->send();
            }
            catch(Exception $e)
            {
                echo $e->errorMessage();
            }
          echo'<script>swal("Successfully Booked", "", "success");</script>';

        }
        else{
            echo'<script>
                                    swal("Oops","Error Booking Package !","error");
                                    </script>';
        }
        }
        else
        {
            echo'<script>swal("Booking Error", "Package is already full", "Error");</script>';

        }
    }

    /**
     * Get the value of Country
     */ 
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * Set the value of Country
     *
     * @return  self
     */ 
    public function setCountry($Country)
    {
        $this->Country = $Country;

        return $this;
    }

    /**
     * Get the value of reservations
     */ 
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * Get the value of Bank_Account_No
     */ 
    public function getBank_Account_No()
    {
        return $this->Bank_Account_No;
    }

    /**
     * Set the value of Bank_Account_No
     *
     * @return  self
     */ 
    public function setBank_Account_No($Bank_Account_No)
    {
        $this->Bank_Account_No = $Bank_Account_No;

        return $this;
    }

    /**
     * Get the value of City
     */ 
    public function getCity()
    {
        return $this->City;
    }

    /**
     * Set the value of City
     *
     * @return  self
     */ 
    public function setCity($City)
    {
        $this->City = $City;

        return $this;
    }

    /**
     * Get the value of Passport_No
     */ 
    public function getPassport_No()
    {
        return $this->Passport_No;
    }

    /**
     * Set the value of Passport_No
     *
     * @return  self
     */ 
    public function setPassport_No($Passport_No)
    {
        $this->Passport_No = $Passport_No;

        return $this;
    }

    /**
     * Get the value of National_ID_No
     */ 
    public function getNational_ID_No()
    {
        return $this->National_ID_No;
    }

    /**
     * Set the value of National_ID_No
     *
     * @return  self
     */ 
    public function setNational_ID_No($National_ID_No)
    {
        $this->National_ID_No = $National_ID_No;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }
}

?>

</body>
</html>