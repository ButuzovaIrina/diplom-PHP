<?php
/**
 * выполнение формы редакторования задания менеджером
 * изменение статуса задания
 */
include ("../autoload.php");
include ("../config/SystemConfig.php");
//session_start();

$taskFile = file_get_contents("../database/tasks.json"); 
$taskList = json_decode($taskFile, TRUE); 
$taskList["dataArray"][ $_POST["id"]]["translator"] = $_POST["translator"];
$taskList["dataArray"][ $_POST["id"]]["customer"] = $_POST["customer"];
$taskList["dataArray"][ $_POST["id"]]["userText"] = $_POST["text"];
foreach ($_POST["language-to-do"] as $key => $value) { 
    $taskList["dataArray"][$_POST["id"]]["languageToDo"][$key] = $_POST["language-to-do"][$key];
}
if (isset($_POST["status"])) {
    if ($_POST["status"] === "done") {
        $taskList["dataArray"][ $_POST["id"]]["status"] = "done";       
    } elseif ($_POST["status"] === "rejected") {
        $taskList["dataArray"][ $_POST["id"]]["status"] = "rejected";     
    }
} else {
}
$taskList["dataArray"][ $_POST["id"]]["deadline"] = $_POST["deadline"];


file_put_contents("../database/tasks.json", json_encode($taskList));
header("Location: ../forms/mainForm.php");