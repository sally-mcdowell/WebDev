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

$parseData = $data[0];
$userCheck = $parseData["user_id"];
if($userCheck != $userid){
  header("Location:../../index.php");
}

foreach ($data as $row) {

    $mood = $row["mood_id"];
   $context = $row["context"];
    $date = $row["date_time"];
    $moodlogid = $row["moodlog_id"]; 
 
}


         
switch ($mood) {
    case "1":
      $mood = "<img src='../../images/happy_cow.png'>";
      break;
    case "2":
       $mood = "<img src='../../images/energetic_cow.png'>";
      break;
    case "3":
       $mood = "<img src='../../images/calm_cow.png'>";
      break;
    case "4":
       $mood = "<img src='../../images/tired_cow.png'>";
        break;
    case "5":
       $mood = "<img src='../../images/sad_cow.png'>";
        break;
    case "6":
       $mood = "<img src='../../images/stressed_cow.png'>";
        break;
    case "7":
       $mood = "<img src='../../images/anxious_cow.png'>";
        break;
    case "8":
       $mood = "<img src='../../images/angry_cow.png'>";
        break;
      default:
       $mood = "Error - No mood logged";
    } ?>
  

 <div class="container py-5 px-2 ">
  <div class="notification is-white">  
    <section>
  <h1 class="title is-1">Delete mood record</h1>
  <h4 class="subtitle is-4">Please confirm that you would like to delete this mood record</h4>
 
</section>
<section>

<table class="table is-fullwidth is-hoverable">
              <thead>
                <tr>
                <th>Mood</th> 
                <th>Context</th>
                <th>Date</th>

</tr>
</thead>
</tbody>

    <?php
echo "<tr>
                      <td>$mood</td>
                      <td>$context</td>
                      <td>$date</td>
                      </tr>";
                      ?>
    

</div>
        </div>
</section>
            
<div class="notification is-white">

         <div class="field"> 
        <div class="control">
        <form method="post" action="processdelete.php">
            <input type="hidden" value="<?php echo $moodlogid ?>" name="moodlog_id">

            <input class="button has-background-danger has-text-weight-bold is-outlined" type="submit" value="Delete mood record">
</form>

</div>
</div> 
</body>
</html>