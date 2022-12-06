<?php
include_once "./config.php";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connection) {
    throw new Exception("connection failed");
} else {
    $action = $_POST['action'] ?? '';
    if (!$action) {
        header("Location:Registration.php");
        die();
    } else {
        // $username = $_POST['username'];
        $username = $_POST['username'];
        $userid = $_POST['userid'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordHash = md5($password);
        $type = $_POST['type'];
        if ( $email && $passwordHash && $username && $userid && $type) {
            $query = "INSERT into `users` ( userid,username,password, email, type) VALUES ( '$userid','$username','$passwordHash', '$email' , '$type')";
            mysqli_query($connection, $query);
            header("Location:Login.php");

        }
    }
}