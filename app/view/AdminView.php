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

    public function ReadMainSliderHotels(){
        $this->model->ReadMainSliderHotelsSection();
    }

    public function ReadFeaturedHotels(){
        $this->model->ReadFeaturedHotelsSection();
    }

    public function ReadPReviews(){
        $this->model->ReadPackagesReviews();
    }

    public function ReadHReviews(){
        $this->model->ReadHotelsReviews();
    }

    public function ReadCruises(){
        $this->model->ReadCruises();
    }

    public function ReadHotels(){
        $this->model->ReadHotels();
    }
}

?>