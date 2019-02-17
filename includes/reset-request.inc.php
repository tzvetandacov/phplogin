<?php

if ( isset($_POST["request-reset-submit"])){

$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);

// Да оправя името на линка, да да им име на сайта ...
$url =  "www.mmtuts.net/forgottenpwd/create-new-password.php?selector =" . $selector . "&validator=" . bin2hex($token);

$expires = date("U") + 1800;

require 'dbh.inc.php';

$userEmail = $_POST(["email"]);

$sql = "DELETE FROM pwdReset WHERE pwdResetEmail =?;";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)){
    echo "There was an error!";
    exit();
}
else{
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
}

$sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)){
    echo "There was an error!";
    exit();
}
else{
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

$to =$userEmail;

$subject = "Reset your password for the site";

$message = '<p>We recieved password reset request. The link to reset your passsword is below. If you did not make this request you can ignore this email.</p>';

$message .= '<p>Here is your password reset link: <br>';

$message .= '<a href = " ' . $url . '">' . $url .'</a></p>';

// ДА ъпдейтна от кого е мейла.

$headers = "From: mmtuts <usemmtuts@gmail.com>\r\n";

$headers .= "Reply-To: mmtuts <usemmtuts@gmail.com>\r\n";

$headers = "Content-Type: text/html\r\n";

mail($to, $subject, $message, $headers);

header("Location: ../reset-password.php?reset=success");


} 
else {
header("Location: ../index.php");
}