<?php
require "header.php";
?>


<main>
    <h1>Reset your password</h1>
    <p>An email will be send to you with instructions on how to reset your password</p> 
    <form action="includes/reset-request.inc.php" method="post">
    <input type="text" name="email" placeholder="Enter your email address" required>
    <button type="submit" name="request-reset-submit">Receive new password by email</button>

    </form>
    <?php
        if(isset($_GET["reset"])){
            if($_GET["reset"] == "success"){
                echo '<p>Check your e-mail!</p>';
            }
        }
    ?>

<!--  Password recovery form  -->

    <!-- <a href="reset-password.php">Forgotten password?</a> -->



    
</main>

<?php
require "footer.php";
?>