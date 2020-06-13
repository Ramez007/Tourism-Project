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
      
      $required = array('Editpackagename', 'numberofdays', 'numberofnights', 'reservelimit', 'totalprice', 'edit-date-start', 'edit-date-end','editpackageoverview','editpackagedescription');
      $error = false;
        foreach($required as $field) 
        {
            if (empty($_REQUEST[$field])) 
            {
                $error = true;
            }
        }
      
        if ($error) 
        {
            echo'<script>swal("There is an empty field", "", "error");</script>';
        } 
        else 
        {


            $name=htmlspecialchars($_REQUEST['Editpackagename'], ENT_QUOTES);
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
            $overview=htmlspecialchars($_REQUEST['editpackageoverview'], ENT_QUOTES);
            
            $description= htmlspecialchars($_REQUEST['editpackagedescription'], ENT_QUOTES);
            $id=$_REQUEST['packageid'];

            if ($_REQUEST['numberofdays'] >=1 && $_REQUEST['numberofnights'] >=1 && $_REQUEST['numberofdays'] >=1 && $_REQUEST['reservelimit'] >= 1 && $_REQUEST['totalprice'] >= 100 && strlen($_POST['editpackageoverview']) ==140)
            {
            $this->model->EditPackage($id,$cruise,$name,$days,$nights,$limit,$price,$start,$end,$transport,$guide,$map,$boardtype,$hotel,$overview,$description);
            }
            else
            {
              echo'<script>
                    swal("Oops","Error Editing Package !","error");
                    </script>';
            }
        }  
    }

    function AddPackage()
    {

      $required = array('packagename', 'numberofdays', 'numberofnights', 'reservelimit', 'totalprice', 'date-start', 'date-end', 'boardtype','cruise','hotels','addpackageoverview','addpackagedescription');
      $error = false;
        foreach($required as $field) 
        {
            if (empty($_REQUEST[$field])) 
            {
                $error = true;
            }
        }
      
        if ($error) 
        {
            echo'<script>swal("There is an empty field", "", "error");</script>';
        } 
        else 
        {
          $name=htmlspecialchars($_REQUEST['packagename'], ENT_QUOTES);
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
          $overview=htmlspecialchars($_REQUEST['addpackageoverview'], ENT_QUOTES);
          
          $description=htmlspecialchars($_REQUEST['addpackagedescription'], ENT_QUOTES);

          if ($_REQUEST['numberofdays'] >=1 && $_REQUEST['numberofnights'] >=1 && $_REQUEST['numberofdays'] >=1 && $_REQUEST['reservelimit'] >= 1 && $_REQUEST['totalprice'] >= 100 && strlen($_POST['addpackageoverview']) ==140)
          {
            $this->model->AddPackage($cruise,$name,$days,$nights,$limit,$price,$start,$end,$transport,$guide,$map,$boardtype,$hotel,$overview,$description);

          }
          else
          {
            echo'<script>
                    swal("Oops","Error Adding Package !","error");
                    </script>';
          }
          
        }  
      
      
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
      $required = array('eventtitle','eventmonth','eventyear','eventpost');
      $error = false;
        foreach($required as $field) 
        {
            if (empty($_REQUEST[$field])) 
            {
                $error = true;
            }
        }
        if ($error) 
        {
            echo'<script>swal("There is an empty field", "", "error");</script>';
        } 
        else 
        {
            $Event_Title = htmlspecialchars($_REQUEST['eventtitle'], ENT_QUOTES);
            $Event_Month = htmlspecialchars($_REQUEST['eventmonth'], ENT_QUOTES);
            $Event_Year = $_REQUEST['eventyear'];
            $Event_Post = htmlspecialchars($_REQUEST['eventpost'], ENT_QUOTES);
            if (strlen($_REQUEST['eventtitle']) >=4 && strlen($_REQUEST['eventmonth']) ==3 && $_REQUEST['eventyear'] >=1900 && $_REQUEST['eventyear'] <=3000 && strlen($_REQUEST['eventpost']) ==300)
            {
              $this->model->AddEvent($Event_Title,$Event_Month,$Event_Year,$Event_Post);
            }
            else
            {
              echo'<script>swal("Error Adding Event", "", "error");</script>';
            }
            
        }
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