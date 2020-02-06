<?php
include ("../autoload.php");
include ("../config/SystemConfig.php");

session_start();
$taskFile = file_get_contents("../database/tasks.json"); 
$taskList = json_decode($taskFile, TRUE); 
if ($_POST["btn"] === "check") {//меняем статус 
    $taskList["dataArray"][ $_POST["id"]]["status"] = "checking";   
}
foreach ($taskList["dataArray"][ $_POST["id"]]["languageToDo"] as $key => $value) {
    $postName = "text" . $value;
    $taskList["dataArray"][ $_POST["id"]]["translatedText"][$value]  = $_POST[$postName];
}

file_put_contents("../database/tasks.json", json_encode($taskList));
header("Location: ../forms/mainForm.php");