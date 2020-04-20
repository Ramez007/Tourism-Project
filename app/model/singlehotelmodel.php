<?php
require_once("app/model/model.php");

?>

<?php

class singlehotelmodel extends Model
{
    private $dbh;
    
    private $hotelname;
    private $hoteldescription;
    private $hotelservices=array();
    
    function __construct($hotelname)
    {
        $this->dbh=$this->connect();
        $this->hotelname=$hotelname;
    }

    

    function listhoteldata()
    {
        $sql="select description,Swimming_Pool,WiFI,Spa,Gym,Bar,Restaurant from hotel where Name='".$this->hotelname."'"; 
        $result=mysqli_query($this->dbh->getConn(),$sql);
        $row=mysqli_fetch_assoc($result);

        $this->hoteldescription=$row['description'];
        array_push($this->hotelservices,$row['WiFI']);
        array_push($this->hotelservices,$row['Swimming_Pool']);
        array_push($this->hotelservices,$row['Gym']);
        array_push($this->hotelservices,$row['Spa']);
        array_push($this->hotelservices,$row['Bar']);
        array_push($this->hotelservices,$row['Restaurant']);
        
    }


 



    /**
     * Get the value of hotelname
     */ 
    public function getHotelname()
    {
        return $this->hotelname;
    }

    /**
     * Get the value of hoteldescription
     */ 
    public function getHoteldescription()
    {
        return $this->hoteldescription;
    }

    /**
     * Get the value of hotelservices
     */ 
    public function getHotelservices()
    {
        return $this->hotelservices;
    }
}

?>