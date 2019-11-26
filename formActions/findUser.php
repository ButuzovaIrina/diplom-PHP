<?php
include ("../autoload.php");
include ("../config/SystemConfig.php");
header("HTTP/1.1 200 OK");
header("Location: ../forms/mainForm.php");
$users = file_get_contents('..database/users.json'); 
$taskList=json_decode($users,TRUE);   
print_r($taskList)  ;         
    foreach ($taskList as $key => $value) { 
  
echo ($key);
}


/*
$newUser = new User;
$newUser->login = $_POST["login"];
$newUser->password = $_POST["password"];
$newUser->lastName = $_POST["lastName"];
$newUser->firstName = $_POST["firstName"];
$newUser->middleName = $_POST["middleName"];
$newUser->email = $_POST["email"];
$newUser->phone = $_POST["phone"];
$newUser->code = $_POST["code"];
$newUser->status = $_POST["status"];
*/

?>