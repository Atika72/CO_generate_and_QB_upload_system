<?php session_start();
include_once './config.php';
include_once "./VerifyStudent.php";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = "SELECT * FROM `file`";
$resultQuery = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Cyber Trick - Student</title>
	<link href="./assets/styled.css" rel="stylesheet" type="text/css" />

</head>

<body>

	<div class="container">

		<header>
			<a class="logo" href="#home">
				<img src="./assets/cybertrick.png" alt="" />
			</a>
			<nav>
				<ul class="nav-bar">
					<div class="bg"></div>
					<li><a class="nav-link active" href="#home">Home</a></li>
					<li><a class="nav-link" href="#Course">Course Outline</a></li>
					<li><a class="nav-link" href="./QuestionBank.php">Question Bank</a></li>
					<?php if (isset($_SESSION['auth_user'])): ?>
					<li><a class="nav-link" href="">
							<?php echo $_SESSION['auth_user']['user_name']; ?>
						</a></li>
					<li><a class="nav-link" href="./Logout.php">
							Sign Out
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
		<main>
			<!--─────────────────Home────────────────-->
			<div id="home">
				<div class="filter"></div>
				<section class="intro">
					<h3>Cyber Trick
						<hr>
					</h3>
					<p>Professional Goals</p>
                    <p>The goal of the website is to increase productivity when developing course outlines (CO),</p>
                    <p> question banks (QB), and program outcomes (PO).</p>
                    <p>The auto-generating system stores all CO, QB, and PO data.</p>
				</section>
			</div>
		</main>
		<footer class="copyright">© Cyber Trick

		</footer>

	</div>

</body>

</html>