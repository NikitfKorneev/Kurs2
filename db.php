<?php
    //--------------------------Настройки подключения к БД-----------------------
    define('DB_HOST', 'localhost'); //Адрес
    define('DB_USER', 'root'); //Имя пользователя
    define('DB_PASSWORD', ''); //Пароль
    define('DB_NAME', 'Kurs2'); //Имя БД
    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>