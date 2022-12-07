<?php
include_once "../config.php";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connection) {
    throw new Exception("connection failed");
} else {
    $action = $_POST['action'] ?? '';
    if (!$action) {
        header("Location:index.php");
        die();
    } else {
        $university_name = $_POST['university_name'];
        $department = $_POST['department'];
        $course_outline_title = $_POST['course_outline_title'];
        $course_title = $_POST['course_title'];
        $course_code = $_POST['course_code'];
        $course_time = $_POST['course_time'];
        $instructor_name = $_POST['instructor_name'];
        $cell_no = $_POST['cell_no'];
        $email = $_POST['email'];
        $description = $_POST['description'];

        if ($university_name && $department && $course_outline_title) {
            $query = "INSERT INTO demoform(university_name,department,course_outline_title,course_title,course_code,course_time,instructor_name,cell_no,email,description) VALUES ('{$university_name}','{$department}', '{$course_outline_title}','{$course_title}','{$course_code}','{$course_time}','{$instructor_name}','{$cell_no}','{$email}','{$description}')";
            $result = mysqli_query($connection, $query);
            header('location:CourseOutline.php');
        }
    }
}