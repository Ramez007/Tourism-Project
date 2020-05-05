<?php
  require_once("app/model/model.php");
?>

<?php

class User extends Model {

	private $id;
	private $name;
	private $email;
	private $username;
	private $password;
    private $dbh;

    function __construct() {
        $this->dbh = $this->connect();
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
		if ($_POST['Selectjob']=="0")
        {
            echo '<script>
                            alert("Please Select a User type first")
                            </script>';
		}
		else 
		{
        
			$user=$_POST['username'];
			$pass=$_POST['password'];
			if ($_POST['Selectjob']=="Admin")
			{
				$sql="SELECT * From employees where Username='$user'";
				$result=mysqli_query($this->dbh->getConn(),$sql);
				$row=mysqli_fetch_assoc($result);
				if ($row['JobType']=="ADMIN")
				{
				$_SESSION["ID"]=$row["EmployeeID"];
				$_SESSION["Name"]=$row['Name'];
				$_SESSION["type"]=$row['JobType'];
				$_SESSION["Email"]=$row['Email'];
				header ("Location:Admin.php");
				}
				else
            	{
                echo '<script> alert("Invalid Username or Password") </script>';
           		}
			}
			else if ($_POST['Selectjob']=="Support")
			{
				$sql="SELECT * From employees where Username='$user'";
				$result=mysqli_query($this->dbh->getConn(),$sql);
				$row=mysqli_fetch_assoc($result);
				if ($row['JobType']=="SUPPORT")
				{
				$_SESSION["ID"]=$row["EmployeeID"];
				$_SESSION["Name"]=$row['Name'];
				$_SESSION["type"]=$row['JobType'];
				$_SESSION["Email"]=$row['Email'];
				header ("Location:Support.php");
				}
				else
            	{
                echo '<script> alert("Invalid Username or Password") </script>';
           		}
			}
			else if ($_POST['Selectjob']=="Guest")
			{
				$sql="SELECT * FROM guest where Username='$user'";
				$result=mysqli_query($this->dbh->getConn(),$sql);
				$row=mysqli_fetch_assoc($result);
				$_SESSION["ID"]=$row["GuestID"];
				$_SESSION["fname"]=$row["FirstName"];
				$_SESSION["lname"]=$row["LastName"];
				$_SESSION["Email"]=$row["Email"];
				$_SESSION["Gender"]=$row["Gender"];
				$_SESSION["type"]="USER";
				header ("Location:Profile.php");
				
			}
		}	
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