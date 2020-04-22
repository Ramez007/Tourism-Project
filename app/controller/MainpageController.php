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
}

?>