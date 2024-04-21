<?php
namespace Database;

use PDO;

class DBCOnnection {
    
    private $dbname;
    private $host;
    private $username;
    private $password;
    public $pdo;

    public function __construct(string $dbname, string $host, string $username, string $password) 
    {
        $this->dbname   = $dbname;
        $this->host     = $host;
        $this->username = $username;
        $this->password = $password;
    }

    public function getPDO(): PDO
    {
        if($this->pdo === null){
            $this->pdo =  new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        }
        return $this->pdo;
    }
}