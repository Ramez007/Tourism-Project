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
}

?>