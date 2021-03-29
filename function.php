<?php
include_once 'config1.php';

function valid_input_post($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

function exist_in_db($user,$email) {
        $db=new data_connection;
        $sql="SELECT `user_name` FROM `user` WHERE `user_name`=? or `email`=?";
        $result=$db->connection->prepare($sql);
        $result->execute([$user,$email]);
        $count=$result->rowcount();
      if ($count>0){
         header("location:register/register.php?tekrar=10");
         die();
    
    }
}

      
           