<?php
require("db.php");
if(!empty($_POST)){
  if($_POST['login'] != '' && $_POST['password'] != ''){
    $result = mysqli_query($mysql, "SELECT * FROM registr WHERE login =\"".$_POST['login']."\"");
    if(mysqli_num_rows($result) == 0){
        mysqli_query($mysql, "INSERT INTO registr (login, password, role) VALUES (\"".$_POST["login"]."\",\"".md5($_POST["password"])."\",\"2\" )");
      }
        $_SESSION["user"] = $_POST["login"];
    }
}



echo '
<div class = "div" style= "position: absolute; left: 40%;top:0%; width: 20%; height: 20%; ">
<h1>Вкусно кушать</h1>
</div>
<div class = "div" style= "position: absolute; left: 42%;top:7%; width: 20%; height: 20%; ">  
<header>
      <h2>Регистрация</h2>
  </header>
</div>


<div class= "div_aut" style="postion:absolute; left:35%; top: 30%; height: 35%;">
    <form method="post">
      <label>Придумайте Логин:</label><br><br>
      <input type="text" name="login"  class= "div_text1" /><br><br><br>
      <label>Придумайте Пароль:</label><br><br>
      <input type="password" name="password" class= "div_text1" /><br><br><br>
   <form action="authorization.php" method="post">
    <input class = "button_main"  type="submit" value = "Регистрация"/>
   </form>
 </form>

   <form action="authorization.php" method="post" >
    <input class = "button_main"  type="submit" value = "Назад"/>
    </form>
    </div>';
    echo'
  </body>
  </html>';
require("rendering.php");
?>
  <marquee  behavior="alternate" direction="left"  class = "div" style= "position: absolute; left: 35%;top:70%; width: 25%; height: 20%;" >
  <img src="img/logo.png" alt="альтернативный текст">
  </marquee>
  <?php



