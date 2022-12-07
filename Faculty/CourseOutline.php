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
    <title>Todo Lists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div>
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
    </div>

    <div class="mx-auto" style="width: 80vw;">

        <h1 class="text-center">Course Outline</h1>
        <table class="table mx-auto">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Department</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                ?>
                <?php
                while ($data = mysqli_fetch_assoc($resultQuery)) { ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['department'] ?></td>
                        <td><?php echo $data['course_code'] ?></td>
                        <td>
                            <a class="link" target="_blank" style='text-decoration: none; color: seagreen;margin-right:25px' href="./pdfRead.php?name=<?php echo $data['course_code']?>"><i class= "mr-3 fa-solid fa-eye"></i></a>

                            <a class="link" href='./CourseOutlineDelete.php?id=<?php echo $data['id'] ?>'
                            onclick="return confirm('Delete Todo From List?')"
                            style='text-decoration: none; color:red'>
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>

</body>

</html>