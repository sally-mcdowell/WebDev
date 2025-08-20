<?php

include "../../navigation.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déjà Mood</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
  
<body class="has-background-info">
<div class="container py-5 px-2">
  <div class="notification is-white">
  <?php 
      echo "<h1 class='title is-1'>{$_SESSION['user']} </h1>";
    ?>
  <h4 class="subtitle is-4">Are you sure you want to delete your account?</h4>

  <div class="field">
        <div class="control">     
            <a href="http://localhost/dejamood/main/user/account/processdeleteaccount.php" class="button has-background-danger has-text-weight-bold is-outlined"> Yes, delete account </a>
            <a class="button has-background-danger-light has-text-weight-bold is-outlined" href="http://localhost/dejamood/main/moodlog.php"> No, return to mood log</a>
        </div>
    </div>  
          </div>

</section>
</body>
</html>