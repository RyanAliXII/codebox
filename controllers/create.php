<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once('../models/autoload.php');

   
    if(!empty($_POST['title']) && 
        !empty($_POST['description']) &&
        !empty($_POST['name'] &&
        !empty($_POST['body'])
        )
    )
    {   
        extract($_POST);

        $database = new Database();
        $connection = $database->getConnection();
        $post = new Post($title,$description,$body,$name);
        $post->setConnection($connection);
        $post->save();
    }



?>