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

class writeinquiry extends Model {

    private $dbh;

    function __construct() {
        $this->dbh = $this->connect();
    }

    function write_inquiries()
    { include_once "serverdetails.php";
        $name=$_POST['name'];
        $mail=$_POST['sendermail'];
        $message=$_POST['message'];
        try{
            $sql = "INSERT INTO inquiries (author,Email,Inquiry) values ('$name','$mail','$message')" ; 
             $result = mysqli_query($this->dbh->getConn(),$sql) ;
             $email->addAddress("speedotourscentral@gmail.com");
             $email->Subject="inquiries";
             $email->Body=$message;
             $email->SetFrom("$mail");
             $email->AddReplyTo("$mail",$name);
             $email->send();
             echo'<script>swal("Successfully Sent", "", "success");</script>'; 
    }catch(Exception $e){
        echo $e->errorMessage();
     
    } 
            
    }

}

?>
</body>
</html>