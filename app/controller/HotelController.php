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

    public function ReadReviews()
    {
        $this->model->ReadHotelsReviews();
    }
}

?>