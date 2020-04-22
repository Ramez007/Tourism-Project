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

   public function FetchInquiries()
   {
        return $this->model->FetchInquiries();
   }
   public function FetchSingleInq($InqID)
   {
        $this->model->FetchSingleInquiry($InqID);
   }

    }
?>