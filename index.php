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

$title = "Регистрация";
$content = "
<form method=\"POST\">
    <div>
        <label>Логин</label>
        <input type=\"text\" name=\"login\">
    </div>
    
    <div>
        <label>Пароль</label>
        <input type=\"password\" name=\"password\">
    </div>
    

    
    <div>
    <form action=\"http://kurs2/authorization.php\" method=\"post\">
        <button type=\"submit\">Регистрация</button>
        </form>
    </div>
    
</form>";


echo '
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">

   </form><br>
   <form action="http://kurs2/authorization.php" method="post" >
    <input class = "button_main"  type="submit" value = "Назад"/>
   </form>
    </div>';
    echo'
  </body>
  </html>';

require("rendering.php");
?>



