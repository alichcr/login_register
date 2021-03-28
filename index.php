<?php
include "function.php";
session_start();
$username=$_GET['username'];
if (isset ($_SESSION['user'.$username])){

   $id_user=$_SESSION['user'.$username];
   var_dump($id_user);

}else{
    header("location:register.php");
    die();
}?>
<!DOCTYPE html>
<html>
<body>
<ul>
    <li><a href="<?php echo "check.php?exit=$username"; ?>">خروج</a></li>
    <li><a href="<?php echo "check.php?delete=$id_user"?>" > حدف کاربر </a></li>
</ul>
</body>
</html>