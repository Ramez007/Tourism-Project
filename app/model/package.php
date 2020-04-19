<?php
require_once("app/model/model.php");
require_once("app/model/cruise.php");
require_once("app/model/visits.php");

class Package extends Model
{
    protected $PackageID;
    protected $PackageName;
    protected $ReserveLimit;
    protected $CruiseID;
    protected $VisitID;
    protected $HotelID;
    protected $Price;
    protected $TourGuideID;
    protected $Transportation;
    protected $NumberOfDays;
    protected $NumberOfNights;
    protected $Suspended;
    protected $DateIn;
    protected $DateOut;
    protected $Description;
    protected $VisitModel;
    protected $CruiseModel;

    protected $PackageViewName = array();
    protected $PackageViewOverview = array();
    protected $PackageIDs = array();

    public function __construct()
    {
        $this->dbh=$this->connect();
        $this->VisitModel = new Visits();
        $this->CruiseModel = new Cruise();
    }

    public function ListPackages()
    {
        $SQL = "SELECT PackageName, Overview, Price, PackageID FROM packages";
        $Result = mysqli_query($this->db->getConn(),$SQL);
        while($row=$Result->fetch_assoc())
        {
            array_push($this->PackageViewName,$row['PackageName']);
            array_push($this->PackageViewOverview,$row['Overview']);
            array_push($this->PackageIDs,$row['PackageID']);
        }

    }

    public function GetDetails($PKID)
    {
        $SQL = 'SELECT PackageName,HotelID,NumberOfDays,NumberOfNights,Price,NameLocation,Description FROM packages INNER JOIN visits ON visits.PackageID ='.$PKID.' AND packages.PackageID ='.$PKID.'';
        $Res = mysqli_query($this->db->getConn(),$SQL);
        while($row=$Res->fetch_assoc())
        {
            $this->PackageName = $row['PackageName'];
            $this->NumberOfDays = $row['NumberOfDays'];
            $this->NumberOfNights = $row['NumberOfNights'];
            $this->Price = $row['Price'];
            $this->VisitModel->setLocation($row['NameLocation']);
            $this->Description = $row['Description'];
            $this->HotelID = $row['HotelID'];
        }


    }
    public function FetchCruiseServices($PackID)
    {
        $SQL = 'SELECT Pets,Fishing,SunBathing,Pool FROM cruise WHERE PackageID='.$PackID.'';
        $Result = mysqli_query($this->db->getConn(),$SQL);
        while($row = $Result->fetch_assoc())
        {
        $this->CruiseModel->AddService($row['Pets']);
        $this->CruiseModel->AddService($row['Fishing']);
        $this->CruiseModel->AddService($row['SunBathing']);
        $this->CruiseModel->AddService($row['Pool']);
        }
        
    }
    public function GetCruiseServices()
    {
        return $this->CruiseModel->GetServices();
    }
    public function GetHotelName()
    {
        $SQL = 'SELECT Name FROM packages INNER JOIN hotel ON hotel.HotelID='.$this->HotelID.' AND packages.HotelID='.$this->HotelID.'';
        $R = mysqli_query($this->db->getConn(),$SQL);
        while($row = $R->fetch_assoc())
        {
            $HotelName = $row['Name'];
        }
        return $HotelName;
        
    }
    /**
     * Get the value of PackageID
     */ 
    public function getPackageID()
    {
        return $this->PackageID;
    }
    /**
     * Get the value of PackageName
     */ 
    public function getPackageName()
    {
        return $this->PackageName;
    }

    /**
     * Set the value of PackageName
     *
     * @return  self
     */ 
    public function setPackageName($PackageName)
    {
        $this->PackageName = $PackageName;

        return $this;
    }

    /**
     * Get the value of ReserveLimit
     */ 
    public function getReserveLimit()
    {
        return $this->ReserveLimit;
    }

    /**
     * Set the value of ReserveLimit
     *
     * @return  self
     */ 
    public function setReserveLimit($ReserveLimit)
    {
        $this->ReserveLimit = $ReserveLimit;

        return $this;
    }

    /**
     * Get the value of CruiseID
     */ 
    public function getCruiseID()
    {
        return $this->CruiseID;
    }

    /**
     * Get the value of HotelID
     */ 
    public function getHotelID()
    {
        return $this->HotelID;
    }

    /**
     * Get the value of Price
     */ 
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * Set the value of Price
     *
     * @return  self
     */ 
    public function setPrice($Price)
    {
        $this->Price = $Price;

        return $this;
    }

    /**
     * Get the value of TourGuideID
     */ 
    public function getTourGuideID()
    {
        return $this->TourGuideID;
    }

    /**
     * Set the value of TourGuideID
     *
     * @return  self
     */ 
    public function setTourGuideID($TourGuideID)
    {
        $this->TourGuideID = $TourGuideID;

        return $this;
    }

    /**
     * Get the value of Transportation
     */ 
    public function getTransportation()
    {
        return $this->Transportation;
    }

    /**
     * Set the value of Transportation
     *
     * @return  self
     */ 
    public function setTransportation($Transportation)
    {
        $this->Transportation = $Transportation;

        return $this;
    }

    /**
     * Get the value of NumberOfDays
     */ 
    public function getNumberOfDays()
    {
        return $this->NumberOfDays;
    }

    /**
     * Set the value of NumberOfDays
     *
     * @return  self
     */ 
    public function setNumberOfDays($NumberOfDays)
    {
        $this->NumberOfDays = $NumberOfDays;

        return $this;
    }

    /**
     * Get the value of NumberOfNights
     */ 
    public function getNumberOfNights()
    {
        return $this->NumberOfNights;
    }

    /**
     * Set the value of NumberOfNights
     *
     * @return  self
     */ 
    public function setNumberOfNights($NumberOfNights)
    {
        $this->NumberOfNights = $NumberOfNights;

        return $this;
    }

    /**
     * Get the value of Suspended
     */ 
    public function getSuspended()
    {
        return $this->Suspended;
    }

    /**
     * Set the value of Suspended
     *
     * @return  self
     */ 
    public function setSuspended($Suspended)
    {
        $this->Suspended = $Suspended;

        return $this;
    }

    /**
     * Get the value of DateIn
     */ 
    public function getDateIn()
    {
        return $this->DateIn;
    }

    /**
     * Set the value of DateIn
     *
     * @return  self
     */ 
    public function setDateIn($DateIn)
    {
        $this->DateIn = $DateIn;

        return $this;
    }

    /**
     * Get the value of DateOut
     */ 
    public function getDateOut()
    {
        return $this->DateOut;
    }

    /**
     * Set the value of DateOut
     *
     * @return  self
     */ 
    public function setDateOut($DateOut)
    {
        $this->DateOut = $DateOut;

        return $this;
    }

    /**
     * Get the value of PackageViewName
     */ 
    public function getPackageViewName()
    {
        return $this->PackageViewName;
    }

    /**
     * Get the value of PackageViewOverview
     */ 
    public function getPackageViewOverview()
    {
        return $this->PackageViewOverview;
    }

    /**
     * Get the value of PackageIDs
     */ 
    public function getPackageIDs()
    {
        return $this->PackageIDs;
    }

    /**
     * Get the value of Description
     */ 
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set the value of Description
     *
     * @return  self
     */ 
    public function setDescription($Description)
    {
        $this->Description = $Description;

        return $this;
    }
    public function ListCities()
    {
        $Locations = $this->VisitModel->getLocations();
        $Format = '';
        
        for($i = 0; $i < count($Locations); $i++)
        {
            $Format .= ''.$Locations[$i].', ';
        }
        $Format[-2] = '.';
        return $Format;
        
    }
}
?>