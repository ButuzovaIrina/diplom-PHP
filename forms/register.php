<?php
$messege = "";
$loginMatch = preg_match("/\W+/", $_POST["login"]);
$mailMatch = preg_match("/[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}/", $_POST["email"]);
$codeMatch = "aaa";

if ($loginMatch === 1){
    $messege = $messege . "В логине не могут содержаться спецсимволы @/*?,;: <br>";
} 
if (strlen($_POST["password"]) < 8) {
    $messege = $messege . "Пароль должен быть меньше 8 символов. <br> "; 
}

if ( $mailMatch !== 1) {
    $messege =  $messege . "Адрес почты должен быть в формате почта@домен.доменнаязона .<br>";
}

if (strlen($_POST["firstName"]) === 0 ) {
    $messege =  $messege . ("Поле 'Имя' не может быть пустым!   <br>");
}
if (strlen($_POST["lastName"])  === 0) {
    $messege =  $messege . ("Полe 'Фамилия' не может быть пустым! <br>");
}
 
if (strlen($_POST["middleName"])  === 0) {
    $messege =  $messege . ("Поле 'Отчество' не может быть пустым!   <br>");
}

if ($messege === ""){
   $messege = "Регистрация прошла успешно!";
} 
/**/
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="/CSS/style.css"> 
</head>
<body>

<form action="../formActions/addUser.php" method="post" novalidate> 
  <div class="main-header">
    <a href="" class="logo">
        <span class="logo-lg"><b>Информационная система «Бюро переводов»</b></span>
    </a>   
  </div>
  <div class="form-container">
    <h2 class="form-header">Регистрация </h2>
    <label>
      <span>Логин:</span>
      <input type="text" name="login" placeholder="Логин">
    </label>
    <label>
      <span>Пароль:</span>
      <input type="password" name="password" placeholder="Пароль">
    </label>
    <label>  
      <span>Фамилия:</span>
      <input type="text" name="lastName" placeholder="Фамилия" required>
    </label>
    <label>
      <span>Имя:</span><input type="text" name="firstName" placeholder="Имя" required>  
    </label>
    <label>
      <span>Отчество:</span>
      <input type="text" name="middleName" placeholder="Отчество" required>
    </label>
    <label>
      <span>Почта:</span>
      <input type="email" name="email" placeholder="Почта">
    </label>
    <label>
      <span>Телефон:</span><input type="text" name="phone" placeholder="Телефон">  
    </label>
    <label>
      <input type="radio" name="status" value="manager" checked>
      <span>Менеджер</span>    
    </label>
    <label>
        <input type="radio" name="status" value="translator">
        <span>Переводчик</span>
    </label>
    <button type="submit">Зарегистрироваться</button>
  </div>
</form> 
<?php
  echo $messege;
?>

</body>
</html>