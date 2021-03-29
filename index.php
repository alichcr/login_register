<?php
include "function.php";

$username=$_GET['username'];

  if (isset ($_SESSION['user'.$username])){
    
    $id_user=$_SESSION['user'.$username];
    
    $db=new data_connection();
    $sql= "UPDATE `user` SET `activ` = b'1' WHERE `user`.`id` = ?";
    $result = $db->connection->prepare($sql);
    $result->execute([$id_user]);
    
    $sqll="SELECT `id` FROM `user` WHERE `activ`=1";
    $active=$db->connection->query($sqll);
    $counter=0;
    while ($row1 = $active->Fetch()) {
      $counter++;  
     
    }   
    echo 'tedade karbran online= '.$counter."<br/>";
   
    echo "salam $username ba id=$id_user";
   
   
   
   
   
   
   
   
   

}else{
    header("location:register/register.php");
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