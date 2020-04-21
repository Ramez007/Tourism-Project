<?php
require_once("app/view/view.php");

class AdminView extends View
{
    

    public function output()
    {
        $this->model->ReadPendingReservations();
    }

    public function OutofPendingPackagesReservations()
    {
        $this->model->ReadPendingReservations2();
    }

    public function ReadEditHotels(){
        $this->model->ReadEditHotelsSection();
    }

    public function ReadSuspendHotels(){
        $this->model->ReadSuspendHotelsSection();
    }

    public function ReadEditPackages(){
        $this->model->ReadEditPackagesSection();
    }

    public function ReadSuspendPackages(){
        $this->model->ReadSuspendPackagesSection();
    }

    public function ReadEditEvents(){
        $this->model->ReadEditEventsSection();
    }

    public function ReadSuspendEvents(){
        $this->model->ReadSuspendEventsSection();
    }
}

?>