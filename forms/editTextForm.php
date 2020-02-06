<?php
include ("../autoload.php");
include ("../config/SystemConfig.php");
include ("../functions.php");
session_start();
if (!isset($_SESSION["login"])) {
  $_SESSION["messege"] = "Вы не вошли. Войдите или зарегистрируйтесь, пожалуйста." ;
  header("Location: ../index.php");
}
$taskFile = file_get_contents("../database/tasks.json"); 
$taskList = json_decode($taskFile, TRUE); 
$language = "";
$editTask = [];
$idText = $_GET["idtext"];
$_POST["idtext"] = $idText;
foreach ($taskList ["dataArray"] as  $key => $value) {
    if ($key === $idText) {
        $editTask = $value; 
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
      <p>Привет, <?=$_SESSION["firstName"];?></p>
    </div>
      <div class="menu-header"><?php if ($_SESSION["status"] === "translator") {
                                         echo "переводчик";
                                       } else {
                                         echo "менеджер";
                                        }?>
      </div>
  </section>
  <div class="content-wrapper">
    <div class="content">
      <a class="back task" href="/forms/mainForm.php">Назад</a>
      <form action="../formActions/editText.php" method="POST" class="new-task-form">
        <div class="content-head">
          <p class="date">Срок выполнения перевода: 
              <?php echo " " . date("d.m.Y", strtotime($editTask["deadline"])); ?> 
            </p>
            <p class="status">Статус: 
              <?php echo " " . status($editTask["status"]); ?>
            </p>
          </div>
          <p class="date">Исходный текст</p>
          <textarea><?php echo $editTask["userText"];?></textarea>
          
          <?php foreach ($editTask["languageToDo"] as $lang) {
                    if (!isset($editTask["translatedText"][$lang])){
                        $editTask["translatedText"][$lang] = "";
                    }
                    $doneText = $editTask["translatedText"][$lang];
                    echo "<div class=" . '"content-head"' .">
                    <p class=" . '"date"' . ">Перевод</p>
                    <p class=". '"language"' . ">Язык: " . $lang . "</p> 
                    </div>  
                    <textarea name=" . '"text' . $lang . '">' . $doneText . "</textarea>";
                } 
          ?> 
          <input name="id" value=<?=$idText?>>
          <button class="edit-text" type="submit" name="btn" value="check">Отправить на проверку</button>
          <button class="edit-text" type="submit" name="btn" value="save">Сохранить</button>      
      </div>  
      
      </form>
    </div>
  </div>
</body>
</html>