<?php

  require_once("app/controller/Controller.php");

class AdminController extends Controller{

    function Addhotel(){
        $this->model->AddHotel();
    }

    
   }
?>