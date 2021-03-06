<?php
require_once("app/model/model.php");
require_once("app/model/cruise.php");
require_once("app/interfaces/iReviewPackages.php");
require_once("app/interfaces/IGallery.php");

class Package extends Model implements ireviewpackages, igallery
{
    protected $PackageID;
    protected $PackageName;
    protected $ReserveLimit;
    protected $CruiseID;
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
    protected $pricesingle;
    protected $pricedouble;
    protected $pricetriple;
    protected $pricesuites;
    // protected $VisitModel;
    protected $primaryimgs=array();
    protected $CruiseModel;

    protected $Review = array();
    protected $PackageViewName = array();
    protected $PackageViewOverview = array();
    protected $PackageIDs = array();
    protected $PackagePrices = array();

    public function __construct()
    {
        $this->dbh=$this->connect();
        $this->CruiseModel = new Cruise();
    }

    public function ReadPackagesReviews()
    {
        $SQL = 'SELECT Review FROM reviews WHERE PackageID='.$this->PackageID.'';
        $Result = mysqli_query($this->db->getConn(),$SQL);
        while ($row = $Result->fetch_assoc())
        {
            array_push($this->Review,$row['Review']);
        }
    }

    public function ListPackages()
    {
        $SQL = "SELECT PackageName, Overview, Price, PackageID FROM packages WHERE Suspended='Disabled'";
        $Result = mysqli_query($this->db->getConn(),$SQL);
        while($row=$Result->fetch_assoc())
        {
            array_push($this->PackageViewName,$row['PackageName']);
            array_push($this->PackageViewOverview,$row['Overview']);
            array_push($this->PackageIDs,$row['PackageID']);
            array_push($this->PackagePrices,$row['Price']);
        }

    }

    public function GetDetails($PKID)
    {
        $SQL = 'SELECT PackageName,PackageID,HotelID,NumberOfDays,NumberOfNights,Price,Description,CruiseID,HotelID FROM packages WHERE packages.PackageID ='.$PKID.''; 
        $Res = mysqli_query($this->db->getConn(),$SQL);

        $row=$Res->fetch_assoc();

        $sql1="SELECT * from hotel where HotelID=".$row['HotelID'];
        $result=mysqli_query($this->db->getConn(),$sql1);
        $row1=$result->fetch_assoc();

        $this->PackageName = $row['PackageName'];
        $this->PackageID = $row['PackageID'];
        $this->NumberOfDays = $row['NumberOfDays'];
        $this->NumberOfNights = $row['NumberOfNights'];
        $this->Price = $row['Price'];
        $this->Description = $row['Description'];
        $this->HotelID = $row['HotelID'];
        $this->CruiseID = $row['CruiseID'];
        $this->pricesingle=$row1['PriceSingle'];
        $this->pricedouble=$row1['PriceDouble'];
        $this->pricetriple=$row1['PriceTriple'];
        $this->pricesuites=$row1['PriceSuites'];
        
    


    }
    public function FetchCruiseServices()
    {
        if($this->CruiseID == NULL)
        {
            return;
        }
        else
        {
        $SQL = 'SELECT Pets,Fishing,SunBathing,Pool FROM cruise WHERE CruiseID='.$this->CruiseID.'';
        $Result = mysqli_query($this->db->getConn(),$SQL);
        while($row = $Result->fetch_assoc())
        {
        $this->CruiseModel->AddService($row['Pets']);
        $this->CruiseModel->AddService($row['Fishing']);
        $this->CruiseModel->AddService($row['SunBathing']);
        $this->CruiseModel->AddService($row['Pool']);
        }
        }
        
    }
    public function GetCruiseServices()
    {
        if($this->CruiseID == NULL)
        {
            return false;
        }
        else
        {
            return $this->CruiseModel->GetServices();
        }
        
    }
    public function GetHotelName()
    {
        $SQL = 'SELECT Name FROM packages INNER JOIN hotel ON hotel.HotelID="'.$this->HotelID.'" AND packages.HotelID="'.$this->HotelID.'"';
        $R = mysqli_query($this->db->getConn(),$SQL) or die($this->db->getConn()->error);
        while($row = $R->fetch_assoc())
        {
            $HotelName = $row['Name'];
        }
        return $HotelName;
        
    }

    function ReadMainImgs()
    {
        $sql="SELECT picture FROM gallery WHERE HotelId IS null AND Main='yes' ORDER BY PackageId";
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

    public function outputgallery()
    {

        $sql2="select picture from gallery where Packageid='".$this->PackageID."'  ";
        $result2=mysqli_query($this->dbh->getConn(),$sql2);
        while($row2=mysqli_fetch_assoc($result2))
        {
            // array_push($this->hotelgallery,$row2['picture']);
            echo '<img class="mySlides" src="'.$row2['picture'].'" style="width:100%">';
        }

    }

    public function outputnumbers()
    {
        

        $sql2="select count(*) from gallery where Packageid='".$this->PackageID."'  ";
        $result2=mysqli_query($this->dbh->getConn(),$sql2);
        $row2=mysqli_fetch_assoc($result2);
        for ($i=1;$i<=$row2['count(*)'];$i++)
        {
            echo '<button class="w3-button demo" onclick="currentDiv("'.$i.'")">'.$i.'</button>'; 
                                        
        }
            
        
    }

    public function outputmainimg()
    {
        

        $sql2="select picture from gallery where  Packageid='".$this->PackageID."'  and Main='yes' ";
        $result2=mysqli_query($this->dbh->getConn(),$sql2);
        $row2=mysqli_fetch_assoc($result2);
        echo '<div class="fh5co-parallax" style="background-image: url('.$row2['picture'].');" data-stellar-background-ratio="0.5">';
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

    /**
     * Get the value of PackagePrices
     */ 
    public function getPackagePrices()
    {
        return $this->PackagePrices;
    }

    /**
     * Set the value of PackagePrices
     *
     * @return  self
     */ 
    public function setPackagePrices($PackagePrices)
    {
        $this->PackagePrices = $PackagePrices;

        return $this;
    }

    /**
     * Get the value of Review
     */ 
    public function getReview()
    {
        return $this->Review;
    }

    /**
     * Set the value of Review
     *
     * @return  self
     */ 
    public function setReview($Review)
    {
        $this->Review = $Review;

        return $this;
    }

    /**
     * Get the value of pricesingle
     */ 
    public function getPricesingle()
    {
        return $this->pricesingle;
    }

    /**
     * Get the value of pricedouble
     */ 
    public function getPricedouble()
    {
        return $this->pricedouble;
    }

    /**
     * Get the value of pricetriple
     */ 
    public function getPricetriple()
    {
        return $this->pricetriple;
    }

    /**
     * Get the value of pricesuites
     */ 
    public function getPricesuites()
    {
        return $this->pricesuites;
    }
}
?>