<?php 
include ("../autoload.php");

/**
* возвращает статус задания на русском
*/

function status($status) {
    if ($status === "new") {
        return "новое";
    } elseif ($status === "checking") {
        return "на проверке";
    } elseif ($status === "rejected") {
        return "отклоненно";
    } elseif ($status === "done") {
        return "выполнено";
    }
}
