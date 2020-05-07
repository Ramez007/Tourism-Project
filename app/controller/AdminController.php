<?php

  require_once("app/controller/Controller.php");

class AdminController extends Controller{

    function Addhotel(){
        $this->model->AddHotel();
    }
    function Edithotel()
    {
      $id = $_REQUEST['HotelId'];
      $this->model->Edithotel($id);
    }

    function EditPackage()
    {
      $name=$_REQUEST['Editpackagename'];
      $days=$_REQUEST['numberofdays'];
      $nights=$_REQUEST['numberofnights'];
      $limit=$_REQUEST['reservelimit'];
      $price=$_REQUEST['totalprice'];
      $start=$_REQUEST['edit-date-start'];
      $end=$_REQUEST['edit-date-end'];



      $transport="FALSE";
      $guide="FALSE";
      $map="FALSE";
      if(!empty($_REQUEST['pkg_service']))  
      {
        $values=array();
        foreach($_REQUEST['pkg_service'] as $check)
          {
              array_push($values,$check);
          }
        

     
        for($i=0;$i<count($values);$i++)
        {
          if($values[$i]=="trans")
          {
            $transport="TRUE";
          }
          else if ($values[$i]=="guide")
          {
            $guide="TRUE";
          }
          else if($values[$i]=="map")
          {
            $map="TRUE";
          }
        }
      } 
      $boardtype=$_REQUEST['boardtype'];
      
      $cruise="";

      if ($_REQUEST['cruise']=="None")
      {
        
        $cruise="NULL";
      }
      else
      {
        $cruise=$_REQUEST['cruise'];
      }
      $hotel=$_REQUEST['hotel'];
      $overview=$_REQUEST['editpackageoverview'];
      $description=$_REQUEST['editpackagedescription'];
      $id=$_REQUEST['packageid'];
      $this->model->EditPackage($id,$cruise,$name,$days,$nights,$limit,$price,$start,$end,$transport,$guide,$map,$boardtype,$hotel,$overview,$description);
    }

    function AddPackage(){
      $name=$_REQUEST['packagename'];
      $days=$_REQUEST['numberofdays'];
      $nights=$_REQUEST['numberofnights'];
      $limit=$_REQUEST['reservelimit'];
      $price=$_REQUEST['totalprice'];
      $start=$_REQUEST['date-start'];
      $end=$_REQUEST['date-end'];



      $transport="FALSE";
      $guide="FALSE";
      $map="FALSE";

      if(!empty($_REQUEST['pkg_service']))
      {
        $values=array();
        foreach($_REQUEST['pkg_service'] as $check)
          {
              array_push($values,$check);
          }
        
      
        for($i=0;$i<count($values);$i++)
        {
          if($values[$i]=="trans")
          {
            $transport="TRUE";
          }
          else if ($values[$i]=="guide")
          {
            $guide="TRUE";
          }
          else if($values[$i]=="map")
          {
            $map="TRUE";
          }
        }
      } 
      $boardtype=$_REQUEST['boardtype'];
      $cruise="";
      if ($_REQUEST['cruise']=="None")
      {
        
        $cruise="NULL";
      }
      else
      {
        $cruise=$_REQUEST['cruise'];
      }
      $hotel=$_REQUEST['hotels'];
      $overview=$_REQUEST['addpackageoverview'];
      $description=$_REQUEST['addpackagedescription'];
      $this->model->AddPackage($cruise,$name,$days,$nights,$limit,$price,$start,$end,$transport,$guide,$map,$boardtype,$hotel,$overview,$description);
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

    function ConfirmBook()
    {
      $reserveid = $_REQUEST['reserveid'];
      $this->model->ConfirmReserve($reserveid);
    }

    function SuspendPackage()
    {
      $this->model->SuspendPackage();
    }

    function SuspendHotel()
    {
      $this->model->SuspendHotel();
    }

    

    

    
    
   }
?>