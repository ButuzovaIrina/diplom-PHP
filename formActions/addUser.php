<?php
include ("../autoload.php");
include ("../config/SystemConfig.php");

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

$newUser->addUserFromForm();
$newUser->showUserForm();
//header("HTTP/1.1 200 OK");
//header("Location: http://" . $_SERVER["HTTP_HOST"] . "/2.2-OOP/2.2.2");
?>