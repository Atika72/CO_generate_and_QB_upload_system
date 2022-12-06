<?php
if (!isset($_SESSION['auth_user']['user_name'])) {
    header("Location:Login.php");
    exit();
}