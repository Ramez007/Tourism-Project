<?php
require_once("app/model/model.php");


class Reservation extends Model
{
    protected $ReserveID;
    protected $PackageID;
    protected $HotelID;
    protected $DateIn;
    protected $DateOut;
    protected $Suspended;
    protected $SingleRooms;
    protected $DoubleRooms;
    protected $TripleRooms;
    protected $Suits;
    protected $BoardType;

    public function __construct()
    {
        $this->dbh = $this->connect();
    }



    /**
     * Get the value of ReserveID
     */ 
    public function getReserveID()
    {
        return $this->ReserveID;
    }

    /**
     * Set the value of ReserveID
     *
     * @return  self
     */ 
    public function setReserveID($ReserveID)
    {
        $this->ReserveID = $ReserveID;

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

    /**
     * Get the value of HotelID
     */ 
    public function getHotelID()
    {
        return $this->HotelID;
    }

    /**
     * Set the value of HotelID
     *
     * @return  self
     */ 
    public function setHotelID($HotelID)
    {
        $this->HotelID = $HotelID;

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
     * Get the value of SingleRooms
     */ 
    public function getSingleRooms()
    {
        return $this->SingleRooms;
    }

    /**
     * Set the value of SingleRooms
     *
     * @return  self
     */ 
    public function setSingleRooms($SingleRooms)
    {
        $this->SingleRooms = $SingleRooms;

        return $this;
    }

    /**
     * Get the value of DoubleRooms
     */ 
    public function getDoubleRooms()
    {
        return $this->DoubleRooms;
    }

    /**
     * Set the value of DoubleRooms
     *
     * @return  self
     */ 
    public function setDoubleRooms($DoubleRooms)
    {
        $this->DoubleRooms = $DoubleRooms;

        return $this;
    }

    /**
     * Get the value of TripleRooms
     */ 
    public function getTripleRooms()
    {
        return $this->TripleRooms;
    }

    /**
     * Set the value of TripleRooms
     *
     * @return  self
     */ 
    public function setTripleRooms($TripleRooms)
    {
        $this->TripleRooms = $TripleRooms;

        return $this;
    }

    /**
     * Get the value of Suits
     */ 
    public function getSuits()
    {
        return $this->Suits;
    }

    /**
     * Set the value of Suits
     *
     * @return  self
     */ 
    public function setSuits($Suits)
    {
        $this->Suits = $Suits;

        return $this;
    }

    /**
     * Get the value of BoardType
     */ 
    public function getBoardType()
    {
        return $this->BoardType;
    }

    /**
     * Set the value of BoardType
     *
     * @return  self
     */ 
    public function setBoardType($BoardType)
    {
        $this->BoardType = $BoardType;

        return $this;
    }
}


?>