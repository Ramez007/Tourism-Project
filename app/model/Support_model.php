<html>
<head><script src="js/sweetalert.min.js"></script></head>

<body>
<?php

  require_once("app/model/model.php");
  use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';

?>

<?php

class support_operator extends Model {

    private $dbh;

    function __construct() {
        $this->dbh = $this->connect();
    }

    function Send_newwire()
     {include_once "serverdetails.php";
     $ID=$_SESSION['ID'];
        $email->Subject="New wire Update";
            $email->Body=$_POST['news'];    
         
$sql = "Select Email from newswire" ; 
; 
        $result = mysqli_query($this->dbh->getConn(),$sql) ;
         try{
            
         while($row=$result->fetch_assoc()){
            $sql1 = 'INSERT INTO newswirehistory (employeeID,MessageContent,Email) VALUES("'.$ID.'","'.$email->Body.'","'.$row["Email"].'");';
            $result1 = mysqli_query($this->dbh->getConn(),$sql1) ;
            $email->addAddress($row["Email"]);

        }
           $email->send();
    }catch(Exception $e){
        echo $e->errorMessage();
     
    }
}

}

?>
</body>
</html>
