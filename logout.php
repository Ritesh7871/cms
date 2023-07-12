<?php 
// include('Includes/db.php');
include('Includes/function.php');
include('includes/sessions.php');
$_SESSION['userid'] = null;
$_SESSION['username'] = null;
$_SESSION['adminname'] = null;
session_destroy();
Redirect_to("login.php");

?>