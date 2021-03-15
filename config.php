<?php
//$connection=mysqli_connect("localhost","root","","users");

class DB{
    private $servername='localhost';
    private $dbname='users';
    private $dbusername='root';
    private $dbpassword='';
    public $connection;
            function __construct() {
            try {
                $this->connection=new PDO("mysql:host=$this->servername;dbname=$this->dbname",
                $this->dbusername, $this->dbpassword);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->exec('SET NAMES "utf8"');
                return $this->connection;

                
                
            } catch (PDOException $e) {
                echo 'error in connection:'.$e->getMessage();
                exit();
 
        }
    }
}

