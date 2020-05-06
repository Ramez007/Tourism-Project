<?php

  require_once("app/controller/Controller.php"); 
  require_once("app/observers/supportcenter.php");

class Support_operatorController extends Controller
    {
     protected $center;
     protected $model;
     function __construct($model,$center) {
          $this->center=$center;
         $this->model=$model;
      }
      
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
   public function sendnewswire()
   {
        return $this->center->sendnewswire();   
   }
   public function ReplytoInquiry()
   {
        return $this->center->ReplytoInquiry();   
   }
   public function sendGuestmail()
   {
        return $this->center->sendGuestmail();   
   }
   public function sendPackagereport()
   {
        return $this->center->sendPackagereport();   
   }

    }
?>