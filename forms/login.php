<?php
    session_start(); 
    $messege = "";
    if (isset($_SESSION["messege"])) {
      $messege = $_SESSION["messege"];
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" type="text/css" href="/CSS/style.css"> 
</head>
<body>

<form action="../formActions/findUser.php" method="post" novalidate> 
  <div class="main-header">
    <a href="" class="logo">
        <span class="logo-lg"><b>Информационная система «Бюро переводов»</b></span>
    </a>   
  </div>
  <div class="form-container">
    <h2 class="form-header">Авторизация </h2>
    <?php echo "<label><p>" . $messege . "</p></label>";
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
    <button type="submit">Войти</button>
  </div>
</form> 

</body>
</html>