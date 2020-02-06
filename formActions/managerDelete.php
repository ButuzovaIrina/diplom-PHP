<?php
include ("../autoload.php");
include ("../config/SystemConfig.php");

session_start();

$nameDelete = $_GET["idtext"];
$taskFile = file_get_contents("../database/tasks.json"); 
$taskList = json_decode($taskFile, TRUE); 
foreach ($taskList["dataArray"] as $key => $value) {  
    if ($key === $nameDelete) {
        unset($taskList["dataArray"][$key]);        
    }
}
file_put_contents("../database/tasks.json", json_encode($taskList));
header("Location: ../forms/mainForm.php");
