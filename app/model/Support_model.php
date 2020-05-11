<html>
<head><script src="js/sweetalert.min.js"></script></head>

<body>
<?php

  require_once("app/model/model.php");
  require_once("app/interfaces/IMail.php");
  use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';

?>

<?php

class support_operator extends Model  {

    private $dbh;
    // protected $inquiryar=array();
    protected $Inqemail=array();
    protected $InqId=array();
    protected $Inquiries = array();
    protected $guestemails = array();
    protected $Packagesids = array();
    protected $Packagesnames = array();
    protected $newswirecontent = array();
    protected $inquirycontent = array();
    protected $inquirycontentreply = array();
    protected $inquiryAuthor = array();
    protected $employeename = array();
    protected $inquirymail = array();
    

    function __construct() {
        $this->dbh = $this->connect();
        
    }



public function FetchInquiries()
{
    $SQL = 'SELECT Email,InquiryID,Inquiry FROM inquiries where inquiries.suspended = "Disabled" ';
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
     
    public function getguestmail()
    {
        return $this->guestemails;
    }
    public function getpackagesids()
    {
        return $this->Packagesids;
    }
    public function getPackagesnames()
    {
        return $this->Packagesnames;
    }

 function fetchguestemails(){
    $SQL = 'SELECT Email FROM guest';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    while($row = $Result->fetch_assoc())
    {
        array_push($this->guestemails,$row['Email']);
            
    }
 }
 function fetchPackages(){
    $SQL = 'SELECT PackageID,PackageName FROM packages';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    while($row = $Result->fetch_assoc())
    {
        array_push($this->Packagesids,$row['PackageID']);
        array_push($this->Packagesnames,$row['PackageName']);
    }
 }

function getnewswirehistory(){
    $SQL = 'SELECT Message FROM newswirehistory GROUP BY Message';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    while($row = $Result->fetch_assoc())
    {
        array_push($this->newswirecontent,$row['Message']);
        
    }

 return $this->newswirecontent;


}
function getAuthor(){
    $SQL = 'SELECT InquiryAuthor FROM inquiryhistory';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    while($row = $Result->fetch_assoc())
    {
        array_push($this->inquiryAuthor,$row['InquiryAuthor']);
        
    }

 return $this->inquiryAuthor;




}
 function getinquiryreply(){
    $SQL = 'SELECT reply FROM inquiryhistory';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    while($row = $Result->fetch_assoc())
    {
        array_push($this->inquirycontentreply,$row['reply']);
        
    }

 return $this->inquirycontentreply;




}
function getinquiryhistory(){
    $SQL = 'SELECT inquiry FROM inquiryhistory';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    while($row = $Result->fetch_assoc())
    {
        array_push($this->inquirycontent,$row['inquiry']);
        
    }

 return $this->inquirycontent;




}
function getinquirymail(){
    $SQL = 'SELECT InquiryEmail FROM inquiryhistory';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    while($row = $Result->fetch_assoc())
    {
        array_push($this->inquirymail,$row['InquiryEmail']);
        
    }

 return $this->inquirymail;




}
function getnames(){
    $SQL = 'SELECT employees.Name FROM employees join inquiryhistory on employees.EmployeeID=inquiryhistory.EmployeeID';
    $Result = mysqli_query($this->dbh->getConn(),$SQL);
    while($row = $Result->fetch_assoc())
    {
        array_push($this->employeename,$row['Name']);
        
    }

 return $this->employeename;




}


}


?>
</body>
</html>
