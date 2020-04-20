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

   public function FetchInq()
   {
        return $this->model->FetchInquiries();
   }

    }
?>