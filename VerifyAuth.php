<?php
if (!isset($_SESSION['auth_user']['faculty_name'])) {
    header("Location:FacultyLogin.php");
    exit();
}