<?php
require_once("app/controller/controller.php");
?>

<?php

class HotelController extends Controller
{
    

    public function listhoteldata()
    {
        $this->model->listdata();
    }

    public function ReadReviews($controller)
    {
        
        $this->model->ReadHotelsReviews($controller);
    }

    public function updaterooms()
    {
        $this->model->updaterooms();
    }
}

?>