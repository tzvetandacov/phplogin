<?php
require "header.php";
?>


<main>
<h1>Регистрация</h1>
<?php 
    if(isset($_GET['error'])){
        if($_GET['error'] =="emptyfields"){
            echo '<p>Моля попълнете всички полета!</p>';
            }
        else if($_GET['error'] =="invalidmailuid"){
            echo '<p>Невалидни потребителско име и email!</p>';
            }
        else if($_GET['error'] =="invaliduid"){
            echo '<p>Невалидно потребителско име!</p>';
            }
        else if($_GET['error'] =="invalidmail"){
            echo '<p>Невалиден e-mail!</p>';
            }
        else if($_GET['error'] =="passwordcheck"){
            echo '<p>Двете пароли не съвпаднаха!</p>';
            }
        else if($_GET['error'] =="usertaken"){
            echo '<p>Потребителското име вече е заето!</p>';
            }
        }
        else if(isset($_GET['signup']) == "success"){
            echo '<p>Успешна регистрация!</p>';

    }
    else{
         echo '<p>Регистрация</p>';
    }
?>

<form action="includes/signup.inc.php" method="post">
<input type="text" name="uid" value="<?= $_GET['uid'] ?? ""?>" placeholder="Потр. име:" required><br>
<input type="text" name="mail" value="<?=$_GET['mail'] ?? ""?>" placeholder="E-mail:"  required><br>
<input type="password" name="pwd" placeholder="Парола:"  required><br>
<input type="password" name="pwd-repeat" placeholder="Повтори паролата:" ><br>
<button type="submit" name="signup-submit" class="btn">Регистрирай ме</button><br>


<!--  Password recovery form  -->
<?php
if(isset($_GET["newpwd"])): ?>
   <?php if($_GET["newpwd"] == "passwordupdated"): ?>
            <p>Променихте паролата си успешно!</p>
            <?php endif;?>
<?php endif; 
?>
<a class="btn btn-danger" href="reset-password.php">Забравена парола?</a>



</form>
</main>

<?php
require "footer.php";
?>