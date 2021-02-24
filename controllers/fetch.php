<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once('../models/autoload.php');
$data = json_decode(file_get_contents("php://input"));
   

    if(!empty($data->id)
    )
    {   
        $database = new Database();
        $connection = $database->getConnection();
        $post = new Post(" "," ", " ", " ", " ");
        $postId = $post->getId();
        $post->setConnection($connection);
        $result = $post->findById($data->id);

        if(!empty($result)){
            extract($result);

            $response = array(
            "id" =>$id ,
            "title"=>$title,
            "description"=>$description,    
            "body"=>$body,
            "name"=>$name,
            "date"=>$date,
            "status"=>"OK"
        );
        http_response_code(200);
        echo json_encode($response);
        }
        else{
            $response = array(
                "status" => "empty"
            );
            echo json_encode($response);
        }
       
    }
    else{
        $response = array(
            "status" => "empty"
        );
        echo json_encode($response);
        http_response_code(400);
    }
 
    
       
    
   


?>