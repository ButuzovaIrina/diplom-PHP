<?php
ini_set('error_reporting', E_ALL); ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);

include "autoload.php";
include "config/SystemConfig.php";
/*include"form.html";
$messege = "";
$loginMatch = preg_match("/\W+/", $_POST["login"]);
$mailMatch = preg_match("/[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}/", $_POST["email"]);
$codeMatch = "aaa";

if ($loginMatch === 1){
    $messege = $messege . "В логине не могут содержаться спецсимволы @/*?,;: <br>";
} 
if (strlen($_POST["password"]) < 8) {
    $messege = $messege . "Пароль должен быть меньше 8 символов. <br> "; 
}

if ( $mailMatch !== 1) {
    $messege =  $messege . "Адрес почты должен быть в формате почта@домен.доменнаязона .<br>";
}

if (strlen($_POST["firstName"]) === 0 ) {
    $messege =  $messege . ("Поле 'Имя' не может быть пустым!   <br>");
}
if (strlen($_POST["lastName"])  === 0) {
    $messege =  $messege . ("Полe 'Фамилия' не может быть пустым! <br>");
}
 
if (strlen($_POST["middleName"])  === 0) {
    $messege =  $messege . ("Поле 'Отчество' не может быть пустым!   <br>");
}

$trimmed = trim($_POST["code"]);
if (strlen($_POST["code"]) === 0) {
    $messege =  $messege . ("Поле 'Кодовое слово' не может быть пустым!   <br>");
} elseif (strtolower($trimmed) !== $codeMatch) {
    $messege = $messege . "Неверное кодовое слово!";
}

if ($messege === ""){
   $messege = "Регистрация прошла успешно!";
} 
echo $messege;*/
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информационная система «Бюро переводов»</title>
    <link rel="stylesheet" type="text/css" href="./CSS/style.css"> 
 
</head>

<body>
    <div class="main-header">
        <a href="" class="logo">
             <span class="logo-lg"><b>Информационная система «Бюро переводов»</b></span>
        </a>   
    </div>  
    <section class="sidebar">
    <ul class="menu">
        <li class="menu-header">
            Авторизация
        </li>
        <li class="menu-item menu-item_login">
            <a href="/forms/login.php">
                <span>Вход</span>
            </a>
        </li>
        <li class="menu-item menu-item_register">
            <a href="/forms/register.php">
                <span>Регистрация</span>
            </a>
        </li>
                   <!-- <li class="menu-item menu-item_logout">
                        <a href="#">
                            <span>Выйти</span>
                        </a>
                    </li>-->
    </ul>
               
    </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                   
                </h1>
            </section>
            <section class="content">
            </section>
        </div>
    </div>
</body>
</html>
