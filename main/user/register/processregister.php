<?php

$username = $_POST['userregister'];
$password = md5($_POST['passwordregister']);
$repeatpassword = md5($_POST['repeatpasswordregister']);
$email = ($_POST['emailregister']);

$endpoint = "http://localhost/dejamood/api/api.php?register";

$postdata = http_build_query(
 array(
    'userregister' => $username,
    'passwordregister' => $password,
    'repeatpasswordregister' => $repeatpassword,
    'emailregister' => $email

 )

 );

 $opts = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content'=> $postdata
    )

    );

    $context =stream_context_create($opts);
    @$resource = file_get_contents($endpoint, false, $context);

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
      <img src="../../images/nav_bar_logo.png" style="max-height: 75px" class="py-2 px-2">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
 
    </a>
    <script>document.addEventListener('DOMContentLoaded', () => {

// Get all "navbar-burger" elements
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Add a click event on each of them
$navbarBurgers.forEach( el => {
  el.addEventListener('click', () => {

    // Get the target from the "data-target" attribute
    const target = el.dataset.target;
    const $target = document.getElementById(target);

    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
    el.classList.toggle('is-active');
    $target.classList.toggle('is-active');

  });
});

}); </script>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="http://localhost/dejamood/main/index.php">
        Home
      </a>
</div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <?php
                echo "<a class='button is-warning is-light has-text-weight-bold is-outlined' href='../login/login.php'>   Log in
                </a>";
        echo "<a class='button is-warning is-light has-text-weight-bold is-outlined' href='register.php'>   Register
              </a>";  
              ?>
        </div>
      </div>
    </div>
  </div>
</nav>

<body class="has-background-info">
<div class="container py-5 px-2">
  <div class="notification is-white">

<?php 


if($resource === FALSE){

    echo "<h1 class='title'>Error with user name or password</h1>";
     echo "<a class='button has-background-danger-light has-text-weight-bold' href='register.php'> Please try again</a>";
    
    exit("");
    

} else if ($password != $repeatpassword){
  echo "<h1 class='title'> Error with username or password </h1>";
  echo "<a class='button has-background-danger-light has-text-weight-bold' href='register.php'> Please try again</a>";
 
 exit("");

}

else {

    echo "<h1 class='title'>Account created successfully</h1>";
     echo "<a class='button has-background-danger-light has-text-weight-bold' href='../login/login.php'> Log in</a>";
}

?>

</div>
</div>
</div>

</body>
</html>