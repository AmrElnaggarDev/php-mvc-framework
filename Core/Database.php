<?php 

namespace Core;

use PDO;


// conect to our MYSQL 
class Database {

    public $connection ;
    public $statement;
    
    public function __construct($config, $username = 'root', $password = '')
    {


        // this functions Returns a URL-encoded string
        $dsn = "mysql:" . http_build_query($config, '', ';');// "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4 

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);  // this array is to set the mode of the FETCH to be FETCH_ASSOC 
    }

    public function query ($query, $params = []){
        

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }
    
    public function find (){
        return $this->statement->fetch();
    }
    public function get (){
        return $this->statement->fetchAll();
    }

    public function findOrFail () {
        $result = $this->find();

        if (!$result){
            abort();
        }

        return $result;
    }
}