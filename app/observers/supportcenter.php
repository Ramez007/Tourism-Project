<?php 
require_once "app/interfaces/IMail.php";
//require_once("app/interfaces/IReciever.php");
require_once "app/observers/Subject.php";
require_once "app/observers/Recievers.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php'; 


class supportcenter extends subjects implements iInquiry
{
    private $dbh;
    protected $recparr= array();
    // protected $recpmailarr= array();

    public function __construct()
    { 
    
        $this->dbh = $this->connect();
    }
    public function replytoInquiry()
    {
        include_once 'serverdetails.php';
        $ID=$_SESSION['ID'];
        $inquiryidrecieve=$_POST["emailinquiry"];
        $inquiryidspace=explode(" ", $inquiryidrecieve);
        $inquiryid=explode("&", $inquiryidspace[1]);
        $message=$_POST['reply'];
        $Subject="Reply to your inquiry ";
        $recp= new reciever($this) ;
 
        $sql2 = 'SELECT Email,inquiry FROM Inquiries where inquiries.InquiryID="'.$inquiryid[0].'";';
    
        // $sql3 = 'DELETE  FROM Inquiries where InquiryID="'.$inquiryid[0].'";';
        $result1=mysqli_query($this->dbh->getConn(), $sql2) ;
        $row=$result1->fetch_assoc();
        $sql1 = 'INSERT INTO InquiryHistory (employeeID,Inquiry,Reply) VALUES("'.$ID.'","'. $row['inquiry'].'","'.$message.'");';
        $result = mysqli_query($this->dbh->getConn(), $sql1) ;
 
 


        $recp->setmail($row['Email']);
        $email->addAddress($recp->getmail());
        array_push($this->recparr, $recp);
        $this->notifyinquiry($message, $Subject);
    
}

    public function notifyinquiry($message,$subject){
        include_once "serverdetails.php";
        for($i=0;$i<count($this->recparr);$i++){

            $this->recparr[$i]->update($message,$subject);
        }
        


}
public function sendmail($message,$subject){
    include_once 'serverdetails.php';
    
   //include_once 'C:/xampp/htdocs/Tourism-Project/app/model/serverdetails.php';
    try{
        $email->Subject=$subject;
         $email->Body=$message;
         $email->send();
       echo "hello";
       
         
          echo'<script>swal("Successfully sent your reply", "", "success");</script>'; 
         
    }catch(Exception $e){
        echo $e->errorMessage();
     

    }
}
}









?>