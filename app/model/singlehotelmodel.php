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
    private $reviewsofhotel=array();
    private $stars;
    private $hotelgallery=array();
    
    function __construct($hotelname=null)
    {
        $this->dbh=$this->connect();
        $this->hotelname=$hotelname;
    }

    function outputgallery()
    {
        $sql="select HotelID from hotel where Name='".$this->hotelname."'";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        $row=mysqli_fetch_assoc($result);

        $sql2="select picture from gallery where HotelId='".$row['HotelID']."'  ";
        $result2=mysqli_query($this->dbh->getConn(),$sql2);
        while($row2=mysqli_fetch_assoc($result2))
        {
            // array_push($this->hotelgallery,$row2['picture']);
            echo '<img class="mySlides" src="'.$row2['picture'].'" style="width:100%">';
        }

    }

    function outputnumbers()
    {
        $sql="select HotelID from hotel where Name='".$this->hotelname."'";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        $row=mysqli_fetch_assoc($result);

        $sql2="select count(*) from gallery where HotelId='".$row['HotelID']."'  ";
        $result2=mysqli_query($this->dbh->getConn(),$sql2);
        $row2=mysqli_fetch_assoc($result2);
        for ($i=1;$i<=$row2['count(*)'];$i++)
        {
            echo '<button class="w3-button demo" onclick="currentDiv("'.$i.'")">'.$i.'</button>'; 
                                        
        }
            
        
    }

    function outputmainimg()
    {
        $sql="select HotelID from hotel where Name='".$this->hotelname."'";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        $row=mysqli_fetch_assoc($result);

        $sql2="select picture from gallery where HotelId='".$row['HotelID']."' and Main='yes' ";
        $result2=mysqli_query($this->dbh->getConn(),$sql2);
        $row2=mysqli_fetch_assoc($result2);
        echo '<div class="fh5co-parallax" style="background-image: url('.$row2['picture'].');" data-stellar-background-ratio="0.5">';
    }
    

    function listhoteldata()
    {
        $sql="select description,Swimming_Pool,WiFI,Spa,Gym,Bar,Restaurant,Pets,stars from hotel where Name='".$this->hotelname."'"; 
        $result=mysqli_query($this->dbh->getConn(),$sql);
        $row=mysqli_fetch_assoc($result);

        $this->hoteldescription=$row['description'];
        array_push($this->hotelservices,$row['WiFI']);
        array_push($this->hotelservices,$row['Swimming_Pool']);
        array_push($this->hotelservices,$row['Gym']);
        array_push($this->hotelservices,$row['Spa']);
        array_push($this->hotelservices,$row['Bar']);
        array_push($this->hotelservices,$row['Restaurant']);
        array_push($this->hotelservices,$row['Pets']);
        $this->stars=$row['stars'];
    }

    function listreviewsofhotel($var)
    {
        // echo $var;
        $sql="SELECT reviews.Review from reviews JOIN hotel on reviews.HotelID=hotel.HotelID where hotel.Name='$var';";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        // $row=mysqli_fetch_assoc($result);

        while($row=mysqli_fetch_assoc($result))
        {
            
            array_push($this->reviewsofhotel,$row['Review']);
            
        }

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

    

    /**
     * Get the value of reviewsofhotel
     */ 
    public function getReviewsofhotel()
    {
        return $this->reviewsofhotel;
    }

    /**
     * Get the value of stars
     */ 
    public function getStars()
    {
        return $this->stars;
    }
}

?>