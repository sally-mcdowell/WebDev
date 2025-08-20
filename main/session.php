<?php

session_start();

if(!isset($_SESSION['loggedin'])){
  $loggedin = false;
  header("Location:../../index.php");

} else {

  $loggedin = true;
  $user = $_SESSION['user'];
  $userid = $_SESSION['userid'];

}
?>