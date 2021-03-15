<html>
<head>
    <meta charset="UTF-8">
    <title>sabtename</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<p align="center">صفحه ثبت نام کاربر</p>

<div class="form_register">
    <div class="error1" >
          <?php if(isset($_GET['user'])){
               echo "<center>لطفا یک نام کاربری انتخاب کنید </center>";
             }
             if (isset($_GET['pass'])){
               echo "<center>تکرار رمز عبور اشتباه است</center>";
             }

             if (isset($_GET['long'])){
               echo "<center>حداقل تعداد کاراکتر نام کاربری و پسورد سه کارکتر </center>";
             }
              if (isset($_GET['tekrar'])){
                  echo "<center>کاربر با این نام کاربری وجود دارد </center>";
              }

?>
    </div>
    <div class="register">

        <form method="post" action="check.php" name="sabtenam">

            <label>نام کاربری</label><br>
            <input type="text" name="username" placeholder="username" pattern="[a-zA-Z0-9]+" ><br>

            <label>ایمیل</label><br>
            <input type="email" name="email"  placeholder="email"  ><br>

            <label>رمز عبور</label><br>
            <input type="password" name="password" placeholder="password"  required ><br>

            <label>تکرار رمز عبور</label><br>
            <input type="password" name="t_password"  placeholder="t_password" required ><br>

            <input type="submit" name="send1" value="ارسال اطلاعات">

        </form>
    </div>

</div>



</body>
</html>
