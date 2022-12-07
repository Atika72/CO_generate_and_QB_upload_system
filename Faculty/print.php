<?php
include_once '../config.php';
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$name = $_GET['name'];
$query = "SELECT * FROM `demoform` WHERE course_code='$name'";
$resultQuery = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        main {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }

        img {
            height: 100px;
        }

        span {
            font-size: 20px;
        }

        #marks {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #marks td,
        #marks th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #marks tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #marks tr:hover {
            background-color: #ddd;
        }

        #marks th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: black;
        }
    </style>
</head>

<body>
    <?php
    while ($data = mysqli_fetch_assoc($resultQuery)) { ?>

    <main>
        <div class="image">
            <img src="data:image/jpeg;base64,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"
                alt="">
        </div>
        <div class="university_name">
            <h2>
                <?php echo $data['university_name'] ?>
            </h2>
        </div>
        <div class="department">
            <h4>
                <?php echo $data['department'] ?>
            </h4>
        </div>
        <div class="course_outline_title">
            <h3>Course Outline :
                <?php echo $data['course_outline_title'] ?>
            </h3>
        </div>
        <div class="course_title course_code course_time">
            <h3>Course Title :
                <?php echo $data['course_title'] ?>
            </h3>
            <h3>Course Code :
                <?php echo $data['course_code'] ?>
            </h3>
            <h3>Class Meet :
                <?php echo $data['course_time'] ?>
            </h3>
        </div>
        <div class="instructor">
            <h2>Instructor's Details :</h2>
            <h4> Instructors's Name:
                <?php echo $data['instructor_name'] ?>
            </h4>
            <h4> Cell No:
                <?php echo $data['cell_no'] ?>
            </h4>
            <h4> Email Address:
                <?php echo $data['email'] ?>
            </h4>
        </div>
        <br>
        <div class="course">
            <h2>Course Description :</h2>
            <span>
                <?php echo $data['description'] ?>
            </span>
        </div>
        <div class="Assessment">
            <h2>Assessment and Marks Distribution:</h2>
            <span>Students will be assessed on the basis of their overall performance in all the exams, quizzes, and
                class
                participation. Final numeric reward will be the compilation of:</span>
            <table id="marks">
                <tr>
                    <th>Two Class tests</th>
                    <th>Class attendance</th>
                    <th>Mid-term exam</th>
                    <th>Final exam</th>
                </tr>
                <td>(20% ) (60% of best and 40% of worst test)</td>
                <td>(10%)</td>
                <td>(30%)</td>
                <td>(40%)</td>
                </tr>
            </table>
        </div>
        <div class="grade">
            <h2>Grade Conversion Scheme:</h2>
            <span>The following chart will be followed for grading. This has been customized from the guideline
                provided by the School of Engineering and Computer Science.</span>
                <table id="marks">
                <tr>
                    <th>A</th>
                    <th>A-</th>
                    <th>B+</th>
                    <th>B</th>
                    <th>B-</th>
                    <th>C+</th>
                    <th>C</th>
                    <th>C-</th>
                    <th>D+</th>
                    <th>D</th>
                    <th>F</th>
                </tr>
                <td>90-100</td>
                <td>85-89</td>
                <td>80-84</td>
                <td>75-79</td>
                <td>70-74</td>
                <td>65-69</td>
                <td>60-64</td>
                <td>55-59</td>
                <td>50-54</td>
                <td>45-49</td>
                <td>0-44</td>
                </tr>
            </table>
            <span>* Numbers are inclusive</span>
            <h4>**Syllabus will provide in class.</h4>
        </div>
    </main>
    <?php } ?>
</body>

</html>