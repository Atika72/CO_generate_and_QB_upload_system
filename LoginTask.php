<?php
include_once "./config.php";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
session_start();

if (!$connection) {
    throw new Exception("connection failed");
} else {
    $action = $_POST['action'] ?? '';
    if (!$action) {
        header("Location:Login.php");
        die();
    } else {
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        $type = $_POST['type'];

        if ($userid && $password && $type ) {
            $query = "SELECT * FROM `users` WHERE type='$type' AND userid='$userid' AND password='" . md5($password) . "'";
            $login_query = mysqli_query($connection, $query);
            
            if(mysqli_num_rows($login_query) > 0) {
                foreach($login_query as $data) {
                    $username=$data['username'];
                    $type = $data['type'];
                }
                $_SESSION['auth'] = true;
                // $_SESSION['auth_user_role'] = "$type";
                $_SESSION['auth_user'] = [
                    'user_name'=> $username
                ];
                header("Location:dashboard.php");
            }
        }
    }
}