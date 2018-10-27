<?php
	session_start();
	if (!empty($_SESSION['username'])) {
		header('location: home.php');
		session_destroy();
	}

	if (isset($_POST['submit'])) {
		$errors = array();
		$true = true;

		$email = strip_tags(trim($_POST['email']));
		$password = strip_tags(trim($_POST['password']));

		if (empty($email)) {
			$true = false;
			array_push($errors, "Nincs megadva e-mail cím!");
		}
		if (empty($password)) {
			$true = false;
			array_push($errors, "Nincs megadva jelszó!");
		}

		if ($true) {
			$db = new mysqli("localhost","Konlll","Kornel2005","meal_calculator");

			$password = sha1($password);
			$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$query = $db->query($sql);

			if (mysqli_num_rows($query) == 1) {
				while ($sor = mysqli_fetch_assoc($query)) {
					$_SESSION['belepve'] = "<div class='alert alert-success' role='alert'>Sikeres bejelentkezés!</div>";
					$_SESSION['username'] = $sor['username'];
					header('location: home.php');
				}
			}else{
				array_push($errors, "Hibás adatok lettek megadva!");
			}

			$db->close();
		}
	}
?><!DOCTYPE html>
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
		<form class="form-signin text-center" method="POST">

			<?php
				// Sikeres regisztráció esetén
				if (isset($_SESSION['registered'])) {
					echo $_SESSION['registered'];
				}

				if (!empty($errors)) {
					foreach ($errors as $error) {
						echo "<div class='alert alert-info' role='alert'>{$error}</div>";
					}
				}
			?>

			<img class="mb-4" src="logo/logo.jpg" alt="" width="200" height="200">
			<h1 class="h3 mb-3 font-weight-normal" style="text-shadow: 2px 2px grey;">Kérlek jelentkezz be!</h1>

			<label for="email" class="sr-only">E-mail cím</label>
			<input type="email" id="email" name="email" class="form-control" placeholder="E-mail cím" autofocus>
			<br>
			<label for="password" class="sr-only">Jelszó</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="Jelszó">
			<br>
			<button class="btn btn-lg btn-primary btn-block" type="submit" id="submit" name="submit">Bejelentkezés</button>

			<p class="mt-4">Még nem regisztráltál? Itt megteheted: <a href="register.php">Regisztráció</a></p>

			<p class="mt-5 mb-3 text-muted">&copy; Meal Calculator, 2018</p>
		</form>


		<!-- Script files -->
		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>