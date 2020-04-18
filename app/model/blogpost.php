<?php
require_once("app/model/model.php");

class BlogPost extends Model
{
    protected $PostMonth = array();
    protected $PostYear = array();
    protected $PostTitle = array();
    protected $PostText = array();

    public function __construct()
    {
        $this->dbh=$this->connect();
    }
    public function ListContent()
    {
        $SQL = "SELECT * FROM blogposts";
        $Result = mysqli_query($this->db->getConn(),$SQL);

        while($row=$Result->fetch_assoc())
        {
            array_push($this->PostMonth,$row['PostMonth']);
            array_push($this->PostYear,$row['PostYear']);
            array_push($this->PostTitle,$row['PostTitle']);
            array_push($this->PostText,$row['PostText']);
        }
    }

    /**
     * Get the value of PostMonth
     */ 
    public function getPostMonth()
    {
        return $this->PostMonth;
    }

    /**
     * Get the value of PostYear
     */ 
    public function getPostYear()
    {
        return $this->PostYear;
    }

    /**
     * Get the value of PostTitle
     */ 
    public function getPostTitle()
    {
        return $this->PostTitle;
    }

    /**
     * Get the value of PostText
     */ 
    public function getPostText()
    {
        return $this->PostText;
    }
}

?>