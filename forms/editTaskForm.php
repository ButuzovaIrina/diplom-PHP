<?php
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
include ("../autoload.php");
include ("../config/SystemConfig.php");
session_start();
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
$taskFile = file_get_contents("../database/tasks.json"); 
$taskList = json_decode($taskFile, TRUE); 
$language = "";
$editTask = [];
$idText = $_GET["idtext"];

foreach ($taskList ["dataArray"] as  $key => $value) {
    if ($key === $idText) {
        $editTask = $value; 
    }
}
if ($editTask["status"] === "new") {
    $status = "новое";
} elseif ($editTask["status"] === "checking") {
    $status = "на проверке";
} elseif ($editTask["status"] === "rejected") {
    $status = "отклоненно";
} elseif ($editTask["status"] === "done") {
    $status = "выполнено";
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
      <form action="../formActions/editTask.php" method="POST" class="new-task-form">
      <div class="form-row">
        <label>
          <span>Переводчик:</span>    
          <select name="translator"      
            <?php echo "option value=" . '"' . $editTask["translator"] . '"' . "></option>";
                foreach ($translators as $key => $value) {
                    echo '<option value="'. $value["login"].'">'.$value["name"].'</option>';    
                }
            ?>
          </select>
        </label>
        <label>
          <span>Клиент:</span> 
          <select name="customer"
            <?php echo "option value=" . '"' . $editTask["customer"] . '"' . "></option>";
                  foreach ($customerList as $key => $value) {
                       echo '<option value="'. $key.'">'.$value.'</option>';    
                  }
              ?>
          </select>
        </label>
      </div>

      <div class="form-row">
        <label>
        <span>Язык оригинала:</span>
        <select name="language-origin" disabled>
          <?php echo "<option value=" . '"' . $editTask["languageOrigin"] . "></option>";
                foreach ($languageList as $key => $value) {
                    if ($value["id"] === $editTask["languageOrigin"]){
                        echo '<option value="'. $value["id"].'">'.$value["name"].'</option>'; 
                    }   
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
        <?php
            foreach ($languageList as $key => $value) {
                $mark = "";
                if (in_array($value["id"], $editTask["languageToDo"])) { 
                    $mark = "checked";
                }
                echo '<label><input type="checkbox" 
                            name="language-to-do[]" 
                            value="'. $value["id"].'" 
                            ' . $mark . '>'.$value["name"] . "</label>";    
               }
          ?>
        
        </label>
      </div>
      <div class="form-row">
        <label>
            <?php echo '<textarea name="text" >' . $editTask["userText"] . "</textarea>";
          ?>
        </label>
      </div>     
        
      <div class="form-row">
        <div class="form-column">
          <label>
            <span>Срок выполнения задания</span>
            <input type="date" name="deadline" value=<?php echo $editTask["deadline"];?>>
          </label>
          <label>
          <?php
              $mark = "";
              if ($editTask["status"] === "done") { $mark = "checked";}
              echo '<input type="checkbox" name="status" value="done" ' . $mark . '>';          
           ?>
          <span>Выполнено</span>
          <?php
              $mark = "";
              if ($editTask["status"] === "rejected") { $mark = "checked";}
              echo '<input type="checkbox" name="status" value="rejected" ' . $mark . '>';          
           ?>
          <span>Отклонено</span>  
          </label>
          <input name="id" value=<?=$idText?>>
          <button type="submit">Сохранить</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</body>
</html>