<?php
include "../../navigation.php";


$moodlogid = $_GET['editid'];

$endpoint = "http://localhost/dejamood/API/api.php?moodlog_id=$moodlogid";

$resource = file_get_contents($endpoint);

$data = json_decode($resource, true);

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

<?php

foreach ($data as $row) {
    
   $context = $row["context"];  
}
  
?>

<div class="container py-5 px-2">
  <div class="notification is-white">
  <h1 class="title is-1">Edit context</h1>
  <form method="post" action="processedit.php">
<div class="field">
    
<?php 


$parseData = $data[0];
$userCheck = $parseData["user_id"];


if ($userCheck == $userid){
    echo "<label class='label' for='mood-input'> Enter a comment</label>
    <div class='control py-5'>
        <input class='input is-info' name='context' type='text' value={$context}>

        </div>

   
        <div class='field'>
        <div class='control'>
            <input type='hidden' value=$moodlogid name='moodlog_id'>

            <input class='button has-background-danger-light has-text-weight-bold is-outlined' type='submit' value='Update mood context'>
 
            </div>
            </div>";
               } else {
    header("Location:../../index.php");
 }
    ?>
</div>
</div>
    </div>

</form>
</section>
</body>
</html>