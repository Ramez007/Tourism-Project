<?php

  require_once("app/controller/Controller.php");

class inquiries_guest extends Controller
    {

       public function write_inquiries(){
            $this->model->write_inquiries();
       }

    }
?>