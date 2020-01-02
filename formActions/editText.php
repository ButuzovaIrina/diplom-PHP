<?php
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1); 
include ("../autoload.php");
include ("../config/SystemConfig.php");
session_start();
$oldname = $_POST["id"];
$taskFile = file_get_contents("../database/tasks.json"); 
$taskList = json_decode($taskFile, TRUE); 
if ($_POST["btn"] === "check") {//меняем статус 
    $taskList["dataArray"][ $_POST["id"]]["status"] = "checking";   
}
//print_r($taskList["dataArray"][ $_POST["id"]]["translatedText"]);
foreach ($taskList["dataArray"][ $_POST["id"]]["languageToDo"] as $key => $value) {
    $postName = "text" . $value;
    $taskList["dataArray"][ $_POST["id"]]["translatedText"][$value]  = $_POST[$postName];
}

file_put_contents("../database/tasks.json", json_encode($taskList));
header("Location: ../forms/mainForm.php");