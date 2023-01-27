<?php
    include "db.php";
echo '
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Вкусно кушать</title>
      <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
      <link rel="manifest" href="site.webmanifest">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  </head>
  <body>
  <div class = "div" style= "position: absolute; left: 40%;top:0%; width: 20%; height: 20%; ">
  <header>
      <h1> Авторизация</h1>
      </header>
  </div>';









 echo'
    <div class= "div_aut" style="postion:absolute; left:35%; top: 30%; height: 35%;">
    <form action="authorization.php" method="post">
      <label>Логин:</label><br>
      <input type="text" name="login" /><br>
      <label>Пароль:</label><br>
      <input type="password" name="password" /><br><br>
      <input class = "button_main"  type="submit" value = " Отправить  "/>
   </form><br>
   <form action="registration.php" method="post">
    <input class = "button_main"  type="submit" value = "Регистрация"/>
 </form>
    </div>';
    echo'
  </body>
  </html>';





  ?>
  <marquee  behavior="alternate" direction="left">
  <img src="img/logo.png" alt="альтернативный текст">
  </marquee>
  <?php

 $login = $_POST['login'];
 $password = md5($_POST['password']);
 $result = mysqli_query($mysql, "SELECT id FROM `registr` WHERE login ='$login' AND password = '$password'");
        if($login = mysqli_fetch_assoc($result)){
?>

<?php  $login['id'];
    $id = $login['id'];?>
<?php
Header("Location:main.php?id=$id");
?>
<?php
}
 ?>