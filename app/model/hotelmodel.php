<?php
require_once("app/model/model.php");
require_once("app/model/rooms.php");
?>

<?php

class Hotel extends Model
{
    protected static $id=1;
    protected $name;
    protected $services;
    protected $Room=array();
    protected $Location;
    protected $ViewNames=array();
    protected $ViewOverview=array();
    protected $availablerooms=0;
    private $dbh;
    

    
    function __construct($name=null,$services=null,$location=null,$type=null)
    {
        $this->dbh=$this->connect();
        if($name!=null || $services!=null||$location!=null||$type!=null)
        {
        $this->id+=1;
        $this->name=$name;
        $this->services=$services;
        $this->location=$location;

        $wifi="FALSE";
        $swimming="FALSE";
        $resort="FALSE";
        $gym="FALSE";
        $pets="FALSE";

        for ($i=0;$i<count($services);$i++)
        {
            if($services[$i]=="WiFi")
            {
                $wifi="TRUE";
            }
            else if($services[$i]=="Swimming Pool")
            {   
                $swimming="TRUE";
            }
            else if($services[$i]=="Resort")
            {   
                $resort="TRUE";
            }
            else if($services[$i]=="Gym")
            {   
                $gym="TRUE";
            }
            else if($services[$i]=="Pets")
            {   
                $pets="TRUE";
            }
        }

        $roomcount=$type[0]+$type[1]+$type[2];

        $this->addrooms($type);
        $sql="insert into hotel(Name,NumberofRooms,WiFi,Swimming Pool,RESORT,Gym,Pets) values($name,$roomcount,$wifi,$swimming,$resort,$gym,$pets)";
        $result=mysqli_query($this->dbh->getConn(),$sql);
        }
    }
   
    public function CheckAvailability()
    {
        for ($i=0;$i<count($this->Room);$i++)
        {
            if($this->Room[$i]->getAvailabilty()==true)
            {
                $this->availablerooms++;
            }
        }

        return $this->availablerooms;
    }
    
    private function addrooms($type)
    {
        $roomcount=$type[0]+$type[1]+$type[2];
        $counter=0;

        for($i=1;$i<=$roomcount;$i++)
        {
            if ($counter==0)
            {
                $room=new Rooms($i,"single",true);
                array_push($Room,$room);
                $sql="insert into rooms(RoomNumber,RoomType,HotelID,status)values(".$i.",'Single',".$this->id.",'free')";
                $result=mysqli_query($this->dbh->getConn(),$sql); 
            }
            else if ($counter==1)
            {
                $room=new Rooms($i,"double",true);
                array_push($Room,$room);
                $sql="insert into rooms(RoomNumber,RoomType,HotelID,status)values(".$i.",'Double',".$this->id.",'free')";
                $result=mysqli_query($this->dbh->getConn(),$sql); 
            }
            else 
            {
                $room=new Rooms($i,"triple",true);
                array_push($Room,$room);
                $sql="insert into rooms(RoomNumber,RoomType,HotelID,status)values(".$i.",'Triple',".$this->id.",'free')";
                $result=mysqli_query($this->dbh->getConn(),$sql); 
            }
            
            if($i==$type[0])
            {
                $counter++;
            }
            else if ($i==$type[1])
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
        $sql="select Name,overview from hotel ";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            array_push($this->ViewNames,$row['Name']);
            array_push($this->ViewOverview,$row['overview']);
        }
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

    

    public function getViewNames()
    {
        return $this->ViewNames;
    }

    public function getViewOverview()
    {
        return $this->ViewOverview;
    }
}

?>