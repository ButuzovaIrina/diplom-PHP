<?php
include ("../autoload.php");
include ("../config/SystemConfig.php");
session_start();

if (!isset($_SESSION["login"])) {
  $_SESSION["messege"] = "Вы не вошли. Войдите или зарегистрируйтесь, пожалуйста." ;
  header("Location: ../index.php");
}

$language = file_get_contents("../database/language.json"); 
$languageList = json_decode($language, TRUE); 
$customer = file_get_contents("../database/customer.json");
$customerList = json_decode($customer, TRUE);
$users = file_get_contents("../database/users.json"); 
$usersList = json_decode($users, TRUE);
$userStatus = "translator";
$i = 0;
$translators = [];
foreach ($usersList["dataArray"] as $value) { 
  if (array_search($userStatus, $value) === "status")  {  
    $translators[$i]["name"] = $value["lastName"]." ".$value["firstName"]." ".$value["middleName"];
    $translators[$i]["login"] = $value["login"];
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
      <form action="../formActions/addTask.php" method="POST" class="new-task-form">
      <div class="form-row">
        <label>
          <span>Переводчик:</span>
          <select name="translator">
            <option value=" "></option>
            <?php
                foreach ($translators as $key => $value) {
                    echo '<option value="' . $value["login"] . '">' . $value["name"]. '</option>';    
                }
            ?>
          </select>
        </label>
        <label>
          <span>Клиент:</span> 
          <select name="customer">
            <option value=" "></option>
              <?php
                  foreach ($customerList as $key => $value) {
                       echo '<option value="' . $key . '">' . $value . '</option>';    
                  }
              ?>
          </select>
        </label>
      </div>

      <div class="form-row">
        <label>
        <span>Язык оригинала:</span>
        <select name="language-origin">
          <option value=" "></option>
            <?php
                foreach ($languageList as $key => $value) {
                    echo '<option value="' . $value["id"] .'">'.$value["name"] . '</option>';    
                }
            ?>
        </select>
        </label>
      </div>

      <div class="form-row">
        <label> 
        <span>Языки перевода:</span>
        </label>
        <label>  
        <select class="lang-select" multiple="multiple" name="language-to-do[]" size="3">
          <?php
              foreach ($languageList as $key => $value) {
                  echo '<option value="' . $value["id"].'">' . $value["name"] . '</option>';    
               }
          ?>
        </select>
        <p class="comment">
          <br />Чтобы выбрать несколько значений, 
          <br />используйте при кликах клавиши shift и ctrl.
        </p> 
        </label>
      </div>
      <div class="form-row">
        <label>
          <textarea name="text" placeholder="Исходный текст"></textarea>
        </label>
      </div>     
        
      <div class="form-row">
        <div class="form-column">
          <label>
            <span>Срок выполнения задания</span>
            <input type="date" name="deadline" required="">
          </label>
          <button type="submit">Сохранить</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</body>
</html>