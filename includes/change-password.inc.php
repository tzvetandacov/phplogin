<?php session_start();
// header("Location: ../index.php?changepassword=working");
var_dump($_SESSION);
var_dump($_POST);

exit;
if (isset($_POST['change-password-submit'])){
    require 'dbh.inc.php';
    // $oldPwd = $_POST['old-password'];
    // $newPwd = $_POST['new-password'];
    // $newPwdRepeat = $_POST['new-password-repeat'];

    if(empty($_POST['new-password']) || empty($_POST['new-password-repeat'])){
        header("Location: ../index.php?error=emptyfieldschpwd");
        exit();
    }
    else if($newPwd !== $newPwdRepeat){
        header("Location: ../index.php?error=differentpasswordandpasswordrepeat");
        exit();
    }
    else{

        $sql = "SELECT pwdUsers FROM users WHERE idUsers = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(! mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "s", $_POST['login-id']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        
            $pwdCheck = password_verify($oldPwd, $result);
                if($pwdCheck == 0){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == 1){
                    $hashedNewPwd = password_hash($newPwd, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET pwdUsers =".$hashedNewPwd. " WHERE idUsers =?;";
                    $stmt = mysqli_stmt_init($conn);
                    if(! mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../index.php?error=sqlerror");
                        exit();
                    }else{
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $_POST['login-id']);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?changedpassword=success");
                    exit();
                }}
    }
 }
}
else{
    header("Location: ../index.php?error=notsubmittedcorectly");
    exit();
}

 
 


