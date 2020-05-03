<?php

  require_once("app/controller/Controller.php");

class GuestController extends Controller{
//     public function insert() {
//           // Escape user inputs for security
//     $fruit_name = $_REQUEST['fruit_name'];
//     $price = $_REQUEST['price'];

//       $this->model->insertFruit($fruit_name,$price);
//     }

       public function Register(){
            $this->model->register();
       }
       public function FetchProfileData($ID)
       {
         $this->model->GetProfileData($ID);
       }

       public function AddHotelReview()
       {
          $hotelname=$_GET['action'];
          $review=$_POST['reviewhotel'];
          $this->model->ReviewHotel($hotelname,$review);
       }

       public function AddPkgReview()
       {
          $pkgid=$_GET['action'];
          $review=$_POST['reviewpkg'];
          $this->model->ReviewPkg($pkgid,$review);
       }

   }
?>