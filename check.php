<?php

include "config1.php";


if (isset($_GET['exit'])) {
    $username_exit=$_GET['exit'];
    
    $db=new data_connection();
    $sql= "UPDATE `user` SET `activ` = b'0' WHERE `user`.`user_name` = ?";
    $result = $db->connection->prepare($sql);
    $result->execute([$username_exit]);
    unset($_SESSION['user'.$username_exit]);
    header("location:login/login.php");
    die();
}



   

if (isset($_GET['delete'])) {
    
wq
:q
:wq
wq:
:wq
    $id_delete=$_GET['delete'];
    $delete=new data_connection();
    $delete->deleted($id_delete);

}
