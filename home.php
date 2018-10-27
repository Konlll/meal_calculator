<?php
    session_start();
    if (empty($_SESSION['username'])) {
        header('location: index.php');
        session_destroy();
    }
?><!DOCTYPE html>
<html>
	<head>
		<title>Főoldal</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="logo/favicon.ico" type="image/x-icon">
		<!-- CSS files -->
		<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="home.php"><img src="logo/favicon.ico" alt="" class="img-responsive"> Meal Calculator</a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 nav-left">
                        <li class="nav-item active">
                            <a class="nav-link" href="home.php">Főoldal <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a href="receptek.php" class="nav-link">Receptek</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link">Galéria</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link">Elérhetőség</a>
                        </li>
                    </ul>
                    <div class="float-right mr-5">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                    echo "Üdv: {$_SESSION['username']}";
                                ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-center" href="logout.php">Kijelentkezés</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>


		<!-- Script files -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>