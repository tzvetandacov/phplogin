<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem";

$dsn = "mysql:host=$serverName;dbname=$dbName";



try {
    $conn = new PDO($dsn, $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
// $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// if (!$conn){
//     die("Connection failed: ".mysqli_conntect_error());
// }