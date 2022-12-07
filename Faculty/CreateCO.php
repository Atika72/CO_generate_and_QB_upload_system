<?php
include_once '../config.php';
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = "SELECT * FROM `demoform`";
$resultQuery = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../assets/cybertrick.png" alt="Bootstrap" width="30" height="24">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./CourseOutline.php">Course Outline List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./CreateCO.php">Create Course Outline</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./FacultyQBShow.php">Question Bank</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Faculty.php">Upload Question</a>
          </li>
          <?php if (isset($_SESSION['auth_user'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['auth_user']['faculty_name']; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./FacultyLogout.php">Sign Out</a></li>
              <?php else: ?>
              <li><a class="dropdown-item" href="#">Login</a></li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
    <h3 class="text-center mt-5">Build Course Outline PDF</h3>
    <div class="container mt-5">
        <form class="row g-3" method="POST" action="./CoTask.php">
            <div class="col-md-4">
                <label for="university_name" class="form-label fw-bold">University</label>
                <input type="text" class="form-control" value="Independent University,Bangladesh"
                    name="university_name">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label fw-bold">Department</label>
                <select id="inputState" class="form-select" name="department">
                    <option selected disabled>Choose Department</option>
                    <option value="Department of Computer Science and Engineering">Department of Computer Science and
                        Engineering</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="course_outline_title" class="form-label fw-bold">Course Outline Session</label>
                <input type="text" name="course_outline_title" class="form-control">
            </div>
            <input type="hidden" name="action" value="add">
            <div class="col-md-4">
                <label for="course_title" class="form-label fw-bold">Course Title</label>
                <input type="text" name="course_title" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="course_code" class="form-label fw-bold">Course Code</label>
                <input type="text" name="course_code" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="course_time" class="form-label fw-bold">Course Time</label>
                <input type="text" name="course_time" class="form-control">
            </div>
            <h5 class="mt-5">INSTRUCTOR DETAILS</h5>
            <div class="col-md-4">
                <label for="instructor_name" class="form-label fw-bold">Instructor Name</label>
                <input type="text" name="instructor_name" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="cell_no" class="form-label fw-bold">Cell No.</label>
                <input type="text" name="cell_no" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label fw-bold">Email Address</label>
                <input type="text" name="email" class="form-control">
            </div>
            <h5 class="mt-5">COURSE DESCRIPTION</h5>
            <div class="col-md-12">
                <label for="description" class="fw-bold">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
            </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success btn-md mt-3">SUBMIT OUTLINE</button>
        </div>
        </form>
    </div>
</body>

</html>