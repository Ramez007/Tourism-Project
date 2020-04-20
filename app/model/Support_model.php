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
           echo'<script>swal("Successfully sent the newsWire", "", "success");</script>'; 
    }catch(Exception $e){
        echo $e->errorMessage();
     
    }
    
}

function Reply_to_Inquiry(){
    include_once "serverdetails.php";
    

    $ID=$_SESSION['ID'];
    $inquiryid=$_POST["inquiryid"];
    $name=$_POST['name'];
    $mail=$_POST['sendermail'];
    $message=$_POST['message'];
    $email->Subject="Reply to your inquiry ";
    
    try{
        $sql1 = 'INSERT INTO InquiryHistory (employeeID,Reply,ID) VALUES("'.$ID.'","'.$message.'","'.$row["Email"].'");';
        $sql2 = 'DELETE FROM Inquiries where inquiries.InquiryID="'.$inquiryid.'";';
         $result = mysqli_query($this->dbh->getConn(),$sql1) ;
         $email->addAddress("$mail","$name");
         $email->Body=$message;
         $email->send();
         $result = mysqli_query($this->dbh->getConn(),$sql2) ;
         echo'<script>swal("Successfully sent your reply", "", "success");</script>'; 
}catch(Exception $e){
    echo $e->errorMessage();
 
} 

}







}

?>
</body>
</html>
