<?php
/**
 * обработка результатов формы редактирования задания менеджером
 */
include ("../autoload.php");
include ("../config/SystemConfig.php");
//session_start();

$taskFile = file_get_contents("../database/tasks.json"); 
$taskList = json_decode($taskFile, TRUE); 
if ($_POST["status"] === "done") {//меняем статус 
    $taskList["dataArray"][$_POST["id"]]["status"] = "done";       
} elseif ($_POST["status"] === "rejected") {
    $taskList["dataArray"][$_POST["id"]]["status"] = "rejected";  
}
foreach ($taskList["dataArray"][$_POST["id"]]["translatedText"] as $key => $value) {
    $postName = "text" . $key;
    $taskList["dataArray"][$_POST["id"]]["translatedText"][$key] = $_POST[$postName];
}

file_put_contents("../database/tasks.json", json_encode($taskList));
header("Location: ../forms/mainForm.php");