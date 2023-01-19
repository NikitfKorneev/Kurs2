<!doctype html>
<html>
    <head>
        <title><?=$title?></title>
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="style.css"></link>
    </head>
    
    <body>
        <div id="container">
            <div id="left">
            </div>
            <div id="right">
                <h1><?=$title?></h1>
                <?=$content;?>
                <?=$content1;?>
                <?=$content2;?>
                <?=$content5;?>
            </div>
            <?php
            
            if($roles == '1'){
            ?>
            <div id="right">
            <?=$content6;?>
            </div>
            <?php
            }else
            echo'Вам нужна роль админа для редактирования комментариев';
           
            ?>
    </body>
</html>