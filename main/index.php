<?php
session_start();

if(!isset($_SESSION['loggedin'])){
  $loggedin = false;


} else {
  $loggedin = true;
 
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déjà Mood</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="http://localhost/dejamood/main/index.php">
      <img src="images/nav_bar_logo.png" style="max-height: 75px" class="py-2 px-2">
    </a>


  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
   
      <?php

              if($loggedin){

      echo "   <a class='navbar-item' href='http://localhost/dejamood/main/index.php'>Home </a>
      <a class='navbar-item' href='http://localhost/dejamood/main/moodlog.php'> Mood log </a>
      <a class='navbar-item' href='http://localhost/dejamood/main/chart/visualisation.php'> Mood Summary </a>
      <a class='navbar-item' href='http://localhost/dejamood/main/user/account/myaccount.php'> My Account</a>";
              } ?>

</div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
        
          <?php

              if($loggedin){
             
              echo "<a class='button is-warning is-light has-text-weight-bold is-outlined' href='../main/user/login/logout.php'>   Log out
              </a>";

              } else {
                echo "<a class='button is-warning is-light has-text-weight-bold is-outlined' href='../main/user/login/login.php'>   Log in
            </a>";
    echo "<a class='button is-warning is-light has-text-weight-bold is-outlined' href='../main/user/register/register.php'>   Register
          </a>";
              }
              ?>
        </div>
      </div>
    </div>
  </div>
</nav>
<body class="has-background-info">



<section>


    <div class="container">
    <figure class="image is-1060x204 py-4 px-4">
  <img src="images/large_title_trans.png">
</figure>
       
<div class="columns">
  <div class="column"> 
    <figure class="image is-128x128">
  <img class="is-rounded" src="images/energetic_cow.png">
</figure>
  </div>
  <div class="column">
  <figure class="image is-128x128">
  <img class="is-rounded" src="images/happy_cow.png">
</figure>
  </div>
  <div class="column">
      <figure class="image is-128x128">
  <img class="is-rounded" src="images/worried_cow.png">
</figure>
  </div>
  <div class="column">
  <figure class="image is-128x128">
  <img class="is-rounded" src="images/angry_cow.png">
</figure>
  </div>
  <div class="column">      
  <figure class="image is-128x128">
  <img class="is-rounded" src="images/sad_cow.png">
</figure>
  </div>
</div>

 <div class="container is-fluid py-5 px-2"> 
  <div class="notification is-white">
   <?php 
    if($loggedin){
      echo "<h1 class='title'> Welcome {$_SESSION['user']}!</h1>";
 
      echo "<div class='columns'>
      <div class='column is-one-third'><a href='moodlog.php'>
            <img src='images/blue_diary.png' ></a>
          </div>
          <div class='column is-one-third'>
          <a href='../main/chart/visualisation.php'>
            <img src='images/chart.png'> </a>
          </div>
          <div class='column is-one-third'>
          <a href='../main/user/account/myaccount.php'>
            <img src='images/account_info_cow.png'> </a>
          </div> </div>";
          echo "<h1 class='title'> </h1>";

    } else {
    echo "<h1 class='title'>Welcome! </h1>";
    echo "<h1 class='title'>Déjà Mood is a mood tracking website!</h1><h4 class='subtitle is-4'<br>Track your moods<br>Add mood context for your moods<br> See a summary of moods logged over time  </h4>";
    echo "<a class='button has-background-danger-light has-text-weight-bold is-outlined' href='user/login/login.php'>   Log in
            </a>
    <a class='button has-background-danger-light has-text-weight-bold is-outlined' href='user/register/register.php'>   Register
          </a>";
    }
    ?>
  
  </div>
</section>
  </body>
</html>