<?php


class Database{

    // private $servername="localhost";
    // private $username="root";
    // private $password = "";
    //private $dbName = "quick";

    private $servername="remotemysql.com";
    private $username="Lt0C9j1oKd";
    private $password = "q3yaS35KUk";
    private $dbName = "Lt0C9j1oKd";

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