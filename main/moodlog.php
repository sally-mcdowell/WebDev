<?php

include "navigation.php";

$endpoint = "http://localhost/dejamood/api/api.php?name_entered=$user";

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
<div class="container py-5 px-2">
  <div class="notification is-white">
  <h1 class="title is-1">Mood history</h1>
  <h4 class="subtitle is-4">Add  a mood log entry, edit the context or delete previously logged moods. </h4>

  <div class="field">
        <div class="control">
            <a class="button has-background-danger-light has-text-weight-bold is-outlined" href="http://localhost/dejamood/main/mood/add/addmood.php"> Add mood </a>
</div>
    </div>
            

            <table class="table is-fullwidth is-hoverable">
              <thead>
                <tr>
                <th>Mood</th> 
                <th>Mood name</th> 
                <th>Context</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>

</tr>
</thead>
</tbody>

                  
<?php 
             foreach ($data as $row){
              
      
              $moodlogid = $row["moodlog_id"];
              $moodname = $row["mood_name"];
              $context = $row["context"];
              $date = $row["date_time"];
              $mood = $row["mood_id"];
              $username = $row["username"];
               
                         
 switch ($mood) {
  case "1":
    $mood = "<img src='images/happy_cow.png'>";
    break;
  case "2":
     $mood = "<img src='images/energetic_cow.png'>";
    break;
  case "3":
     $mood = "<img src='images/calm_cow.png'>";
    break;
  case "4":
     $mood = "<img src='images/tired_cow.png'>";
      break;
  case "5":
     $mood = "<img src='images/sad_cow.png'>";
      break;
  case "6":
     $mood = "<img src='images/stressed_cow.png'>";
      break;
  case "7":
     $mood = "<img src='images/anxious_cow.png'>";
      break;
  case "8":
     $mood = "<img src='images/angry_cow.png'>";
      break;
    default:
     $mood = "Error - No mood logged";
} 
              
              echo "<tr>
                      <td>$mood</td>
                      <td>$moodname</td>
                      <td>$context</td>
                      <td>$date</td>
                      <td><a href='../main/mood/edit/editmood.php?editid=$moodlogid' class='button has-background-danger-light has-text-weight-bold is-outlined' > Edit context </a></td>

                      <td><a href='../main/mood/delete/deletemood.php?editid=$moodlogid' class='button has-background-danger-light has-text-weight-bold is-outlined' > Delete record </a></td>
                      </tr>";
            }
            ?>

          </div>

</section>
</body>
</html>