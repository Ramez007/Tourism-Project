<?php
  require_once("app/model/model.php");
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'C:\xampp\composer\vendor\autoload.php';
  
?>

<?php

class User extends Model {

	private $id;
	private $name;
	private $email;
	private $username;
	private $password;
	private $dbh;

	private $noofsingle;
    private $noofdouble;
    private $nooftriple;
    private $noofsuites;


    function __construct() {
        $this->dbh = $this->connect();
	}
	
	function checkavailabilty()
    {
       if(isset($_POST['hotelselect']))
       {
        $hotelid=$_POST['hotelselect'];

        $sql="SELECT count(*)as single from rooms where Status='Free' and RoomType='Single' and HotelID='$hotelid'";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        $row=mysqli_fetch_assoc($result);
        $this->noofsingle=$row['single'];

        $sql1="SELECT count(*)as number from rooms where Status='Free' and RoomType='Double' and HotelID='$hotelid'";
        $result1=mysqli_query($this->dbh->getConn(),$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $this->noofdouble=$row1['number'];

        $sql2="SELECT count(*)as triple from rooms where Status='Free' and RoomType='Triple' and HotelID='$hotelid'";
        $result2=mysqli_query($this->dbh->getConn(),$sql2);
        $row2=mysqli_fetch_assoc($result2);
        $this->nooftriple=$row2['triple'];

        $sql3="SELECT count(*)as Suites from rooms where Status='Free' and RoomType='Suites' and HotelID='$hotelid'";
        $result3=mysqli_query($this->dbh->getConn(),$sql3);
        $row3=mysqli_fetch_assoc($result3);
        $this->noofsuites=$row3['Suites'];
       }

    }

	function login_with_G()
	{
		// echo "".$_SESSION['fname']."";
		// echo "".$_SESSION['lname']."";
		// echo "".$_SESSION['Email']."";
		$sql1="SELECT * FROM guest where Email='{$_SESSION['Email']}'";
		$result1=mysqli_query($this->dbh->getConn(),$sql1);
		$rowcount=mysqli_fetch_assoc($result1);
		if($rowcount<1)
		{
			$sql="INSERT INTO guest (FirstName,LastName,Email) values ('".$_SESSION['fname']."','".$_SESSION['lname']."','".$_SESSION['Email']."')";
			$result=mysqli_query($this->dbh->getConn(),$sql);
		}
		

		$sql2="SELECT GuestID from guest where Email='{$_SESSION['Email']}'";
		$result2=mysqli_query($this->dbh->getConn(),$sql2);
		$row=mysqli_fetch_assoc($result2);
		$_SESSION["ID"]=$row["GuestID"];
		

	}

    function Login()
    {
		
        
			$user=$_POST['username'];
			$pass=$_POST['password'];
			$passhashed=md5($pass);

			

			$sql="SELECT * from login where username='$user'";
			$result=mysqli_query($this->dbh->getConn(),$sql);
			$count=mysqli_num_rows($result);
			
			if($count>0)
			{
				$sql1="SELECT * from login where username='$user' and (password='$pass' or password='$passhashed')";
				$result1=mysqli_query($this->dbh->getConn(),$sql1);
				$count1=mysqli_num_rows($result1);

				if ($count1>0)
				{
					$row1=mysqli_fetch_assoc($result1);
					if($row1['EmpID']!="")
					{
						$sql2="SELECT * from employees where EmployeeID='".$row1['EmpID']."' ";
						$result2=mysqli_query($this->dbh->getConn(),$sql2);
						$count2=mysqli_num_rows($result2);
						if ($count2>0)
						{
							$row=mysqli_fetch_assoc($result2);

							if ($row['JobType']=="ADMIN")
							{
								$_SESSION["ID"]=$row["EmployeeID"];
								$_SESSION["Name"]=$row['Name'];
								$_SESSION["type"]=$row['JobType'];
								$_SESSION["Email"]=$row['Email'];
								header ("Location:Admin.php");
							}
							else if ($row['JobType']=="SUPPORT")
							{
								$_SESSION["ID"]=$row["EmployeeID"];
								$_SESSION["Name"]=$row['Name'];
								$_SESSION["type"]=$row['JobType'];
								$_SESSION["Email"]=$row['Email'];
								header ("Location:Support.php");
							}
						}
					}
					else
					{	
						$sql3="SELECT * from guest where GuestID='".$row1['GuestID']."'";
						$result3=mysqli_query($this->dbh->getConn(),$sql3);
						$row2=mysqli_fetch_assoc($result3);
						$_SESSION["ID"]=$row2["GuestID"];
						$_SESSION["fname"]=$row2["FirstName"];
						$_SESSION["lname"]=$row2["LastName"];
						$_SESSION["Email"]=$row2["Email"];
						$_SESSION["Gender"]=$row2["Gender"];
						$_SESSION["Pass"]=$passhashed;
						$_SESSION["type"]="USER";
						header ("Location:Profile.php");

					}
				}
				else
				{
					echo "<script>alert('Password is incorrect'); </script>";
				}
			}
			else
			{
				echo "<script> alert('Username is incorrect');</script>";
			}



	
	}
	
	public function ForgotPass($Email)
	{
		$SQL = 'SELECT GuestID from guest WHERE Email="'.$Email.'"';
		$Result = mysqli_query($this->dbh->getConn(),$SQL);
		$ID = mysqli_fetch_assoc($Result);

		include_once "serverdetails.php";
		try
		{
            
			$email->addAddress("".$Email."");
			$email->Subject="Speedo Tours - Reset your password";
			$email->Body="You required to reset the password on your account. Please click this link to reset your account's passsword: http://localhost/Tourism-Project/ResetPassword.php?action=".$ID['GuestID']."";
			$email->SetFrom("speedtourscentral@gmail.com");
			$email->AddReplyTo("speedtourscentral@gmail.com","SpeedoToursSupport");
			$email->send();
		}
		catch(Exception $e)
		{
	   		$errormsg = $e->errorMessage();
	   		echo'<script>swal("Invalid Email", "", "error");</script>';
   		} 


	}

	public function ResetPass($ID,$Password)
	{
		$SQL = 'UPDATE login SET login.password="'.md5($Password).'" WHERE GuestID="'.$ID.'"';
		$SQL2 = 'UPDATE guest SET guest.Password="'.md5($Password).'" WHERE GuestID="'.$ID.'"';
		$Result = mysqli_query($this->dbh->getConn(),$SQL) or die($this->db->getConn()->error);
		$Result2 = mysqli_query($this->dbh->getConn(),$SQL2) or die($this->db->getConn()->error);
	}


	/**
	 * Get the value of username
	 */ 
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Set the value of username
	 *
	 * @return  self
	 */ 
	public function setUsername($username)
	{
		$this->username = $username;

		return $this;
	}

	public function getNoofsingle()
    {
        return $this->noofsingle;
    }

    /**
     * Get the value of noofdouble
     */ 
    public function getNoofdouble()
    {
        return $this->noofdouble;
    }

    /**
     * Get the value of nooftriple
     */ 
    public function getNooftriple()
    {
        return $this->nooftriple;
    }

    /**
     * Get the value of noofsuites
     */ 
    public function getNoofsuites()
    {
        return $this->noofsuites;
    }

	/**
	 * Get the value of password
	 */ 
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set the value of password
	 *
	 * @return  self
	 */ 
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}
}

?>