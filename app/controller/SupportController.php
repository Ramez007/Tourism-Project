<?php

  require_once("app/controller/Controller.php");

class Support_operatorController extends Controller
    {

       public function Send_newwire(){
            $this->model->Send_newwire();
       }

    }
?>