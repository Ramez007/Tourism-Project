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
        $name=htmlspecialchars($_POST['name'], ENT_QUOTES);
        $mail=htmlspecialchars($_POST['sendermail'], ENT_QUOTES);
        $message=htmlspecialchars($_POST['message'], ENT_QUOTES);
        try{
            
             $email->addAddress("speedtourscentral@gmail.com");
             $email->Subject="inquiries";
             $email->Body=$message;
             $email->SetFrom("$mail");
             $email->AddReplyTo("$mail",$name);
             $email->send();
             $sql = "INSERT INTO inquiries (author,Email,Inquiry) values ('$name','$mail','$message')" ; 
             $result = mysqli_query($this->dbh->getConn(),$sql) ;
             echo'<script>swal("Successfully Sent", "", "success");</script>'; 
    }catch(Exception $e){
        $errormsg = $e->errorMessage();
        echo'<script>swal("Invalid Email", "", "error");</script>'; 
    } 
            
    }

}

?>
</body>
</html>