<!DOCTYPE html>
<html>
	<head>
		<title>Bejelentkezés</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="logo/favicon.ico" type="image/x-icon">
		<!-- CSS files -->
		<link rel="stylesheet" type="text/css" href="css/signin.css">
		<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<!-- Bejelentkezés mező -->
		<form class="form-signin text-center">

			<?php
				// Sikeres regisztráció esetén
				session_start();
				if (!empty($_SESSION['registered'])) {
					echo $_SESSION['registered'];
				}
			?>

			<img class="mb-4" src="logo/logo.jpg" alt="" width="200" height="200">
			<h1 class="h3 mb-3 font-weight-normal">Kérlek jelentkezz be!</h1>

			<label for="inputEmail" class="sr-only">E-mail cím</label>
			<input type="email" id="inputEmail" class="form-control" placeholder="E-mail cím" required autofocus>
			<br>
			<label for="inputPassword" class="sr-only">Jelszó</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Jelszó" required>
			<br>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Bejelentkezés</button>

			<p class="mt-4">Még nem regisztráltál? Itt megteheted: <a href="register.php">Regisztráció</a></p>

			<p class="mt-5 mb-3 text-muted">&copy; Meal Calculator, 2018</p>
		</form>


		<!-- Script files -->
		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>