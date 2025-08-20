<?php

include "../../navigation.php";


$id = $_POST['moodlog_id'];
$context = $_POST['context']; 
 
$endpoint = "http://localhost/dejamood/API/api.php?editmood";

$postdata = http_build_query(
    array(
        'moodlog_id' => $id,
       'context' => $context,
    )
   
    );
   
    $opts = array(
       'http' => array(
           'method' => 'PATCH',
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

    echo "<h1 class='title'> Unable to add mood </h1>";
    echo "<a class='button has-background-danger-light has-text-weight-bold' href='http://localhost/dejamood/main/moodlog.php'> Please try again</a>";
    exit($conn->error);

} else {
    echo "<h1 class='title'> Mood updated successfully</h1>";
    echo "<a class='button has-background-danger-light has-text-weight-bold' href='http://localhost/dejamood/main/moodlog.php'> Return to mood history</a>";
} 

?>

</div>
</div>
</div>

</body>
</html>