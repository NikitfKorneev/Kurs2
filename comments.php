<?php
require("db.php");

$id = $_GET['id'];
$sql = "SELECT * FROM `registr` WHERE id = '$id'";
$result_login_name = mysqli_query($mysql, "SELECT login FROM `registr` WHERE id='$id'");



echo'
<div class = "div_history" style= "position: absolute; left: 8%;top:30%; width: 80%; height: 20%; ">
    <p>Вы авторизовались под логином: ';  
    foreach ($result_login_name as $row) { //id_user, first_name, second_name, surname, role, login, password`
        echo '<td>' . $row["login"] . '</td>';
    }
    echo'
</div>
';
?>