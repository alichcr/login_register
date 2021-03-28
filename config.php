<?php
//$connection=mysqli_connect("localhost","root","","users");
include_once 'function.php';
class DBconnect{
    private $servername='localhost';
    private $dbname='users';
    private $dbusername='root';
    private $dbpassword='';
    public $connection;
          function __construct() {
                try {
                    $this->connection=new PDO("mysql:host=$this->servername;dbname=$this->dbname",
                    $this->dbusername, $this->dbpassword);
                    die('ok');
                    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    $this->connection->exec('SET NAMES "utf8"');
                    return $this->connection;
                    


                } catch (PDOException $e) {
                    echo 'error in connection:'.$e->getMessage();
                    exit();
             }
            }
            public function login($pass,$user){
               
              $post_password=valid_input_post($pass);
              $post_username=valid_input_post($user);
                    try {
                         $sql= "SELECT `password`,`id` FROM `user` WHERE `user_name`=?";
                         $result_for_login=$this->connection->prepare($sql);
                        // $result_for_login->bindValue();
                         $result_for_login->execute([$post_username]);
                    } catch (PDOException $ex) {
                         echo 'error in login:'.$ex->getMessage();
                    }
               $row_password_id=$result_for_login->fetch();
               $password_check=password_verify($post_password,$row_password_id['password']);
               if($password_check) {
                    $id_user=$row_password_id['id'];
                    $_SESSION['id.'.$post_username]=$id_user;

                    header("location:index.php?username=$post_username");
                }else{
                    header("location:login.php?error=10");
                    die();
                }
        }
     
        
        
}
$n=new DBconnect();



   

    
    
    

