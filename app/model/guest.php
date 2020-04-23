<?php
  require_once("app/model/model.php");
  require_once("app/model/user.php");
  require_once("app/model/reservations.php");
?>

<?php

class Guest extends User {
    private $Bank_Account_No;
    private $Country;
    private $City;
    private $Passport_No;
    private $National_ID_No;
    private $reservations = array();

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
        $sql1="Select * from guest where Username='$user' ";
        $res=mysqli_query($this->dbh->getConn(),$sql1);
        $rowcount=mysqli_num_rows($res);
        if ($rowcount<1){
            $fname=$_POST['FirstName'];
            $lname=$_POST['LastName'];
            $email=$_POST['Email'];
            $pass=$_POST['Password'];
            $gend=$_POST['SelecGender'];
            $sql="INSERT INTO guest (FirstName,LastName,Gender,Email,Username,Password) VALUES('$fname','$lname','$gend','$email','$user','$pass');";
            $result=mysqli_query($this->dbh->getConn(),$sql);
            $this->name=$fname;
            $this->email=$email;
            $this->password=$pass;
            $this->username->$user;
            header("Location:Login.php");
        }
        else {echo '<script> alert("Username Already Exists")</script>';}
    
        }
    }

    public function GetProfileData($ID)
    {
        $SQL = 'SELECT Country,HotelID,PackageID,DateIn,DateOut,reserves.Suspended FROM guest INNER JOIN reserves ON guest.GuestID ='.$ID.' AND reserves.GuestID = '.$ID.'';
        $Result = mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);        
        while ($row = $Result->fetch_assoc())
        {
        $Res = new Reservation();
        $Res->setHotelID($row['HotelID']);
        $Res->setPackageID($row['PackageID']);
        $Res->setDateIn($row['DateIn']);
        $Res->setDateOut($row['DateOut']);
        $Res->setSuspended($row['Suspended']);
        array_push($this->reservations,$Res);
        }
        $this->Country = $row['Country'];
        
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
}

?>