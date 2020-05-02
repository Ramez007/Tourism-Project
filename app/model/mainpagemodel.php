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
    private $price=array();
    private $idarr=array();

    private $noofsingle;
    private $noofdouble;
    private $nooftriple;
    private $noofsuites;


    private $guestname=array();
    private $reviews=array();

    public $transactions=0;
    public $reviewcount=0;
    public $hotelscount=0;
    public $guestscount=0;

    

    function __construct()
    {
        $this->dbh=$this->connect();
    }

    function countdata()
    {
        $sql="SELECT COUNT(*) FROM hotel where Suspended='Disabled';";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        $row=$result->fetch_assoc();
        $this->hotelscount=$row['COUNT(*)'];

        $sql2="SELECT COUNT(*) FROM reserves where Suspended='Disabled';";
        $result2=mysqli_query($this->dbh->getConn(),$sql2);
        $row2=$result2->fetch_assoc();
        $this->transactions=$row2['COUNT(*)'];

        $sql3="SELECT COUNT(*) FROM guest;";
        $result3=mysqli_query($this->dbh->getConn(),$sql3);
        $row3=$result3->fetch_assoc();
        $this->guestscount=$row3['COUNT(*)'];

        $sql4="SELECT COUNT(*) FROM reviews;";
        $result4=mysqli_query($this->dbh->getConn(),$sql4);
        $row4=$result4->fetch_assoc();
        $this->reviewcount=$row4['COUNT(*)'];
    }

    

    function listdata()
    {
        $sql="select HotelID,Name,overview,featured,FeaturedMainSilder,PriceSingle from hotel where suspended='disabled'";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            array_push($this->idarr,$row['HotelID']);
            array_push($this->name,$row['Name']);
            array_push($this->overview,$row['overview']);
            array_push($this->featured,$row['featured']);
            array_push($this->mainslider,$row['FeaturedMainSilder']);
            array_push($this->price,$row['PriceSingle']);
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

    function checkavailabilty()
    {
       if(isset($_POST['hotelselect']))
       {
        $hotelid=$_POST['hotelselect'];

        $sql="SELECT count(*)as single from rooms where Status='Free' and RoomType='Single' and HotelID='$hotelid'";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        $row=mysqli_fetch_assoc($result);
        $this->noofsingle=$row['single'];

        $sql1="SELECT count(*)as number from rooms where Status='Free' and RoomType='Double' and HotelID='$hotelid'";
        $result1=mysqli_query($this->dbh->getConn(),$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $this->noofdouble=$row1['number'];

        $sql2="SELECT count(*)as triple from rooms where Status='Free' and RoomType='Triple' and HotelID='$hotelid'";
        $result2=mysqli_query($this->dbh->getConn(),$sql2);
        $row2=mysqli_fetch_assoc($result2);
        $this->nooftriple=$row2['triple'];

        $sql3="SELECT count(*)as Suites from rooms where Status='Free' and RoomType='Suites' and HotelID='$hotelid'";
        $result3=mysqli_query($this->dbh->getConn(),$sql3);
        $row3=mysqli_fetch_assoc($result3);
        $this->noofsuites=$row3['Suites'];
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

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of noofsingle
     */ 
    public function getNoofsingle()
    {
        return $this->noofsingle;
    }

    /**
     * Get the value of noofdouble
     */ 
    public function getNoofdouble()
    {
        return $this->noofdouble;
    }

    /**
     * Get the value of nooftriple
     */ 
    public function getNooftriple()
    {
        return $this->nooftriple;
    }

    /**
     * Get the value of noofsuites
     */ 
    public function getNoofsuites()
    {
        return $this->noofsuites;
    }

    /**
     * Get the value of idarr
     */ 
    public function getIdarr()
    {
        return $this->idarr;
    }
}

?>