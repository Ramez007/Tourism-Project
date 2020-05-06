<?php 
require_once "app/interfaces/IMail.php";
//require_once("app/interfaces/IReciever.php");
require_once "app/observers/Subject.php";
require_once "app/observers/Recievers.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php'; 
require 'serverdetails.php';


class supportcenter extends subjects implements iInquiry,inewswire
{
    private $dbh;
    protected $recparr= array();
    protected $mailsss= array();
    // protected $recpmailarr= array();
    protected  $email;
    public function __construct()
    { 
        $this->email=$GLOBALS['Email'];
        $this->dbh = $this->connect();
    }
    public function replytoInquiry()
    {
       
        $ID=$_SESSION['ID'];
        $inquiryidrecieve=$_POST["emailinquiry"];
        $inquiryidspace=explode(" ", $inquiryidrecieve);
        $inquiryid=explode("&", $inquiryidspace[1]);
        $message=$_POST['reply'];
        $Subject="Reply to your inquiry ";
        $recp= new reciever($this) ;
        $sql2 = 'SELECT Email,inquiry FROM Inquiries where inquiries.InquiryID="'.$inquiryid[0].'";';
    
       $sql3 = 'DELETE  FROM Inquiries where InquiryID="'.$inquiryid[0].'";';
        $result1=mysqli_query($this->dbh->getConn(), $sql2) ;
        $row=$result1->fetch_assoc();
        $sql1 = 'INSERT INTO InquiryHistory (employeeID,Inquiry,Reply) VALUES("'.$ID.'","'. $row['inquiry'].'","'.$message.'");';
        $result = mysqli_query($this->dbh->getConn(), $sql1) ;
        
        mysqli_query($this->dbh->getConn(),$sql3);
 

        
        $recp->setmail($row['Email']);
        array_push($this->recparr, $recp);
        $this->notifyinquiry($message, $Subject);
    
}
public function sendGuestmail()
{
    $guestmail=$_POST['GuestEmails'];
    $message=$_POST['gumail'];  
    $Subject="Notification from speedotours management";
    $recp= new reciever($this) ;
    $recp->setmail($guestmail);
    array_push($this->recparr, $recp);
    $this->notifyinquiry($message, $Subject);

}
    public function notifyinquiry($message,$subject){
        for($i=0;$i<count($this->recparr);$i++){

            $this->recparr[$i]->update($message,$subject);
        }
        


}
public function sendnewswire(){
    $ID=$_SESSION['ID'];
    $Subject="New wire Update";
    $sql = ' Select Email from newswire' ;
    $Message=$_POST['news'];  ;
    $result = mysqli_query($this->dbh->getConn(), $sql) ;
            
    while ($row=$result->fetch_assoc()) {
        $sql1 = 'INSERT INTO newswirehistory (employeeID,Message,Email) VALUES("'.$ID.'","'.$Message.'","'.$row["Email"].'");';
       if ($result1 = mysqli_query($this->dbh->getConn(), $sql1)) {
           $recp= new reciever($this) ;
           $recp->setmail($row["Email"]);
           array_push($this->recparr, $recp);
           array_push($this->mailsss, $row["Email"]);
         
        }
       
    } $this->notifynewswire($Message, $Subject);
}

public function notifynewswire($message,$subject){



   
 for($i=0;$i<count($this->recparr);$i++){
        $this->recparr[$i]->update($message,$subject);
}

    


}


public function sendPackagereport(){
  $message=$_POST['Packagemail'];  
  $id =$_POST['PackageEmails'];
  $Subject="Package report";  
 
  $SQL = 'SELECT Email FROM guest join reserves where guest.GuestID=reserves.GuestId and reserves.Suspended= "Enabled"  and reserves.PackageId="'.$id.'";';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);     
    while ($row=$Result->fetch_assoc()) {
      
           $recp= new reciever($this) ;
           $recp->setmail($row["Email"]);
           array_push($this->recparr, $recp);
           array_push($this->mailsss, $row["Email"]);
         
        }
       
     $this->notifynewswire($message, $Subject);
}


public function sendmail($message,$subject,$mail){
    
    
    
    
  
   
   
$this->email->AddAddress($mail);
   
    try{ 
        $this->email->Subject=$subject;
        $this->email->Body=$message;
        $this->email->send();
        $this->email->ClearAllRecipients( );
       
       
         
          echo'<script>swal("Successfully sent your reply", "", "success");</script>'; 
         
    }catch(Exception $e){
        echo $e->errorMessage();
     

    }
}
}









?>