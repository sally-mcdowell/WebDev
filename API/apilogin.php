<?php

 header("Content-Type: application/json");

 // Get ALL from user
 if(($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['name_entered'])) && (isset($_GET['password_entered']))  ){

    include "dbconn.php";

    $user = $conn->real_escape_string($_GET['name_entered']);
    $pass = $conn->real_escape_string($_GET['password_entered']);

    $readSQL = "SELECT * FROM user WHERE username = '$user' AND user_password = '$pass'";
   

    $result = $conn->query($readSQL);

 
    if(!$result){
        exit($conn->error);
    }



    $api_response = array();

    while ($row = $result->fetch_assoc()){
        array_push($api_response,$row);
    }

    $response = json_encode($api_response);

    if($response != false ){
        http_response_code(200);
        echo $response;

    } else {
        http_response_code(404);
        echo json_encode(["message" => "Unable to process response!"]);
        
    }
}
 

?> 