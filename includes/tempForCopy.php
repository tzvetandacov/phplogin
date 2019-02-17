<?php
function checkUserNameAndEmail($username, $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../signup.php?error=invalidmailuid");
            exit();
        }
    }

    checkUserNameAndEmail($username, $email);