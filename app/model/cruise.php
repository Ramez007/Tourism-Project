<?php
require_once("app/model/model.php");

class Cruise extends Model
{

    protected $CruiseID;
    protected $CruiseName;
    protected $NumberOfCabins;
    protected $Captain;
    protected $Services;

    public function __construct()
    {
        
    }

    /**
     * Get the value of CruiseID
     */ 
    public function getCruiseID()
    {
        return $this->CruiseID;
    }

    /**
     * Get the value of CruiseName
     */ 
    public function getCruiseName()
    {
        return $this->CruiseName;
    }

    /**
     * Set the value of CruiseName
     *
     * @return  self
     */ 
    public function setCruiseName($CruiseName)
    {
        $this->CruiseName = $CruiseName;

        return $this;
    }

    /**
     * Get the value of NumberOfCabins
     */ 
    public function getNumberOfCabins()
    {
        return $this->NumberOfCabins;
    }

    /**
     * Set the value of NumberOfCabins
     *
     * @return  self
     */ 
    public function setNumberOfCabins($NumberOfCabins)
    {
        $this->NumberOfCabins = $NumberOfCabins;

        return $this;
    }

    /**
     * Get the value of Captain
     */ 
    public function getCaptain()
    {
        return $this->Captain;
    }

    /**
     * Set the value of Captain
     *
     * @return  self
     */ 
    public function setCaptain($Captain)
    {
        $this->Captain = $Captain;

        return $this;
    }
}

?>