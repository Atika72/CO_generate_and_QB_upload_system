<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION['auth_user'])) : ?>
    <h1>Student here</h1>
   <h3>
   <?php echo $_SESSION['auth_user']['user_name']; ?>
   </h3>
   <?php else: ?>
   <h1>
    Nothing here
    <?php endif; ?>
   </h1>
 
</body>
</html>