<?php session_start();
include_once './config.php';
include_once "./VerifyStudent.php";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = "SELECT * FROM `demoform`";
$resultQuery = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./assets/styled.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Course Outline -Student</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        .second {
            padding-top: 100px;
        }

        body {
            padding: 15px;
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            margin: auto;
            width: 100%;
            table-layout: fixed;
        }

        .tbl-header {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .tbl-header th {
            font-size: 20px;
        }

        .tbl-content {
            height: 300px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .tbl-content td {
            font-size: 17px;
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #fff;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 12px;
            color: #fff;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
        }


        /* demo styles */


        body {
            /* background: linear-gradient(to right, #25c481, #25b7c4); */
            background: linear-gradient(to right, #2e3934, #162333);
            font-family: 'Poppins', sans-serif;
        }

        section {
            margin: 50px;
        }


        /* follow me template */

        /* for custom scrollbar for webkit browser*/

        ::-webkit-scrollbar {
            width: 8px;
            background-color: white;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>

    <header>
        <a class="logo" href="#home">
            <img src="./assets/cybertrick.png" alt="" />
        </a>
        <nav>
            <ul class="nav-bar">
                <div class="bg"></div>
                <li><a class="nav-link active" href="./dashboard.php">Home</a></li>
                <li><a class="nav-link" href="./StudentCO.php">Course Outline</a></li>
                <li><a class="nav-link" href="./QuestionBank.php">Question Bank</a></li>
                <?php if (isset($_SESSION['auth_user'])): ?>
                <li><a class="nav-link" href="">
                        <?php echo $_SESSION['auth_user']['user_name']; ?>
                    </a></li>
                <?php else: ?>

                <li><a class="nav-link" href="./Registration.php">Register</a></li>
                <li><a class="nav-link" href="./Login.php">Login</a></li>

                <?php endif; ?>
            </ul>

            <div class="hamburger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>
    <div class="second">
        <h1>Question Bank</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Department</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($resultQuery)) { ?>
                    <tr>
                    <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['department'] ?></td>
                        <td><?php echo $data['course_code'] ?></td>
                        <td>

                            <a target="_blank" style='text-decoration: none; color: seagreen;margin-right:25px' class="link" href='./Faculty/pdfRead.php?name=<?php echo $data['course_code'] ?>'
                                style='text-decoration: none; color: seagreen'>
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    </section>

</body>

</html>