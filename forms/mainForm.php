<?php
include ("../autoload.php");
include ("../config/SystemConfig.php");
include ("../functions.php");

session_start();
if (!isset($_SESSION["login"])) {
  $_SESSION["messege"] = "Вы не вошли. Войдите или зарегистрируйтесь, пожалуйста." ;
  header("Location: ../index.php");
}


$i = 0;
$tasksAll = [];
//$tasksAll[$i]["language"] = [];
$tasks = [];
if (!isset($_GET["filter"])) {
  $_GET["filter"] = "all";
}
$taskFile = file_get_contents("../database/tasks.json"); 
$taskList = json_decode($taskFile, TRUE); 
foreach ($taskList["dataArray"] as $key => $value) { 
    if ($value["translator"] === $_SESSION["login"] || $value["manager"] === $_SESSION["login"]) {
        $tasksAll[$i]["idText"] = $key;     
        $tasksAll[$i]["userText"] = $value["userText"];
        $tasksAll[$i]["deadline"] = $value["deadline"];
        $tasksAll[$i]["languageToDo"] = $value["languageToDo"];          
        $tasksAll[$i]["status"] = $value["status"];
        $tasksAll[$i]["language"] = "";
        foreach ($tasksAll[$i]["languageToDo"] as $lang) {
            $tasksAll[$i]["language"] .= $lang . " ";
        }  
    $i++;    
    } 
} 
foreach ($tasksAll as $task) {
    if ($task["status"] === $_GET["filter"] || $_GET["filter"] === "all"){
        $tasks[$i] = $task;
        $i++;
    }
}
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
      <a class="back" href="../index.php">Выход</a>       
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
          <a class="sidebar-action" href="../forms/mainForm.php?filter=all">
            <span>Все</span>
           </a>
        </li>
        <li class="menu-item menu-item_">
          <a class="sidebar-action" href="../forms/mainForm.php?filter=new">
            <span>Новые</span>
          </a>
        </li>
        <li class="menu-item menu-item_">
          <a class="sidebar-action" href="../forms/mainForm.php?filter=checking">
            <span>На проверке</span>
          </a>
        </li>
        <li class="menu-item menu-item_">
          <a class="sidebar-action" href="../forms/mainForm.php?filter=rejected">
            <span>Отклонённые</span>
          </a>
        </li>
        <li class="menu-item menu-item_">
          <a class="sidebar-action" href="../forms/mainForm.php?filter=done">
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
    <?php if ($_SESSION["status"] === "translator") {
              foreach ($tasks as $key => $value) {  
                  $idText = $value["idText"];
                  echo '<div class=' . '"content"'. ">" .
                          '<div class=' . '"content-head"'. ">" .
                            "<p class=" . '"date"' . ">Срок выполнения перевода: " . 
                              date("d.m.Y", strtotime($value["deadline"])) . "</p>" .
                            "<p class=" . '"status"' . ">Статус: " . 
                            status($value["status"]) . "</p>" .  
                          '</div>'.
                            '<textarea>' . $value["userText"]. '
                            </textarea>
                            <p class =' . '"language">'. "Языки: " . $value["language"] . 
                            '</p>
                            <a class='.'"edit"'.' href=' . '"../forms/editTextForm.php?idtext=' . $idText . '">
                              Редактировать</a>
                        </div>';
              }
          } else {
              foreach ($tasks as $key => $value) { 
                  $idText = $value["idText"]; 
                  echo '<div class=' . '"content"'. ">" .
                          '<div class=' . '"content-head"'. ">" .
                            "<p class=" . '"date"' . ">Срок выполнения перевода: " . 
                            date("d.m.Y", strtotime($value["deadline"])) . "</p>" .
                            "<p class=" . '"status"' . ">Статус: " . 
                              status($value["status"]) . "</p>" .
                          '</div>'.
                        '<textarea>' . $value["userText"] .'
                        </textarea>
                        <p class =' . '"language">'. "Языки: " . $value["language"] . 
                        '</p>';
                        if ($value["status"] === "checking"){
                          echo '<a class='.'"check"'.' href=' . '"../forms/managerEditForm.php?idtext=' . $idText . '"  
                          >Проверить</a>';
                      }
            
                      echo '<a class='.'"edit"'.' href=' . '"../forms/editTaskForm.php?idtext=' . $idText . '">Редактировать</a>'.
                        '<a class='.'"delete"'.' href=' . '"../formActions/managerDelete.php?idtext=' . $idText . '">Удалить</a>'.
                        
                       '</div>';
              }

          }
    ?>
    
  </div>
</body>
</html>

