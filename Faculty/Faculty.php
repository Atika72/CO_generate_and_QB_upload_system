<?php session_start();
include_once "../VerifyAuth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/faculty.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Home-Faculty</title>
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
            <a class="nav-link" aria-current="page" href="./FacultyCourseShow.php">Question Bank</a>
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
  <!-- form -->
  <div class="form">
    <h1>Upload Question Bank</h1>
    <form action="./FileUpload.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Course ID</label>
        <input type="text" name="courseid" class="form-control" id="exampleFormControlInput1"
          placeholder="Input Course ID">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Session</label>
        <input type="text" name="session" class="form-control" id="exampleFormControlInput1"
          placeholder="Input Session">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Upload <strong>PDF</strong> Only </label>
        <input class="form-control" type="file" id="formFile pdf" name="pdf" value="" required>
        <button type="submit" name="submit" class="btn btn-primary mt-3">
          Upload
        </button>
      </div>
    </form>
  </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
  integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>