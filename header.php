<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <title>Логин Цецо</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jscode.js"></script>   
</head>
<body>
    <header>
        <div>
            <?php
            require 'includes/navbar.inc.php';
            require 'includes/config.inc.php';
            
              if(isset($_SESSION['userId'])):?>
                  <p>Вие сте логнат в системата!</p>
                  <form action="includes/logout.inc.php" method = "POST">
                  <button type="submit" name="logout-submit" class= "btn btn-primary" >Изход</button>              
        <?php else: ?>                  
                  <form action="includes/login.inc.php" method = "POST"  onSubmit="return validateForm();">
                  <input id="name" type="text" name="mailuid" placeholder="Потр. име / Email...">
                  <input id="pass" type="password" name="pwd" placeholder="Парола:" >
                  <button type="submit" name="login-submit" class= "btn btn-primary">Впиши ме</button>
                  </form>
                  <a href="signup.php">Регистрация</a>

        <?php endif; ?>
        </div>
    </header>
