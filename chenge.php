<?php
    include "db.php";
echo '
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>My App</title>
      <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
      <link rel="manifest" href="site.webmanifest">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  </head>
  <body>
    <header>
    </header>';
    ?>
    <form method="post">
    <input type="text" name="id_zav" /><br>
    <input type="text" name="text" /><br><br> 
    <input class = "button_main"  type="submit" value = "Изменить комментарий"/>
      </form>
      <form action="http://kurs2/authorization.php" method="post" >
        <input class = "button_main"  type="submit" value = "Назад"/>
        </form>
    <?php

  $out = mysqli_query($mysql, "SELECT * FROM Com JOIN registr ON Com.id_user = registr.id ORDER BY 'id'");// Полный вывод всего
  while($outs = mysqli_fetch_assoc($out)){
      ?>
      <div class ="comments" >
      <div>Автор <?= $outs['id_com']?></div><br>
      <div>Автор <?= $outs['login']?></div><br>
      <div>Тема <?= $outs['id_zav']?></div><br>
      <div>Отзыв <?= $outs['text']?></div><br>        
      </div>
      <?php
      }     
      if ($_POST != Null){
        $result4 = mysqli_query($mysql, "UPDATE Com SET text = \"".$_POST['text']."\" WHERE id_com = \"".$_POST['id_zav']."\";");
        }





/*?>
  <img src="img/logo.png" alt="альтернативный текст">
<?php*/

 ?>