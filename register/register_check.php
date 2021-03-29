<?php

include "../config1.php";
include_once '../function.php';


if (isset($_POST['send1'])) {

    if (empty($_POST['username'])||empty($_POST['email'])) {
        header("location:register.php?user=10");
        exit();
    }
    if ($_POST['password'] !== $_POST['t_password']) {
        header("location:register.php?pass=10");
        exit();
    }

    if (strlen($_POST['username']) < 3 && strlen($_POST['password']) < 3) {
        header("location:register.php?long=10");
        exit();
    } else {
        $post_username = valid_input_post($_POST['username']);
        $post_email = valid_input_post($_POST['email']);
        $post_password = valid_input_post($_POST['password']);
        $password_hash = password_hash($post_password, PASSWORD_BCRYPT);
        
        exist_in_db($post_username, $post_email);
        
        $insert=new data_connection();
        $insert->register($post_username, $post_email, $password_hash);

    }
    
}