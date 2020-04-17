<?php
require_once("app/model/model.php");

?>

<?php

class mainpage extends Model
{
    private $dbh;
    private $name=array();
    private $overview=array();
    private $featured=array();

    function __construct()
    {
        $this->dbh=$this->connect();
    }

    

    function listdata()
    {
        $sql="select Name,overview,featured from hotel ";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            array_push($this->name,$row['Name']);
            array_push($this->overview,$row['overview']);
            array_push($this->featured,$row['featured']);
        }
    }

 
    public function getOverview()
    {
        return $this->overview;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFeatured()
    {
        return $this->featured;
    }
}

?>