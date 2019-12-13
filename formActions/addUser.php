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
$newUser->status = $_POST["status"];

$newUser->addUserFromForm();
session_start();
    $_SESSION["login"] = $newUser->login;
    $_SESSION["name"] = $newUser->firstName;
    $_SESSION["status"] = $newUser->status;

header("HTTP/1.1 200 OK");
header("Location: ../forms/mainForm.php");
