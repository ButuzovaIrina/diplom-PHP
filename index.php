<?php
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1); 

include "autoload.php";
include "config/SystemConfig.php";
$messege = null;
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
            <a class="sidebar-action" href="/forms/login.php">
                <span>Вход</span>
            </a>
        </li>
        <li class="menu-item menu-item_register">
            <a class="sidebar-action" href="/forms/register.php">
                <span>Регистрация</span>
            </a>
        </li>
        <li class="menu-item menu-item_logout">
            <a class="sidebar-action" href="#">
                <span>Выйти</span>
            </a>
        </li>
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
