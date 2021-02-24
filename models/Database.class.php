<?php


class Database{

    private $servername="localhost";
    private $username="root";
    private $password = "";
    private $dbName = "quick";



public function getConnection(){
    try{
     
        $connection = new PDO("mysql:host=$this->servername;dbname=$this->dbName;", $this->username, $this->password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        return $connection;

    }catch(PDOException $e){
        echo $e;
    }
}

}

?>