<?php
require_once("app/interfaces/IReciever.php");
class reciever implements ireciever
 {

    protected $mail;
protected $center ;


function __construct($center) {
    $this->center=$center;
   
}
function update ($message,$subject){
    
     $mail=$this->getmail();
$this->center->sendmail($message,$subject,$mail);



}

function updatewithimage  ($message,$subject,$image){
    
    $mail=$this->getmail();
$this->center->sendmailwithimage($message,$subject,$mail,$image);



}

public function setmail ($mail) {
$this->mail=$mail;


}
public function getmail () {
    return $this->mail;
    
    
    }
    
}


?>