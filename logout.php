<?php
include('configapi.php');
session_start();
session_unset();
session_destroy();
$google_client->revokeToken();
header("Location:index.php");

?>