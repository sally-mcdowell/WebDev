<?php

 header("Content-Type: application/json");


 if (($_SERVER['REQUEST_METHOD']==='GET')){
        
    include "dbconn.php";

    

    $readSQL = "SELECT * FROM moodlog";

    $result = $conn->query($readSQL);

    $api_response = array();

    while ($row = $result->fetch_assoc()){
        array_push($api_response,$row);
    }

    $response = json_encode($api_response);


   

    if(!$response){
    http_response_code(400);
    exit($conn->error);

    } else {
        http_response_code(201);
        
        echo $response;
    }




}

if (($_SERVER['REQUEST_METHOD']==='GET')){
        
    include "dbconn.php";

    

    $readUserSQL = "SELECT * FROM user";

    $result = $conn->query($readUserSQL);

    $api_response = array();

    while ($row = $result->fetch_assoc()){
        array_push($api_response,$row);
    }

    $response = json_encode($api_response);




    if(!$response){
    http_response_code(400);
    exit($conn->error);

    } else {
        http_response_code(201);
        
        echo $response;
    }
}


// DELETE delete account
        if (($_SERVER['REQUEST_METHOD']==='DELETE') && (isset($_GET['deleteAccount']))){
        
            include "dbconn.php";

            parse_str(file_get_contents('php://input'), $_DATA);

            
            $userAccId = $_DATA['user_id'];
            
    
            $deleteAccSQL = "DELETE FROM moodlog WHERE user_id = '$userAccId' ";
    
            $result = $conn->query($deleteAccSQL);
    
            if(!$result){
            http_response_code(400);
            exit($conn->error);
    
            } else {
                http_response_code(201);
                
                echo json_encode(["message" => "Moods deleted"]);
                
            }

            $deleteUserSQL = "DELETE FROM user WHERE user_id = '$userAccId' ";
    
            $resultDeleteUser = $conn->query($deleteUserSQL);
    
            if(!$resultDeleteUser){
            http_response_code(400);
            exit($conn->error);
    
            } else {
                http_response_code(201);
                
                echo json_encode(["message" => "Account deleted"]);
                
            }
    
    
    
    
        }
?>