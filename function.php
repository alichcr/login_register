<?php
include "config.php";


function valid_input_post($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

function count_online_users(){
    $session=$_SESSION;
    echo count($session)."= تعداد افراد آنلاین";
    echo "</br>";
}



function id_users(){

    $session=$_SESSION;
    foreach ($session as $k=>$v) {
        if (substr($k, 0, 3) == 'id.') {
            echo  "کاربر فعال با id= " . $v . "</br>";

        }

    }
}










