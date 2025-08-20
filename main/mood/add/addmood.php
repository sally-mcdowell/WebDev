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
    echo  "<h1 class='title'> {$_SESSION['user']} </h1>";
 ?>
  <h1 class="title is-2">How are you feeling today?</h1>
  <form method="post" action="processadd.php">
<div class="field">  
<label class="label" for="mood-input"> Select your mood</label>
    <div class="select is-info">
        <select name="moodtype" id="mood-input">
            <option value="1">Happy</option>
            <option value="2">Energetic</option>
            <option value="3">Calm</option>
            <option value="4">Tired</option>
            <option value="5">Sad</option>
            <option value="6">Stressed</option>
            <option value="7">Anxious</option>
            <option value="8">Angry</option>
    </select>   
</div>

    <div class="control py-5">
    <label class="label" for="mood-input"> Enter a comment</label>
        <input class="input is-info" name="context" type="text" placeholder="What made you feel this way?" id="context-input">
</div>

    <div class="field">
        <div class="control">
            <input class="button has-background-danger-light has-text-weight-bold is-outlined" type="submit" value="Submit mood">
</div>
    </div>

</div>
</form>
</section>
</body>
</html>