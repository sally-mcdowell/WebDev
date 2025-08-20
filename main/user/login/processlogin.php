<?php

session_start();

 if (isset($_POST['submitted'])){ 

  $user = $_POST['name_entered'];
  $pass = md5($_POST['password_entered']);

$endpoint = "http://localhost/dejamood/api/apilogin.php?name_entered=$user&password_entered=$pass";

$resource = file_get_contents($endpoint);

$data = json_decode($resource, true);

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

             
                echo "<a class='button is-warning is-light has-text-weight-bold is-outlined' href='../user/login/login.php'>   Log in
                </a>";
        echo "<a class='button is-warning is-light has-text-weight-bold is-outlined' href='../../register.php'>   Register
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


if(!$data || count($data) === 0){
    
    echo "<h1 class='title'>Incorrect username or password.</h1>";
     echo "<a class='button has-background-danger-light has-text-weight-bold' href='login.php'> Please try again</a>";
    exit("");
    

} else {


$data = json_decode($resource, true);
$parseData = $data[0];

if($user == $parseData["username"] && ($pass == $parseData["user_password"])){

$_SESSION['loggedin']=true;
$_SESSION['userid'] = $parseData["user_id"];
$_SESSION['user'] = $parseData["username"];

header("Location:../../index.php");
        
 }  

 }

?>
</div>
</div>
</div>


</body>
</html>