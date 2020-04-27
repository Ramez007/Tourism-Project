<?php
require_once("app/model/model.php");
?>

<?php

class Rooms extends Model
{
    protected $RoomID;
    protected $RoomNumber;    
    protected $type;
    protected $Availabilty;
    private $dbh;
    
    function __construct($number,$type,$availabilty)
    {
        $this->dbh=$this->connect();
        $this->RoomNumber=$number;
        $this->type=$type;
        $this->Availabilty=$availabilty;

    }



    public function getRoomID()
    {
        return $this->RoomID;
    }

    public function setRoomID($RoomID)
    {
        $this->RoomID = $RoomID;

        return $this;
    }


    public function getRoomNumber()
    {
        return $this->RoomNumber;
    }

    public function setRoomNumber($RoomNumber)
    {
        $this->RoomNumber = $RoomNumber;

        return $this;
    }

 
    public function getType()
    {
        return $this->type;
    }

 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

  
    public function getAvailabilty()
    {
        return $this->Availabilty;
    }


    public function setAvailabilty($Availabilty)
    {
        $this->Availabilty = $Availabilty;

        return $this;
    }
}

?>