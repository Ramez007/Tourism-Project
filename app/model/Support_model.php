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

public function FetchInquiries()
{
    $Inquiries = array();
    $SQL = 'SELECT Email,InquiryID FROM inquiries';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    while($row = $Result->fetch_assoc())
    {
        $Inq = new Inquiry();
        $Inq -> setEmails($row['Email']);
        $Inq -> setInquiryID($row['InquiryID']);
        array_push($Inquiries,$Inq);
    }
    return $Inquiries;
}

public function FetchSingleInquiry($InquiryID)
{
    $SQL = 'SELECT Inquiry FROM inquiries WHERE InquiryID ='.$InquiryID.'';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    $row = $Result->fetch_assoc();
    return $row;
}





}

class Inquiry extends Model
{
    private $Emails;
    private $Inquiries;
    private $InquiryID;

    /**
     * Get the value of Emails
     */ 
    public function getEmails()
    {
        return $this->Emails;
    }

    /**
     * Set the value of Emails
     *
     * @return  self
     */ 
    public function setEmails($Emails)
    {
        $this->Emails = $Emails;

        return $this;
    }

    /**
     * Get the value of Inquiries
     */ 
    public function getInquiries()
    {
        return $this->Inquiries;
    }

    /**
     * Set the value of Inquiries
     *
     * @return  self
     */ 
    public function setInquiries($Inquiries)
    {
        $this->Inquiries = $Inquiries;

        return $this;
    }

    /**
     * Get the value of InquiryID
     */ 
    public function getInquiryID()
    {
        return $this->InquiryID;
    }

    /**
     * Set the value of InquiryID
     *
     * @return  self
     */ 
    public function setInquiryID($InquiryID)
    {
        $this->InquiryID = $InquiryID;

        return $this;
    }
}

?>
</body>
</html>
