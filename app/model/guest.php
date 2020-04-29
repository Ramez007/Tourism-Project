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
        $sql1="Select * from guest where Username='$user' ";
        $res=mysqli_query($this->dbh->getConn(),$sql1);
        $rowcount=mysqli_num_rows($res);
        if ($rowcount<1){
            $fname=$_POST['FirstName'];
            $lname=$_POST['LastName'];
            $email=$_POST['Email'];
            $pass=$_POST['Password'];
            $gend=$_POST['SelecGender'];
            $country = $_POST['Country'];
            $sql="INSERT INTO guest (FirstName,LastName,Gender,Email,Username,Password,Country) VALUES('$fname','$lname','$gend','$email','$user','$pass','$country');";
            $result=mysqli_query($this->dbh->getConn(),$sql);
            $this->name=$fname;
            $this->email=$email;
            $this->password=$pass;
            $this->username->$user;
            $this->Country = $country;
            header("Location:Login.php");
        }
        else {echo '<script> alert("Username Already Exists")</script>';}
    
        }
    }

    public function GetProfileData($ID)
    {
        $SQL = 'SELECT HotelID,PackageID,DateIn,DateOut,reserves.Suspended FROM guest INNER JOIN reserves ON guest.GuestID ='.$ID.' AND reserves.GuestID = '.$ID.'';
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
        $SQL = 'UPDATE guest SET FirstName="'.$Fname.'",LastName="'.$Lname.'", Email="'.$Email.'", BankAccount="'.$BankAcc.'", PassportNumber="'.$Passport.'", NationalID="'.$NationalID.'", Country="'.$Country.'", Username="'.$User.'", Password="'.$Pass.'" WHERE GuestID='.$_SESSION["ID"].'';
        mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);
        $_SESSION["fname"]=$Fname;
        $_SESSION["lname"]=$Lname;
        $_SESSION["Email"]=$Email;
    }
    public function EditProfilePic($file)
    {
        $SQL = 'UPDATE guest SET Image="'.$file.'" WHERE GuestID='.$_SESSION["ID"].'';
        mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);
    }
    public function CancelPackage($PackageID)
    {
        $SQL = 'DELETE FROM reserves WHERE PackageID='.$PackageID.' AND GuestID='.$_SESSION["ID"].'';
        return mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);
    }
    public function CancelHotel($HotelID)
    {
        $SQL = 'DELETE FROM reserves WHERE HotelID='.$HotelID.' AND GuestID='.$_SESSION["ID"].'';
        return mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);
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