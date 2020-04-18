<?php 

require_once("app/model/model.php");

class Visits extends Model
{
    protected $VisitID;
    protected $Location;
    protected $Day;
    protected $PackageID;

    /**
     * Get the value of VisitID
     */ 
    public function getVisitID()
    {
        return $this->VisitID;
    }

    /**
     * Get the value of Location
     */ 
    public function getLocation()
    {
        return $this->Location;
    }

    /**
     * Set the value of Location
     *
     * @return  self
     */ 
    public function setLocation($Location)
    {
        $this->Location = $Location;

        return $this;
    }

    /**
     * Get the value of Day
     */ 
    public function getDay()
    {
        return $this->Day;
    }

    /**
     * Set the value of Day
     *
     * @return  self
     */ 
    public function setDay($Day)
    {
        $this->Day = $Day;

        return $this;
    }

    /**
     * Get the value of PackageID
     */ 
    public function getPackageID()
    {
        return $this->PackageID;
    }

    /**
     * Set the value of PackageID
     *
     * @return  self
     */ 
    public function setPackageID($PackageID)
    {
        $this->PackageID = $PackageID;

        return $this;
    }
}

?>