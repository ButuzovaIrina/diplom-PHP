<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1); 
include ("../autoload.php");
include ("../config/SystemConfig.php");
session_start();
/*язык на руском*/
function language() {
    $language = file_get_contents("../database/language.json"); 
    $languageList = json_decode($language, TRUE); 
}