<?php
require "header.php";
?>
    <main>
     <h2>Начална страница</h2>
     <?php if(isset($_SESSION['userId'])): ?> 
          <?php require 'includes/content.inc.php';?>
          <a class= 'btn btn-primary' href="change-password.php">Смяна на парола</a>
     <?php endif; ?>
     <?php if(isset($_GET['error'])): ?>
       <?php   if($_GET['error'] == 'wrongpwd'){ ?>
            <p>Грешни потребителско име или парола!</p>
        
       <?php } else if($_GET['error'] == 'nouser'){ ?>
            <p>Несъществува регистриран потребител с такова име!</p>
       <?php } else{ ?>
            <p>Не сте логнат!</p>
    <?php }endif; ?>
    </main>

<?php
require "footer.php";
