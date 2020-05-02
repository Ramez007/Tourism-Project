<?php

  require_once("app/controller/Controller.php");

class Support_operatorController extends Controller
    {

       public function Send_newwire(){
            $this->model->Send_newwire();
       }
      
       public function Reply_to_Inquiry(){
        $this->model->Reply_to_Inquiry();
   }
   public function SendMail(){
     $this->model->SendMail();
}
public function SendPackageMail(){
     $this->model->SendPackageMail();
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

    }
?>