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

   }
?>