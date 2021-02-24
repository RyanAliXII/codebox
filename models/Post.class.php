<?php
require_once('../vendor/autoload.php');

use Ramsey\Uuid\Uuid;

class Post{

    private string $id;
    private string $title;
    private string $description;
    private string $name;
    private string $date;
    private string $body;
    private $connection;
    public function __construct(
     
        string $title,
        string $description,
        string $name,
        string $body,
        string $date
    ){
        $this->id =  Uuid::uuid4();
        $this->title = $title;
        $this->description = $description;
        $this->name = $name;
        $this->body = $body;
        $this->date = $date;
    }
    public function setConnection($connection){
        $this->connection = $connection;
    }
    public function getId(){
        return $this->id;
    }
    public function save(){

        try{
        $statement = $this->connection->prepare("INSERT INTO posts(id,title,description,body,name,date)
        VALUES(:id,:title,:description,:body,:name,:mydate)");

        $statement->bindParam(':id',$this->id);
        $statement->bindParam(':title',$this->title);
        $statement->bindParam(':description', $this->description);
        $statement->bindParam(':body',$this->body);
        $statement->bindParam(':name',$this->name);
        $statement->bindParam(':mydate',$this->date);
        $statement->execute();
        }
        catch(PDOexception $error){
            echo $error;
        }
    }
    public function findById($id){
            try{

                $statement = $this->connection->prepare("SELECT  * from posts WHERE id = :id LIMIT 1");
                $statement->bindParam(':id',$id);
                $statement->execute();
                $result = $statement->fetch();

                return $result;

            }catch(PDOException $error){
                echo $error;
            }

            return "";

    }
}

?>