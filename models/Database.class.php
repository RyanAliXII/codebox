<?php
// require_once('../vendor/autoload.php');
// $dotenv = Dotenv\Dotenv::createImmutable("../");
// $dotenv->safeLoad();

class Database{

    private $host;
    private $username;
    private $password;
    private $dbName;
    private $port;



public function getConnection(){
    try{
        $this->host = $_ENV["DB_HOST"];
        $this->username = $_ENV["DB_USER"];
        $this->password = $_ENV["DB_PASSWORD"];
        $this->dbName = $_ENV["DB_NAME"];
        $this->port = $_ENV["DB_PORT"];
        $connection = new PDO("mysql:host=$this->host; port=$this->port; dbname=$this->dbName;", $this->username, $this->password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        return $connection;

    }catch(PDOException $e){
        echo $e;
    }
}

}

?>