<?php
require_once("app/model/model.php");
require_once("app/model/rooms.php");
require_once("app/model/singlehotelmodel.php");
require_once("app/controller/singlehotelcontroller.php");
require_once("app/interfaces/iReviewHotels.php");
?>

<?php

class Hotel extends Model implements ireviewhotels
{
    protected $id;
    protected $name;
    protected $services;
    protected $Room=array();
    protected $description;
    protected $overview;
    protected $Location;
    protected $primaryimgs=array();
    protected $ViewNames=array();
    protected $ViewOverview=array();
    protected $availablerooms=0;
    protected $price=array();
    protected $reviews=array();
    private $dbh;
    protected $singmodel;
    
    
    function __construct($id=null,$name=null,$services=null,$location=null,$type=null,$description=null,$overview=null,$pricesingle=null,$pricedouble=null,$pricetriple=null,$pricesuite=null,$stars=null)
    {
        $this->dbh=$this->connect();
        if($id!=null||$name!=null || $services!=null||$location!=null||$type!=null||$description!=null||$overview!=null)
        {
        $this->id=$id;
        $this->name=$name;
        $this->services=$services;
        $this->location=$location;
        $this->description=$description;
        $this->overview=$overview;

        $wifi="FALSE";
        $swimming="FALSE";
        $Spa="FALSE";
        $gym="FALSE";
        $pets="FALSE";
        $bar="FALSE";
        $restaurant="FALSE";

        for ($i=0;$i<count($services);$i++)
        {
            if($services[$i]=="Wifi")
            {
                $wifi="TRUE";
            }
            else if($services[$i]=="Swimming Pool")
            {   
                $swimming="TRUE";
            }
            else if($services[$i]=="Spa")
            {   
                $Spa="TRUE";
            }
            else if($services[$i]=="Gym")
            {   
                $gym="TRUE";
            }
            else if($services[$i]=="Bar")
            {   
                $bar="TRUE";
            }
            else if($services[$i]=="Restaurant")
            {   
                $restaurant="TRUE";
            }
            else if($services[$i]=="Pets")
            {   
                $pets="TRUE";
            }
        }

        $single=(int)$type[0];
        $double=(int)$type[1];
        $triple=(int)$type[2];
        $suites=(int)$type[3];
        $roomcount=$single+$double+$triple+$suites;

        
        $sql="insert into hotel(HotelID,Name,location,NumberofRooms,WiFI,Swimming_Pool,Spa,Gym,Pets,Bar,Restaurant,description,overview,featured,FeaturedMainSilder,Suspended,PriceSingle,PriceDouble,PriceTriple,PriceSuites,stars) values('$id','$name','$location','$roomcount','$wifi','$swimming','$Spa','$gym','$pets','$bar','$restaurant','$description','$overview','false','FALSE','Disabled','$pricesingle','$pricedouble','$pricetriple','$pricesuite','$stars')";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        $this->addrooms($type);
        }
    }
   
    
    private function addrooms($type)
    {
        $single=(int)$type[0];
        $double=(int)$type[1];
        $triple=(int)$type[2];
        $suites=(int)$type[3];
        $roomcount=$single+$double+$triple+$suites;
        $counter=0;

        for($i=1;$i<=$roomcount;$i++)
        {
            if ($counter==0)
            {
               
                //array_push($this->Room,$room);
                $sql="insert into rooms(RoomNumber,RoomType,HotelID,Status)values('".$i."','Single','".$this->id."','free')";
                $result=mysqli_query($this->dbh->getConn(),$sql); 
            }
            else if ($counter==1)
            {
                
                //array_push($this->Room,$room);
                $sql="insert into rooms(RoomNumber,RoomType,HotelID,Status)values('".$i."','Double','".$this->id."','free')";
                $result=mysqli_query($this->dbh->getConn(),$sql); 
            }
            else if ($counter==2)
            {
                
                //array_push($this->Room,$room);
                $sql="insert into rooms(RoomNumber,RoomType,HotelID,Status)values('".$i."','Triple','".$this->id."','free')";
                $result=mysqli_query($this->dbh->getConn(),$sql); 
            }
            else
            {
                
                //array_push($this->Room,$room);
                $sql="insert into rooms(RoomNumber,RoomType,HotelID,Status)values('".$i."','Suites','".$this->id."','free')";
                $result=mysqli_query($this->dbh->getConn(),$sql); 

            }
            
            if($i==$single)
            {
                $counter++;
            }
            else if ($i==$single+$double)
            {
                $counter++;
            }
            else if($i==$single+$double+$triple)
            {
                $counter++;
            }
        }
    }
    
    


    public function getLocation()
    {
        return $this->Location;
    }



    public function setLocation($Location)
    {
        $this->Location = $Location;

        return $this;
    }


    public function getServices()
    {
        return $this->services;
    }


    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    function listdata()
    {
        $sql="select Name,overview,PriceSingle from hotel where Suspended='Disabled' ";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            array_push($this->ViewNames,$row['Name']);
            array_push($this->ViewOverview,$row['overview']);
            array_push($this->price,$row['PriceSingle']);
        }
    }

    function ReadMainImgs()
    {
        $sql="SELECT picture FROM gallery WHERE PackageId IS null AND Main='yes' ";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            array_push($this->primaryimgs,$row['picture']);     
        }
    }

    public function getprimaryimgs()
    {
        return $this->primaryimgs;
    }

    function ReadHotelsReviews($controller=null)
    {
        $var=$_GET['action'];
        $this->singmodel=$controller;
        $this->singmodel->hotelreviews($var);
    }


    public function updaterooms()
    {
        $date = date('Y-m-d');


        $sql1="UPDATE rooms
        SET Status='Free',GuestID=NULL,DateIn='2000-01-01',DateOut='2000-01-01'
        where Status!='Free' and DateOut<='$date'";

        $result=mysqli_query($this->db->getConn(),$sql1);

        $sql2="Update packages
        set Suspended='Enabled'
        where DateOut<='$date'";

        mysqli_query($this->db->getConn(),$sql2);

        $sql2="Update packages
        set Suspended='Disabled'
        where Datein>='$date'";

        mysqli_query($this->db->getConn(),$sql2);

        $sql3="Update reserves
        set Ended='TRUE'
        where DateOut<='$date'";

        mysqli_query($this->db->getConn(),$sql3);


    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getreviews()
    {
        return $this->reviews;
    }

    public function getViewNames()
    {
        return $this->ViewNames;
    }

    public function getViewOverview()
    {
        return $this->ViewOverview;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }
}

?>