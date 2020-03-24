<?php
/**
 * обработка результатов выполнения формы входа в систему
 * проверка логина и пароля
 */
include ("../autoload.php");
include ("../config/SystemConfig.php");

$users = file_get_contents("../database/users.json"); 
$usersList = json_decode($users, TRUE);  
$authLogin = $_POST["login"];  
$authPass = $_POST["password"];
$user = false;
$messege = "";
foreach ($usersList["dataArray"] as $value) { 
    if (array_search($authLogin, $value) === "login")  {  
        if ($value["password"] === $authPass) {
            $user = $value;
            session_start();    
            $_SESSION["login"] = $user["login"];
            $_SESSION["firstName"] = $user["firstName"];
            $_SESSION["middleName"] = $user["middleName"];
            $_SESSION["lastName"] = $user["lastName"];
            $_SESSION["status"] = $user["status"];
            $_SESSION["messege"] = $messege;
        } else {           
            $user = 1;
            $messege = "Неверный пароль! Попробуйте ещё раз!";    
        }
     } 
}  
if ($user === false) {
    $messege = "Пользователя <font color='red'>$authLogin</font> нет. Зарегистрируйтесь, пожалуйста!";
    session_start();
    $_SESSION["messege"] = $messege;
    header("Location: ../forms/register.php");

} elseif ($user === 1) {    
    session_start();   
    $_SESSION["messege"] = $messege;  
    header("Location: ../forms/login.php");          
} else {
    header("HTTP/1.1 200 OK");
    header("Location: ../forms/mainForm.php?filter=all");
}


