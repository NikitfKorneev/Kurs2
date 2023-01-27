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
  <header>
  <h1>Админ панель</h1>
  </header>';
    ?>
    <form method="post">
    <label>Введите id комментария</label><br>
    <input type="text" name="id_zav" /><br>
    <label>Введите измененый коментарий</label><br>
    <input type="text" name="text" /><br><br> 
    <input class = "button_main"  type="submit" value = "Изменить комментарий"/><br>
      </form><br> 
      <form action="authorization.php" method="post" >
        <input class = "button_main"  type="submit" value = "Назад"/> 
        </form><br>
    <?php
?>
<div class = "map" style= "position:fixed; left:64.5%; top: 0%; height: 35%;">
<iframe src="https://www.google.com/maps/d/embed?mid=16Afm8x0mUAAXqpJRTWBN5aA1z3COXpY&ehbc=2E312F" width="640" height="480"></iframe>    
</div>
<?php

  $out = mysqli_query($mysql, "SELECT * FROM Com JOIN registr ON Com.id_user = registr.id ORDER BY 'id'");
  while($outs = mysqli_fetch_assoc($out)){
      ?>
      <div class ="comments" style= " left:0%; top: 10%; height: 35%;" >
      <div>Номер комментария <?= $outs['id_com']?></div><br>
      <div>Автор <?= $outs['login']?></div><br>
      <div>Тема <?= $outs['id_zav']?></div><br>
      <div>Отзыв <?= $outs['text']?></div><br>        
      </div><br>
      <?php
      }     
      if ($_POST != Null){
        $result4 = mysqli_query($mysql, "UPDATE Com SET text = \"".$_POST['text']."\" WHERE id_com = \"".$_POST['id_zav']."\";");
        }

 ?>