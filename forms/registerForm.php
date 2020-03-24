<?php
/**
 * форма для регистрации нового менеджера или переводчика
 */
//    session_start();  


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
    <?php   echo "<label><p>" . $_SESSION["messege"] . "</p></label>";
    $_SESSION["messege"] = "";
    ?>
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

</body>
</html>