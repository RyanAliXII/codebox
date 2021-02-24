<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once('../models/autoload.php');
$data = json_decode(file_get_contents("php://input"));


    if(!empty($data->title) && 
        !empty($data->description) &&
        !empty($data->name) &&
        !empty($data->body && 
        !empty($data->date))
    )
    {   
        $database = new Database();
        $connection = $database->getConnection();
        $post = new Post($data->title,$data->description,$data->name,$data->body,$data->date);
        $postId = $post->getId();
        $post->setConnection($connection);

        $post->save();
        http_response_code(200);
        $response = array("status" => "OK", "postId"=>$postId);
        echo json_encode($response);
    }
    else{
        http_response_code(400);
    }
 
    
       
    
   


?>