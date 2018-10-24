<?php
    session_start();
    if (!empty($_SESSION['username'])) {
        header('location: home.php');
    }

    if (isset($_POST['submit'])) {
        $db = new mysqli('localhost','Konlll','Kornel2005','meal_calculator');
        $errors = array();
        $true = true;

        $username = strip_tags(trim($_POST['username']));
        $email = strip_tags(trim($_POST['email']));
        $password = strip_tags(trim($_POST['password']));
        $password2 = strip_tags(trim($_POST['password2']));
        $username_regex = '/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/';
        $password_regex = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';

        $foglalt_e_username_sql = "SELECT username from users WHERE username='$username'";
        $foglalt_e_email_sql = "SELECT email from users WHERE email='$email'";

        $foglalt_e_username_query = $db->query($foglalt_e_username_sql);
        $foglalt_e_email_query = $db->query($foglalt_e_email_sql);

        if (empty($username)) {
            $true = false;
            array_push($errors, "Nincs megadva felhasználónév!");
        }else if (!empty($username) && !preg_match($username_regex, $username)) {
            $true = false;
            array_push($errors, "A felhasználónév minimum 2, max 20 karakter lehet!");
        }else if($foglalt_e_username_query->num_rows>0){
            $true = false;
            array_push($errors, "A felhasználónév már foglalt!");
        }

        if (empty($email)) {
            $true = false;
            array_push($errors,"Nincs megadva e-mail cím!");
        }else if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $true = false;
            array_push($errors,"Az e-mail cím nem megfelelő formátumú!");
        }else if($foglalt_e_email_query->num_rows>0){
            $true = false;
            array_push($errors, "Az e-mail cím már foglalt!");
        }

        if (empty($password)) {
            $true = false;
            array_push($errors, "Nincs megadva jelszó!");
        }
        if(!empty($password) && !preg_match($password_regex, $password)){
            $true = false;
            array_push($errors, "A jelszó minimum 8 karakter, nagy-, kisbetűnek, számnak kell lennie benne!");
        }

        if (empty($password2)) {
            $true = false;
            array_push($errors, "Nincs megismételve a jelszó!");
        }
        if (!($password == $password2)) {
            $true = false;
            array_push($errors, "A két jelszó nem egyezik!");
        }

        if ($true) {
            $password = sha1($password);
            
            $sql = "INSERT INTO users(username,email,password,date) VALUES('$username','$email','$password',NOW())";
            $db->query($sql);
            $_SESSION['registered'] = "<div class='alert alert-success' role='alert'>Sikeres regisztráció!</div>";
            header('location: index.php');

            $db->close();
        }
    }

?><!DOCTYPE html>
<html>
	<head>
		<title>Regisztráció</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="logo/favicon.ico" type="image/x-icon">
		<!-- CSS files -->
		<link rel="stylesheet" type="text/css" href="css/signin.css">
		<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<!-- Regisztráció mező -->
		<form class="form-signin text-center" method="POST">

            <?php
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-info'>{$error}</div>";
                    }
                }
            ?>

			<img class="mb-4" src="logo/logo.jpg" alt="" width="200" height="200">
			<h1 class="h3 mb-3 font-weight-normal" style="text-shadow: 2px 2px grey;">Regisztráció</h1>

            <label for="username" class="sr-only">Felhasználónév</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Felhasználónév" autofocus>
            <br>
			<label for="email" class="sr-only">E-mail cím</label>
			<input type="text" id="email" name="email" class="form-control" placeholder="E-mail cím">
            <br>
			<label for="password" class="sr-only">Jelszó</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="Jelszó">
            <br>
            <label for="password2" class="sr-only">Jelszó ismétlés</label>
			<input type="password" id="password2" name="password2" class="form-control" placeholder="Jelszó ismétlés">
            <br>
			<button class="btn btn-lg btn-primary btn-block" type="submit" id="submit" name="submit">Regisztráció</button>
			<p class="mt-5 mb-3 text-muted">&copy; Meal Calculator, 2018</p>
		</form>


		<!-- Script files -->
		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>