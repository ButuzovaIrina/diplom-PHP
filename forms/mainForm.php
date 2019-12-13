<?php
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1); 
include ("../autoload.php");
include ("../config/SystemConfig.php");
session_start();

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
    <div class="menu-header">
      <a class="back" href="../index.php">Назад</a>       
        <p>Привет,  <?=$_SESSION["firstName"];?></p>
    </div>
    <div class="menu-header"><?php if ($_SESSION["status"] === "translator") {
                                           echo "переводчик";
                                       } else {
                                           echo "менеджер";
                                        }?>
    </div>
    <div class="item"> 
      <ul class="menu">
        <li class="menu-header">
          Задания
        </li>
        <li class="menu-item menu-item_all">
          <a class="sidebar-action" href="#">
            <span>Все</span>
           </a>
        </li>
        <li class="menu-item menu-item_">
          <a class="sidebar-action" href="#">
            <span>На проверке</span>
          </a>
        </li>
        <li class="menu-item menu-item_">
          <a class="sidebar-action" href="#">
            <span>Отклонённые</span>
          </a>
        </li>
        <li class="menu-item menu-item_">
          <a class="sidebar-action" href="#">
            <span>Выполненные</span>   
          </a>
        </li>        
      </ul>
            <?php if ($_SESSION["status"] !== "translator") {
              echo '<a class='.'"new-task-btn"'.' href='.'"/forms/newTaskForm.php">';
              echo "Новое задание";
              echo '</a>';
              }?>
    </div>
  </section>
  <div class="content-wrapper">
    <div class="content">
       ролорлорлорлоор
    </div>
    <div class="content">
      додллолдлодл
    </div>
    <div class="content">
      орлолорорлор
    </div>
    <div class="content">
      роапрапрпр
    </div>
  </div>
</body>
</html>

