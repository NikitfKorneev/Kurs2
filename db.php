<?php
    //--------------------------Настройки подключения к БД Локалка-----------------------
    define('DB_HOST', 'localhost'); //Адрес
    define('DB_USER', 'root'); //Имя пользователя
    define('DB_PASSWORD', ''); //Пароль
    define('DB_NAME', 'Kurs2'); //Имя БД
    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>

<?php
    //--------------------------Настройки подключения к БД Fit-----------------------
   /* define('DB_HOST', 'std-mysql'); //Адрес
    define('DB_USER', 'std_2003_kurs'); //Имя пользователя
    define('DB_PASSWORD', 'std_2003_kurs'); //Пароль
    define('DB_NAME', 'std_2003_kurs'); //Имя БД
    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);*/
?>