<?php

  require_once("app/controller/Controller.php");

class AdminController extends Controller{

    function Addhotel(){
        $this->model->AddHotel();
    }

    function EditReviews(){
      $this->model->EditReviews();
    }

    function EditFeaturedHotels(){
      $this->model->EditFeaturedHotels();
    }

    function EditFeaturedMainSilder(){
      $this->model->EditFeaturedMainSilder();
    }

    function AddEvent()
    {
      $Event_Title = $_REQUEST['eventtitle'];
      $Event_Month = $_REQUEST['eventmonth'];
      $Event_Year = $_REQUEST['eventyear'];
      $Event_Post = $_REQUEST['eventpost'];
      $this->model->AddEvent($Event_Title,$Event_Month,$Event_Year,$Event_Post);
    }

    function EditEvent(){
      $id = $_REQUEST['postid'];
      $this->model->EditEvent($id);
    }

    function SuspendEvent()
    {
      $this->model->SuspendEvent();
    }

    

    
    
   }
?>