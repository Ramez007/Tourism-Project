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
    private $mainslider=array();

    private $guestname=array();
    private $reviews=array();
    

    function __construct()
    {
        $this->dbh=$this->connect();
    }

    

    function listdata()
    {
        $sql="select Name,overview,featured,FeaturedMainSilder from hotel ";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            array_push($this->name,$row['Name']);
            array_push($this->overview,$row['overview']);
            array_push($this->featured,$row['featured']);
            array_push($this->mainslider,$row['FeaturedMainSilder']);
        }
    }

    function listreviews()
    {
        $sql="SELECT guest.FirstName,reviews.Review from reviews join guest on reviews.GuestID=guest.GuestID where reviews.Featured='TRUE' ";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            array_push($this->guestname,$row['FirstName']);
            array_push($this->reviews,$row['Review']);
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

    /**
     * Get the value of guestname
     */ 
    public function getGuestname()
    {
        return $this->guestname;
    }

    /**
     * Get the value of reviews
     */ 
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Get the value of mainslider
     */ 
    public function getMainslider()
    {
        return $this->mainslider;
    }
}

?>