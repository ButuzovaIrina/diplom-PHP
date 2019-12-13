<?php
include ("../autoload.php");
include ("../config/SystemConfig.php");
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1); 
session_start();
/* status  new новое   
  checking  на проверке
   rejected отклоненное
   done выполнено*/

$newTask = new Task;

$newTask->status = "new";
$newTask->customer = $_POST["customer"];
$newTask->languageOrigin = $_POST["language-origin"];
$newTask->languageToDo = $_POST["language-to-do"];
$newTask->userFile = $_POST["userfile"];
$newTask->taskName = $_POST["task-name"];
$newTask->deadline = $_POST["deadline"];

$newTask->addTaskFromForm();

//$uploaddir = "../";
if (isset($_FILES["userfile"]) && $_FILES["userfile"]["error"] != 4) {

    if ($_FILES["userfile"]["error"] != 1 && $_FILES["userfile"]["error"] != 0) {
        $error = $_FILES["userfile"]["error"];
        $errors []= "Ошибка: Файл не загружен." . " Код ошибки: " . $error;
    }
    else {
        $fileName = $_FILES["userfile"] ["tmp_name"];
            $tmp_name = $_FILES["userfile"]["tmp_name"];
            $name = basename($_FILES["userfile"]["name"]);
            move_uploaded_file($tmp_name, DATABASE_PATH."/texts/" . $name);       
          
        
    }
}
header("HTTP/1.1 200 OK");
header("Location: ../forms/mainForm.php");
