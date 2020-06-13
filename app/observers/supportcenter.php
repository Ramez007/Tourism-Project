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
    // protected $mailsss= array();
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
        
        $Subject="Reply to your inquiry ";
        $recp=  $this->addobserver() ;
        $sql2 = 'SELECT Email,inquiry,Author FROM Inquiries where inquiries.InquiryID="'.$inquiryid[0].'";';
    
       $sql3 = ' UPDATE `inquiries` SET `Suspended` = "Enabled" WHERE `inquiries`.`InquiryID` ="'.$inquiryid[0].'";';
        $result1=mysqli_query($this->dbh->getConn(), $sql2) ;
        $row=$result1->fetch_assoc();
        $message= $_POST['reply'];
        $Subject=$row['inquiry'];
        $sql1 = 'INSERT INTO InquiryHistory (employeeID,ID,Inquiry,InquiryAuthor,InquiryEmail,Reply) VALUES("'.$ID.'","'.$inquiryid[0].'","'. $row['inquiry'].'","'. $row['Author'].'","'. $row['Email'].'","'.$message.'");';
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
    $recp=  $this->addobserver() ;
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
     $Message=$_POST['news']  ;
    $result = mysqli_query($this->dbh->getConn(), $sql) ;
            
    while ($row=$result->fetch_assoc()) {
        $sql1 = 'INSERT INTO newswirehistory (employeeID,Message,Email) VALUES("'.$ID.'","'.$Message.'","'.$row["Email"].'");';
       if ($result1 = mysqli_query($this->dbh->getConn(), $sql1)) {
           $recp=  $this->addobserver() ;
           $recp->setmail($row["Email"]);
           array_push($this->recparr, $recp);
        //    array_push($this->mailsss, $row["Email"]);
         
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
      
           $recp=  $this->addobserver() ;
           $recp->setmail($row["Email"]);
           array_push($this->recparr, $recp);
         //  array_push($this->mailsss, $row["Email"]);
         
        }
       
     $this->notifynewswire($message, $Subject);
}


public function sendmail($message,$subject,$mail)
{
 
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
public function sendmailwithimage($message,$subject,$mail,$image)
{
 
$this->email->AddAddress($mail);
 //$encodedData = str_replace(' ','+',$image[1]);
 $data = explode( ',', $image);
$decodedData = base64_decode($data[1]);
// $folderPath = "C:/xampp/htdocs/Tourism-Project/image.jpg";


// $image_parts = explode(";base64,", $encodedData);

// $image_type_aux = explode("image/", $image_parts[0]);

// $image_type = $image_type_aux[1];

// $image_base64 = base64_decode($image_parts[1]);

// //$file = $folderPath . uniqid() . '.jpg';


// file_put_contents($folderPath, $decodedData);
//file_put_contents('C:\xampp\htdocs\Tourism-Project\app\Image.JPG',$decodedData);    
try{ $this->email->AddStringAttachment($decodedData,'newImage.jpg'); 
        $this->email->Subject=$subject;
        $this->email->Body=$message;
        $this->email->send();
        $this->email->ClearAllRecipients( );
       
       
         
          echo'<script>swal("Successfully sent your reply", "", "success");</script>'; 
         
    }catch(Exception $e){
        echo $e->errorMessage();
     

    }
}
public function notify_all_admin($subject,$message,$image)
{   
    $SQL = 'SELECT Email FROM guest ;';
    $Result = mysqli_query($this->dbh->getConn(),$SQL); 
    

    while ($row=$Result->fetch_assoc()) {
        $recp=  $this->addobserver() ;
        $recp->setmail($row["Email"]);
        if ($image!=null) {
            $recp->updatewithimage($message, $subject, $image);
        } else {
            $recp->update($message, $subject);
        }
    }
 
}








public function addobserver(){  

    $recp= new reciever($this);


return $recp;

}


}









?>