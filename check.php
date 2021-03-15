<?php
include "config.php";
include "function.php";
session_start();

#-------------------------login

if (isset($_POST['send'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        header("location:login.php?empty=10");
        exit();
    }

    $post_password=valid_input_post($_POST['password']);
    $post_username=valid_input_post($_POST['username']);
    $select_password_id_for_login=mysqli_query($connection,
        "SELECT `password`,`id` FROM `user` WHERE `user_name`='$post_username'");

    $password_id_fetch=mysqli_fetch_array($select_password_id_for_login);
    $password_check=password_verify($post_password,$password_id_fetch['password']);
    if($password_check) {
        $id_user=$password_id_fetch['id'];
        $_SESSION['id.'.$post_username]=$id_user;

        header("location:index.php?username=$post_username");
    }else{
        header("location:login.php?error=10");
        die();
    }



    /*   chera baiad fetch array estefade conim vagti iek dade darim
    if (mysqli_num_rows($select_password_for_login)==1){
      die();}*/


}










#--------------------------register



if (isset($_POST['send1'])) {

    if (empty($_POST['username'])) {
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

        $username_check = mysqli_query($connection,
            "SELECT `user_name` FROM `user` WHERE `user_name`='$post_username'");


            if (mysqli_num_rows($username_check) == 1) {
                header("location:register.php?tekrar=10");
                die();
            }
    }



    $insert_information = mysqli_query($connection,
        " INSERT INTO `user`(`id`, `user_name`, `email`, `password`) VALUES
        (NULL, '$post_username','$post_email', '$password_hash')");
    header("Refresh:2;login.php");
    exit("اطلاعات شما با موفقیت ثبت شد");


}

  /*
   * chera ba in raveshha nashod... va chera cotation ro ghabol nakard?
   *
        $insert_information=mysqli_query("insert into 'user'('id','user_name','email','password')
 values (null,'$post_username','$post_email','$post_password');");

       $a="INSERT INTO `user` (`id`, `user_name`, `email`, `password`) VALUES
        (NULL, $post_username,$post_email, $post_password)";
       $insert_information=mysqli_query($a);
    */





if (isset($_GET['exit'])) {
    $username_get_exit=$_GET['exit'];
    unset($_SESSION['id.'.$username_get_exit]);
    header("location:login.php");
    die();
}
//albate bayad az form va methode post estefade mishod

if (isset($_GET['delete'])) {
    $id_delete_user=$_GET['delete'];
    $delete_user = mysqli_query($connection,
        " DELETE FROM `user` WHERE `user`.`id` = $id_delete_user;");
    header("Refresh:2;login.php");
    exit("کاربر با موفقیت حذف شد");


}