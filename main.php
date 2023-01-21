<?php
include "db.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `registr` WHERE id = '$id'";
$result_login_name = mysqli_query($mysql, "SELECT login FROM `registr` WHERE id='$id'");
$result_role = mysqli_query($mysql, "SELECT role FROM `registr` WHERE id='$id'");
$Arr = mysqli_fetch_assoc($result_role);
$roles = $Arr['role'];
echo'
<div class = "div_history" style= "position: absolute; left: 3%;top:0%; width: 20%; height: 20%; ">
    <p>Вы зашли под логином ';  
    foreach ($result_login_name as $row) { 
        echo '<td>' . $row["login"] . '</td><br>';
    }
    if ($roles == '1'){
        echo'
        Ваша роль Админ';
    }
    echo'
</div>
';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>

<form action="authorization.php" method="post" style= "position: absolute; left: 3%;top:9%; width: 0%; height: 20%;" >
<input class = "button_main"  type="submit" value = "Выйти из аккаунта"/>
</form>
<?php



if ($roles == '1'){

?>
<form action="chenge.php" method="post" style= "position: absolute; left: 3%;top:14%; width: 0%; height: 20%;" >
    <input class = "button_main"  type="submit" value = "Изменить комментарии"/>
    </form>
<?php
}   




?>
<form action="authorization.php" method="post" style= "position: absolute; left: 83%;top:3%; width: 0%; height: 20%;" >
<object type="image/svg+xml" src="logo.svg" data="logo.svg" alt="альтернативный текст">
</object>
</form>


<body>
    <table class = "map" style= "position:absolute; left:23%; top: 30%; height: 5%;">
        <tr >
            <th>Название заведения</th>
            <th>Номер телефона</th>
            <th>Количество посадочных мест</th>
            <th>Адрес</th>
            <th>Район</th>
        </tr>
        <?php
        
        if ($roles == '4'){
        ?>
        <div class = "map" style= "postion:absolute; left:63.5%; top: 50%; height: 35%;">
        <iframe src="https://www.google.com/maps/d/embed?mid=16Afm8x0mUAAXqpJRTWBN5aA1z3COXpY&ehbc=2E312F" width="640" height="480"></iframe>    
        </div>
        <?php
        }
        
        if ($_POST != Null){
             $result3 = mysqli_query($mysql, "SELECT * FROM Com WHERE id_zav =\"".$_POST['Otz']."\" and text =\"".$_POST['Namezav']."\"");
                if(mysqli_num_rows($result3) == 0){
                $test = $_POST['Namezav'];
                $test1 = $_POST['Otz'];
                    mysqli_query($mysql, "INSERT INTO Com (id_com,id_user,text, id_zav) VALUES(Null, '$id', '$test','$test1')");
                }
            }




        //$out = mysqli_query($mysql, "SELECT * from registr join Com on registr.id = Com.id_user where Com.id_user = '$id'"); // вывод данных именно этого пользователя
        $out = mysqli_query($mysql, "SELECT * FROM Com JOIN registr ON Com.id_user = registr.id ORDER BY 'id'");// Полный вывод всего


        while($outs = mysqli_fetch_assoc($out)){
            ?>
            <div class = "comments" style=  "left:3%; top: 20%; height: 15%;"><br>
            <div >Автор <?= $outs['login']?></div><br>
            <div >Тема <?= $outs['id_zav']?></div><br>
            <div >Отзыв <?= $outs['text']?></div><br>        
            </div><br>  
          
            <?php
            }

    

   /*$content6 = "
        <div>
            <form method=\"POST\">
            <div>
                <label>Ввидите номер комментария</label>
                <input type=\"text\" name=\"Numcom\">
            </div>

            <div>
                <label>Измените комментарий </label>
                <input type=\"text\" name=\"Otzizm\">
            </div>
                <div>
                    <button type=\"submit\ name=\"my1\" \">Изменить комментарий </button>
                </div>
                
            </form>
            </div>";*/
                   
           




    /*$content2 = "
    <div>
        <form method=\"POST\">
            <div>
                <label>Отзыв</label>
                <input type=\"text\" name=\"Namezav\">
            </div>

            <div>
                <label>Текст</label>
                <input type=\"text\" name=\"Otz\">
            </div>

            <div>
                <button type=\"submit\ name=\"my\" \">Ввести</button>
            </div>
        
        </form>
        </div>";*/
        echo '
        <div class= "div_aut" style="postion:absolute; left:50%; top: 1%; height: 25%;">
        <p>Отзыв</p>
            <form method="post">
            <label>Введите тему</label><br>
            <input type="text" name="Otz" /><br>
            <label>Введите текст отзыва</label><br>
            <input type="text" name="Namezav" /><br><br>
            <input class = "button_main"  type="submit" value = "Ввести"/>
            </form>
        </div>';
        echo'
        </body>
        </html>';

















        /*$content1 = "
        <form method=\"POST\">
            <div>
                <label>Название заведения</label>
                <input type=\"text\" name=\"Nazvanie\">
            </div>
            <div>
                <label>Улица</label>
                <input type=\"text\" class=\"search\" name=\"search\">
            </div>
            <div>
                <label>Район</label>
                <input type=\"text\" name=\"Rayon\">
            </div>
            <div>
                <button type=\"submit\ \">Поиск</button>
            </div>
        </form>";*/

        echo '
        <div class= "div_aut" style="postion:absolute; left:23.5%; top: 1%; height: 25%;">
       
            <form method="post">
            <label>Название заведения</label><br>
            <input type="text" name="Nazvanie" /><br>
            <label>Улица </label><br>
            <input type="text" name="search" /><br>
            <label>Район </label><br>
            <input type="text" name="Rayon" /><br><br>
            <input class = "button_main"  type="submit" value = "Поиск"/>
            </form>
        </div>';
        echo'
        </body>
        </html>';

        require("rendering.php");
       




      
      
        
        if ( $_POST['Nazvanie'] <> NULL && $_POST ['Rayon'] <> NULL && $_POST['search'] ){
            $search = $_POST['search'];
            $search1 = $_POST['Nazvanie'];
            $search2 = $_POST['Rayon'];
            $products = mysqli_query($mysql, "SELECT * FROM Cafe as c WHERE c.District LIKE '%$search2%' and c.Name LIKE '%$search1%' and c.Address LIKE '%$search%'");    
        }else 
        if ( $_POST['Nazvanie'] == NULL && $_POST['search'] == NULL ){
            $search2 = $_POST['Rayon'];
            $products = mysqli_query($mysql, "SELECT * FROM Cafe as c WHERE c.District LIKE '%$search2%'");
        }else if($_POST['Rayon'] == NULL && $_POST['search'] == NULL ){
            $search1 = $_POST['Nazvanie'];
            $products = mysqli_query($mysql, "SELECT * FROM Cafe as c WHERE c.Name LIKE '%$search1%' ");
        }else if($_POST['Nazvanie'] == NULL && $_POST['Rayon'] == NULL){
            $search = $_POST['search'];
            $products = mysqli_query($mysql, "SELECT * FROM Cafe as c WHERE c.Address LIKE '%$search%' ");        
        }else if($_POST['Nazvanie'] == NULL){
            $search2 = $_POST['Rayon'];
            $search = $_POST['search'];
            $products = mysqli_query($mysql, "SELECT * FROM Cafe as c WHERE c.District LIKE '%$search2%' and c.Address LIKE '%$search%' ");
        }else if ($_POST['Rayon'] == NULL){
            $search1 = $_POST['Nazvanie'];
            $search = $_POST['search'];
            $products = mysqli_query($mysql, "SELECT * FROM Cafe as c WHERE c.Name LIKE '%$search1%' and c.Address LIKE '%$search%' ");
        }else if($_POST['search'] == NULL){
            $search1 = $_POST['Nazvanie'];
            $search2 = $_POST['Rayon'];
            $products = mysqli_query($mysql, "SELECT * FROM Cafe as c WHERE c.Name LIKE '%$search1%' and c.District LIKE '%$search2%'"); 
        }





















        
        
            $products = mysqli_fetch_all($products);
            foreach ($products as $product) {
                ?>
                
                    <tr>
                        <td><?= $product[1] ?></td>
                        <td><?= $product[9] ?></td>
                        <td><?= $product[10] ?></td>
                        <td><?= $product[8] ?></td>
                        <td><?= $product[7] ?></td>
                    </tr>
                <?php

            }
        ?>
    </table>
</body>
</html>







