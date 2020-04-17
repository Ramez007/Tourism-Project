<?php
require_once("app/controller/controller.php");
?>

<?php

class MainpageController extends Controller
{
    public function listhotelname()
    {
        $this->model->listhotelname();
    }

    public function listhoteldata()
    {
        $this->model->listdata();
    }
}

?>