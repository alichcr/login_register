<html>
<head>
    <meta charset="UTF-8">
    <title>log in</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<p align="center"> صفحه ورود کاربر</p>

<div class="form">
    <div class="error">
<?php
        if(isset($_GET['empty'])){
        echo "<center>تمام فیلد ها باید  پر شود </center>";
        }elseif (isset($_GET['error'])){
        echo "<center> نام کاربری یا رمز عبور اشتباه است</center>";
        }
?>
    </div>
    <form action="login_check.php" method="post">
        <label> نام کاربری</label><br>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" placeholder="username"><br>
        <label> رمز عبور</label><br>
        <input type="password" name="password" placeholder="password"> <br>
        <input type="submit" name="send" value="ارسال">
    </form>
</div>
<p align="right"> لطفا برای ثبت نام <a href="register.php"> اینجا </a> کلیک کنید </p>
</body>
</html>


