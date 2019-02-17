<?php

if(isset($_POST['login-submit'])){
require 'dbh.inc.php';
$mailuid = $_POST['mailuid'];
$password = $_POST['pwd'];

    if(empty($mailuid) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
        // USING PDO: 

        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        if(! $conn->prepare($sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute([$mailuid, $mailuid]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        if(!password_verify($password, $user->pwdUsers)){
            header("Location: ../index.php?error=wrongpwd");
            exit();
        } else if(password_verify($password, $user->pwdUsers)){
            ini_set('session.cookie_secure', 0);
            session_start();
            $_SESSION['userId'] = $user->idUsers;
            $_SESSION['userUid'] = $user->uidUsers;
            header("Location: ../index.php?login=success");
            exit();
        }
        else{
            header("Location: ../index.php?error=wrongpwd");
            exit();
        }



        // print_r($user);
        // die();
        // $stmt = mysqli_stmt_init($conn);
        // if(! mysqli_stmt_prepare($stmt, $sql)){
        //     header("Location: ../index.php?error=sqlerror");
        //     exit();
        }
        
        // if(true) {
        //     mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
        //     mysqli_stmt_execute($stmt);
        //     $result = mysqli_stmt_get_result($stmt);
        //     if($row = mysqli_fetch_assoc($result)){
        //         $pwdCheck = password_verify($password, $row['pwdUsers']);
        //         if($pwdCheck == false){
        //             header("Location: ../index.php?error=wrongpwd");
        //             exit();
        //         }
        //         else if ($pwdCheck == true){
        //             ini_set('session.cookie_secure', 0);
        //             session_start();
        //             $_SESSION['userId'] = $row['idUsers'];
        //             $_SESSION['userUid'] = $row['uidUsers'];
        //             header("Location: ../index.php?login=success");
        //             exit();
        //         }
        //         else{
        //             header("Location: ../index.php?error=wrongpwd");
        //             exit();
        //         }
        //     }
        //     else{
        //         header("Location: ../index.php?error=nouser");
        //         exit();
        //     }
        // }
    }


else {
    header("Location: ../index.php");
    exit();
} 