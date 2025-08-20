<?php
include "../../navigation.php";


$mood = $_POST['moodtype'];
$context = $_POST['context'];
$user_id = $_SESSION['userid'];
$date = date("Y-m-d H:i:s", strtotime('-1 hours'));

$endpoint = "http://localhost/dejamood/api/api.php?addmood";

$postdata = http_build_query(
 array(
    'moodtype' => $mood,
    'context' => $context,
    'userid' => $user_id,
    $date = date("Y-m-d H:i:s", strtotime('-1 hours'))

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
    $resource = file_get_contents($endpoint, false, $context);

?>

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
if($resource === FALSE){
    echo "<h1> Unable to add mood </h1>";
    echo "<a class='button has-background-danger-light has-text-weight-bold' href='http://localhost/dejamood/main/moodlog.php'> Please try again</a>";
    exit("");

} else {
    echo "<h1 class='title'> Mood added successfully</h1>";
    echo "<a class='button has-background-danger-light has-text-weight-bold' href='http://localhost/dejamood/main/moodlog.php'> Return to mood history</a>";
   

}

?>

</div>
</div>
</div>
</body>
</html>