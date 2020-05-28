<?php

  require_once("app/controller/Controller.php");

class UserController extends Controller{
//     public function insert() {
//           // Escape user inputs for security
//     $fruit_name = $_REQUEST['fruit_name'];
//     $price = $_REQUEST['price'];

//       $this->model->insertFruit($fruit_name,$price);
//     }

       public function login(){
            $this->model->Login();
       }

       public function login_with_G(){
        $this->model->login_with_G();
       }
       
       public function checkavailabilty()
    {
        $this->model->checkavailabilty();
   
        $single=$this->model->getNoofsingle();
        $double=$this->model->getNoofdouble();
        $triple=$this->model->getNooftriple();
        $suites=$this->model->getNoofsuites();
    
        if (isset($_POST['hotelselect']))
        {
        echo '<script> swal("Availabilty","\nAvailable of Single Room:'.$single.' \n\n Available of Double Room:'.$double.' \n\n  Available of Triple Room:'.$triple.' \n\n Available of Suites:'.$suites.' \n\n If you want to book the hotel visit the hotel page");</script>';
        }
   
    
    }

    public function ForgotPassword($Email)
    {
      return $this->model->ForgotPass($Email);
    }
    public function ResetPassword($ID,$Password)
    {
      $this->model->ResetPass($ID,$Password);
    }

   }
?>