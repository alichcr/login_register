<?php

include "../config1.php";
include_once '../function.php';

if (isset($_POST['send'])) {
   
    if (empty($_POST['username']) || empty($_POST['password'])) {
        header("location:login.php?empty=10");
        exit();
    }
    $post_password = valid_input_post($_POST['password']);
    $post_username = valid_input_post($_POST['username']);
    $log=new data_connection;
    $log->login($post_username, $post_password);
}