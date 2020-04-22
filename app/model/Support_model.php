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
    // protected $inquiryar=array();
    protected $Inqemail=array();
    protected $InqId=array();
    protected $Inquiries = array();

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
    $inquiryidrecieve=$_POST["emailinquiry"];
    $inquiryidspace=explode(" ",$inquiryidrecieve);
    $inquiryid=explode("&",$inquiryidspace[1]);
    $message=$_POST['reply'];
    $email->Subject="Reply to your inquiry ";
    // for($i=0;i<count($inquiryar);$i++){

    //     if($this->inquiryar[$i]->$InquiryID=$inquiryid);
    //    echo $finalemail=$this->inquiryar[$i]->Emails;}

        
    
    try{
        $sql2 = 'SELECT Email,inquiry FROM Inquiries where inquiries.InquiryID="'.$inquiryid[0].'";';
    
        $sql3 = 'DELETE  FROM Inquiries where InquiryID="'.$inquiryid[0].'";'; 
        $result1=mysqli_query($this->dbh->getConn(),$sql2) ;
         $row=$result1->fetch_assoc();
        $sql1 = 'INSERT INTO InquiryHistory (employeeID,Inquiry,Reply) VALUES("'.$ID.'","'. $row['inquiry'].'","'.$message.'");';
        $result = mysqli_query($this->dbh->getConn(),$sql1) ;
        
        if(mysqli_query($this->dbh->getConn(),$sql3)){

       
        $email->addAddress($row['Email']);
         $email->Body=$message;
         $email->send();
         
          echo'<script>swal("Successfully sent your reply", "", "success");</script>'; 
         

         }
         else
         echo "error";

        //  $email->addAddress($row['Email']);
        //  $email->Body=$message;
        //  $email->send();
         
        //   echo'<script>swal("Successfully sent your reply", "", "success");</script>'; 
}catch(Exception $e){
    echo $e->errorMessage();
 
} 

}

public function FetchInquiries()
{
    $SQL = 'SELECT Email,InquiryID,Inquiry FROM inquiries';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    while($row = $Result->fetch_assoc())
    {
        array_push($this->Inqemail,$row['Email']);
        array_push($this->InqId,$row['InquiryID']);
        array_push($this->Inquiries,$row['Inquiry']);
    }

}

public function FetchSingleInquiry($val)
{
    return $this->Inquiries[$val];
}






    /**
     * Get the value of Inqemail
     */ 
    public function getInqemail()
    {
        return $this->Inqemail;
    }

    /**
     * Get the value of InqId
     */ 
    public function getInqId()
    {
        return $this->InqId;
    }

    /**
     * Get the value of Inquiries
     */ 
    public function getInquiries()
    {
        return $this->Inquiries;
    }
}

// class Inquiry extends Model
// {
//     protected $Emails ;
//     protected $Inquiries;
//     protected $InquiryID;
//     /**
//      * Get the value of Emails
//      */ 
//     public function getEmails()
//     {
//         return $this->Emails;
//     }

//     /**
//      * Set the value of Emails
//      *
//      * @return  self
//      */ 
//     public function setEmails($Emails)
//     {
//         $this->Emails = $Emails;

//         return $this;
//     }

//     /**
//      * Get the value of Inquiries
//      */ 
//     public function getInquiries()
//     {
//         return $this->Inquiries;
//     }

//     /**
//      * Set the value of Inquiries
//      *
//      * @return  self
//      */ 
//     public function setInquiries($Inquiries)
//     {
//         $this->Inquiries = $Inquiries;

//         return $this;
//     }

//     /**
//      * Get the value of InquiryID
//      */ 
//     public function getInquiryID()
//     {
//         return $this->InquiryID;
//     }

//     /**
//      * Set the value of InquiryID
//      *
//      * @return  self
//      */ 
//     public function setInquiryID($InquiryID)
//     {
//         $this->InquiryID = $InquiryID;

//         return $this;
//     }
// }}


?>
</body>
</html>
