<?php
include "autoload.php";
include "config/SystemConfig.php";
$messege = null;
session_start(); 
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
      <?php if (isset($_SESSION["messege"])) {
        echo "<li class=" . '"menu-header"' . ">" . $_SESSION["messege"] ."</li>";
        $_SESSION["messege"] = "";
      }
      ?>
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
          <a class="sidebar-action" href="/logout.php">
            <span>Выйти</span>
          </a>
        </li>
      </ul>              
    </section>
        
       
  </div>
</body>
</html>
