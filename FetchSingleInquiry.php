<?php
// require_once("app/db/Dbh.php");
// $db=new dbh();
// $db->connect();

// $inquiryID = $_REQUEST["q"];

//     $SQL = 'SELECT Inquiry FROM inquiries WHERE InquiryID ='.$inquiryID.'';
//     $Result = mysqli_query($this->dbh->getConn(),$SQL);
//     $row = $Result->fetch_assoc();
//     echo $row; 
    

if(isset($_GET['mainid'])){
    $supp=$_SESSION['supp'];
    $val=$supp->getInquiries();
    fetch($val);
}
    
?>