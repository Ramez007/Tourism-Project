<?php
require_once("app/model/model.php");

?>

<?php

class mainpage extends Model
{
    private $db;
    private $name=[];
    private $overview=[];

    function __construct()
    {
        $this->db=$this->connect();
    }

    function listhotelname()
    {
        $sql="select Name from hotel";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            array_push($name,$row['Name']);
        }
        
    }

    function listdata()
    {
        $sql="select name,overview from hotel ";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            array_push($name,$row['Name']);
            array_push($overview,$row['overview']);
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
}

?>