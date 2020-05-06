<?php

  require_once("app/controller/Controller.php");

class Support_operatorController extends Controller
    {

   public function FetchInquiries()
   {
        return $this->model->FetchInquiries();
   }
   public function fetchguestemails()
   {
        return $this->model->fetchguestemails();
   }
   public function fetchPackages()
   {
        return $this->model->fetchPackages();
   }
   public function FetchSingleInq($InqID)
   {
        $this->model->FetchSingleInquiry($InqID);
   }

    }
?>