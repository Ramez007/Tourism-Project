<?php
  require_once("app/model/model.php");
  require_once("app/model/user.php")
?>

<?php

class Employee extends User {

    protected $joptype;
    protected $id;
    
    function __construct() {
        $this->dbh = $this->connect();
    }

}

?>