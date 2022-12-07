<?php
session_start();
include_once '../VerifyAuth.php';
include_once "../config.php";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_POST['submit'])) {
    $pdf=$_FILES['pdf']['name'];
    $pdf_type=$_FILES['pdf']['type'];
    $pdf_size=$_FILES['pdf']['size'];
    $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
    $pdf_store="../assets/pdf/".$pdf;
   $courseid = $_POST['courseid'];
   $session = $_POST['session'];

    move_uploaded_file($pdf_tem_loc,$pdf_store);

    $sql="INSERT INTO file(filename,courseid,session) values('$pdf','$courseid','$session')";
    $query=mysqli_query($connection,$sql);
    header('location:FacultyQBShow.php');

  }
