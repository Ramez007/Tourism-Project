<?php
require_once("app/controller/controller.php");
?>

<?php

class singlehotelcontroller extends Controller
{
    

    public function listhoteldata()
    {
        $this->model->listhoteldata();
    }
}

?>