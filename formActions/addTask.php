<?php
include ("../autoload.php");
include ("../config/SystemConfig.php");
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1); 
session_start();

$transTxt = [];
$i = 0;
foreach ($_POST["language-to-do"] as $key => $value) {
   $transTxt[$value] = "";
   $i++;
}

$newTask = new Task;

$newTask->status = "new";
$newTask->manager = $_SESSION["login"];
$newTask->translator = $_POST["translator"];
$newTask->customer = $_POST["customer"];
$newTask->languageOrigin = $_POST["language-origin"];
$newTask->languageToDo = $_POST["language-to-do"];
$newTask->userText = $_POST["text"];
$newTask->translatedText = $transTxt ; 
$newTask->deadline = $_POST["deadline"];

$newTask->addTaskFromForm();


header("HTTP/1.1 200 OK");
header("Location: ../forms/mainForm.php");
