<?php
    header("Content-Type: application/json");


    // Get ALL from moodlog
    if (($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['userid']))){

        include "dbconn.php";


        $user = $_GET['userid'];
        $readSQL ="SELECT moodlog.date_time, mood.mood_name FROM `moodlog` INNER JOIN user ON moodlog.user_id = user.user_id INNER JOIN mood ON moodlog.mood_id = mood.mood_id WHERE user.user_id = '$user'";

        $result = $conn->query($readSQL);

        if(!$result){
            exit($conn->error);
        }

        $api_response = array();

        while ($row = $result->fetch_assoc()){
            array_push($api_response,$row);
        }

        $response = json_encode($api_response);

        if($response != false){
            http_response_code(200);
            echo $response;
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Unable to process response!"]);
        }
    }


    ?>