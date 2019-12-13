<?php
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1); 
include ("../autoload.php");
include ("../config/SystemConfig.php");

$users = file_get_contents("../database/users.json"); 
$usersList = json_decode($users, TRUE);  
$authLogin = $_POST["login"];  
$authPass = $_POST["password"];
$user = false;
foreach ($usersList["dataArray"] as $value) { 
    if (array_search($authLogin, $value) === "login")  {  
        if ($value["password"] !== $authPass) {
            $messege = "Неверный пароль! Попробуйте ещё раз!";
            header("Location: ../forms/login.php");
        } else {
            $user = $value;
            session_start();    
            $_SESSION["login"] = $user["login"];
            $_SESSION["firstName"] = $user["firstName"];
            $_SESSION["middleName"] = $user["middleName"];
            $_SESSION["lastName"] = $user["lastName"];
            $_SESSION["status"] = $user["status"];
        }
        break;
    } 
}  
if ($user === false) {
    $messege = "Такого пользователя нет. Зарегистрируйтесь!";
    header("Location: ../forms/register.php");
} else {
    header("HTTP/1.1 200 OK");
    header("Location: ../forms/mainForm.php");
}

 
