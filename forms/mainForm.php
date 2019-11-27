<?php
include ("../autoload.php");
include ("../config/SystemConfig.php");


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информационная система «Бюро переводов»</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css"> 
 
</head>

<body>
    <div class="main-header">
        <a href="" class="logo">
            <span class="logo-lg"><b>Информационная система «Бюро переводов»</b></span>
        </a>   
    </div>  
    <section class="sidebar">
        <div class="menu-header"> 12345 </div>
        <div class="menu-header">менеджер </div>
        <div class="item"> 
            <ul class="menu">
                <li class="menu-header">
                    Задания
                </li>
                <li class="menu-item menu-item_all">
                    <a href="#">
                        <span>Все</span>
                    </a>
                </li>
                <li class="menu-item menu-item_">
                    <a href="#">
                        <span>На проверке</span>
                    </a>
                </li>
                <li class="menu-item menu-item_">
                    <a href="#">
                       <span>Отклонённые</span>
                </a>
                </li>
                <li class="menu-item menu-item_">
                    <a href="#">
                        <span>Выполненные</span>
                    </a>
                </li>        
            </ul>
            <button type="submit">Новое задание</button>
        </div>
    </section>
    <div class="content-wrapper">
            <div class="content">
            </div>
            <div class="content">
            </div>
            <div class="content">
            </div>
            <div class="content">
            </div>
        </div>
</body>
</html>

