<?php
require("db.php");
if(!empty($_POST)){
    $result = mysqli_query($mysql, "SELECT * FROM registr WHERE login =\"".$_POST['login']."\"");
    if(mysqli_num_rows($result) == 0){
        mysqli_query($mysql, "INSERT INTO registr (login, password, role) VALUES (
            \"".$_POST["login"]."\",
            \"".md5($_POST["password"])."\",
            \"2\" 
            )"
        );
        $_SESSION["user"] = $_POST["login"];
    }
}

echo '
<div class= "div_aut" style="postion:absolute; left:35%; top: 20%; height: 35%;">
<p>Регистрация</p>
    <form method="post">
      <label>Придумайте Логин:</label><br>
      <input type="text" name="login" /><br>
      <label>Придумайте Пароль:</label><br>
      <input type="password" name="password" /><br><br>
   <form action="http://kurs2/authorization.php" method="post">
    <input class = "button_main"  type="submit" value = "Регистрация"/>
 </form>
 </form>
 <br>
   <form action="http://kurs2/authorization.php" method="post" >
    <input class = "button_main"  type="submit" value = "Назад"/>
    </form>
    </div>';
    echo'
  </body>
  </html>';
require("rendering.php");
?>



