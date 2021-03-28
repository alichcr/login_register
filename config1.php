<?php

include_once 'function.php';
session_start();


class data_connection {

    public $connection;

    function __construct() {
        $servername = 'localhost';
        $dbname = 'users';
        $dbusername = 'root';
        $dbpassword = '';
        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->connection->exec('SET NAMES "utf8"');
        } catch (PDOException $e) {
            echo 'error in connection:' . $e->getMessage();
            exit();
        }
     }
    public function login($user,$pass){
        
        
       try { 
                
                $sql = "SELECT * FROM `user` WHERE `user_name`=?";
                $result_login = $this->connection->prepare($sql);
                $result_login->execute([$user]);
                $row = $result_login->fetch();
                $password_check = password_verify($pass, $row['password']);
            if ($password_check) {
                    $id_user = $row['id'];
                    $_SESSION['user' . $user] = $id_user;
                    header("location:index.php?username=$user");
            } else {
                    header("location:login.php?error=10");
                    die();
            }
            
       } catch (PDOException $ex) {
            echo 'error in login:' . $ex->getMessage();
       }

        
        
    }
}
