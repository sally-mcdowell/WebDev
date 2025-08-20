<?php
    header("Content-Type: application/json");


    // Get ALL from moodlog
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['moodlog_id'])) && 
    (isset($_GET['name_entered']))){

        include "dbconn.php";

        $user = $conn->real_escape_string($_GET['name_entered']);
        $readSQL ="SELECT moodlog.moodlog_id, moodlog.context, moodlog.date_time, 
        moodlog.mood_id, mood.mood_name, user.username FROM `moodlog` INNER JOIN user 
        ON moodlog.user_id = user.user_id INNER JOIN mood ON moodlog.mood_id = mood.mood_id 
        WHERE user.username = '$user' ORDER BY moodlog_id DESC";

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

    //Get ONE record
    if (($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['moodlog_id']))){

        include "dbconn.php";

        $id = $conn->real_escape_string($_GET['moodlog_id']);

        $readSQL = "SELECT * FROM moodlog WHERE moodlog_id = $id";

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

    // POST /addmood
    if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['addmood']))){

        include "dbconn.php";

        parse_str(file_get_contents('php://input'), $_DATA);

        $mood = $conn->real_escape_string($_DATA['moodtype']);
        $context = $conn->real_escape_string($_DATA['context']);
        $user = $conn->real_escape_string($_DATA['userid']);
        $date = date("Y-m-d H:i:s", strtotime('-1 hours'));

        $insertSQL = "INSERT INTO moodlog (user_id,mood_id,context,date_time) VALUES ('$user','$mood', '$context','$date')";

        $result = $conn->query($insertSQL);

        if(!$result){
        http_response_code(400);
        
        exit($conn->error);

        } else {
        http_response_code(201);
        $last_id = $conn->insert_id;
        echo json_encode(["message" => "New mood successfully added to database with id $last_id"]);
        
}
    }

    // PATCH edit mood
    if (($_SERVER['REQUEST_METHOD']==='PATCH') && (isset($_GET['editmood']))){
        
        include "dbconn.php";

        parse_str(file_get_contents('php://input'), $_DATA);

        $id = $_DATA['moodlog_id'];
        $context = $conn->real_escape_string($_DATA['context']); 
        

        $updateSQL = "UPDATE moodlog SET context= '$context' WHERE moodlog_id = '$id' ";

        $result = $conn->query($updateSQL);

        if(!$result){
        http_response_code(400);
        exit($conn->error);

        } else {
            http_response_code(201);
            
            echo json_encode(["message" => "Mood for record $id successfully edited in database"]);
            
        }




    }

    // DELETE delete mood
    if (($_SERVER['REQUEST_METHOD']==='DELETE') && (isset($_GET['deletemood']))){
        
        include "dbconn.php";

        parse_str(file_get_contents('php://input'), $_DATA);

        $id = $_DATA['moodlog_id'];
 

        $deleteSQL = "DELETE FROM moodlog WHERE moodlog_id = '$id' ";

        $result = $conn->query($deleteSQL);

        if(!$result){
        http_response_code(400);
        exit($conn->error);

        } else {
            http_response_code(201);
            
            echo json_encode(["message" => "Mood for record $id successfully edited in database"]);
            
        }

    }

        // POST /Register new user
        if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['register']))){

            include "dbconn.php";
    
            parse_str(file_get_contents('php://input'), $_DATA);
    
            $username= $conn->real_escape_string($_DATA['userregister']);
            $email= $_DATA['emailregister'];
            $password = $conn->real_escape_string($_DATA['passwordregister']);
            $repeatpassword = $conn->real_escape_string($_DATA['repeatpasswordregister']);

            $checkUsername = "SELECT user.username FROM user WHERE username='$username'";

            $checkResource = $conn->query($checkUsername);

            
            if($checkResource -> num_rows >0 ){
                http_response_code(401);
                echo " Username already exists. Please enter a different username.";
                exit();

            } else if ($password != $repeatpassword){
                http_response_code(401);
                echo "Password and repeat passsword do not match";
                exit();
             }
            
            else{
    
            $insertSQL = "INSERT INTO user (username,user_password, user_email) VALUES ('$username','$password','$email')";
    
            $result = $conn->query($insertSQL);

            if(!$result){
            http_response_code(401);
            
            exit($conn->error);
    
            } else {
            http_response_code(201);
            $last_id = $conn->insert_id;
            echo json_encode(["message" => "New account successfully added to database with id $last_id"]);
            
    }
        }
    }

?>