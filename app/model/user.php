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