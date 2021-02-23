<?php


class Database{

    private $servername="localhost";
    private $username="root";
    private $password = "";


public function getConnection(){
    try{
     
        $connection = new PDO("mysql:host=$this->servername;dbname=quick", $this->username, $this->password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        return $connection;

    }catch(PDOException $e){
        echo $e;
    }
}

}

?>