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
     $email->Subject="New wire Update";
            $email->Body=$_POST['news'];    
         
$sql = "Select Email from newswire" ; 
        $result = mysqli_query($this->dbh->getConn(),$sql) ;
         try{
         while($row=$result->fetch_assoc()){
           
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
