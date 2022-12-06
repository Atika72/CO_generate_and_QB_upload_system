<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Registration-Faculty</title>
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="align">
  <div class="grid">
    <h1>Faculty Registration</h1>
    <form action="./FacultyRegistrationTask.php" method="POST" class="form login">
      <div class="form__field">

        <label for="login__username">
          <span>
            <i class="fa-regular fa-user"></i>
          </span></label>
        <input id="login__username" type="text" name="username" class="form__input"
          placeholder="Username" required>
      </div>
      <div class="form__field">

        <label for="login__userid">
          <span>
          <i class="fa-solid fa-id-card"></i>
          </span></label>
        <input id="login__userid" type="text" name="userid" class="form__input"
          placeholder="User ID" required>
      </div>
      <div class="form__field">

        <label for="login__email">
          <span>
          <i class="fa-solid fa-envelope"></i>
          </span></label>
        <input id="login__email" type="text" name="email" class="form__input"
          placeholder="Email Address" required>
      </div>

      <div class="form__field">
        <label for="login__password">
          <span> <i class="fa-sharp fa-solid fa-lock"></i></span>
        </label>
        <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
      </div>
      <div class="form__field">
        <label for="login__group">
          <span><i class="fa-solid fa-marker"></i></span>
        </label>
        <select class="form__field select__field" name="type" id="login__group">
          <option class="options" disabled selected>Choose Type</option>
          <option value="faculty">Faculty</option>
        </select>

      </div>
      <input type="hidden" name="action" value="add">
      <div class="form__field">
        <a href="dashboard.html"><button type="submit" value="submit">REGISTER</button></a>
      </div>
      <p>Already Have An Account?<a class="link" href="./FacultyLogin.php">Login Now</a></p>
      <a class="link" href="../index.php">Back To Home</a>
    </form>



</body>

</html>