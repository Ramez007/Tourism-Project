<html>
<head><script src="js/sweetalert.min.js"></script></head>

<body>
<?php
  require_once("app/model/model.php");
?>

<?php

class subscribe extends Model {

    private $dbh;

    function __construct() {
        $this->dbh = $this->connect();
    }

    function subscribe_news_wire()
    {
            $sql = "Select * from newswire where Email = '".$_POST['em']."'" ; 
            $result = mysqli_query($this->dbh->getConn(),$sql) ;
            if($row=mysqli_fetch_array($result))
            { 
				echo'<script>swal("This Email is already Subscribed To our newswire");</script>';
            }
            else
            {
                $sql1="INSERT INTO newswire (Email) values ('".$_POST['em']."')";
                $result2=mysqli_query($this->dbh->getConn(),$sql1);
                echo'<script>swal("Successfully Subscribed To Newswire", "", "success");</script>'; 
            }
    }

}

?>
</body>
</html>