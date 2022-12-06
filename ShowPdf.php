
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display PDF</title>
    <style media="screen">
      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
      }
    </style>
  </head>
  <body>
    <div class="div1">
      <?php
      $coursefile = $_GET['coursefile'] ?? '';
      include './config.php';
      $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // $sql="SELECT filename from file";
      // $query=mysqli_query($connection,$sql);
if ($coursefile) {
        $query2 = "SELECT filename from file WHERE filename='$coursefile'";
        $query = mysqli_query($connection, $query2);

        while ($info = mysqli_fetch_array($query)) {
      ?>
      <embed type="application/pdf" src="./assets/pdf/<?php echo $info['filename'] ?>" width="1000" height="800">
    <?php
        }
      }

      ?>

    </div>

  </body>
</html>