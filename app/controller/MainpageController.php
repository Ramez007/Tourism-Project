<?php
require_once("app/controller/controller.php");
?>

<?php

class MainpageController extends Controller
{
    

    public function listhoteldata()
    {
        $this->model->listdata();
    }

    public function listreviews()
    {
        $this->model->listreviews();
    }

    public function countdata()
    {
        $this->model->countdata();
    }

    public function checkavailabilty()
    {
        $this->model->checkavailabilty();
    }
}

?>