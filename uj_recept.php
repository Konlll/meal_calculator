<?php
    session_start();
    if (empty($_SESSION['username'])) {
        header('location: index.php');
        session_destroy();
    }
?><!DOCTYPE html>
<html>
	<head>
		<title>Receptek</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="logo/favicon.ico" type="image/x-icon">
		<!-- CSS files -->
		<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
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
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Receptek
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="uj_recept.php"><i class="fas fa-plus"></i> Új létrehozása</a>
                            </div>
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

        <div class="container">
            <form method="POST" action="uj_recept.php">
                <div class="form-group">
                    <label for="etel_neve">Étel neve</label>
                    <input type="text" class="form-control" id="etel_neve" placeholder="Írja be egy étel nevét!">
                </div>
                <div class="form-group">
                    <label for="etel_leirasa">Étel leírása</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <label for="fok_szama">Fők száma</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="fok_szama" aria-describedby="basic-addon1" min=1>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon1">fő</span>
                    </div>
                </div><br>
                <label for="nyereseg">Nyereség</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="nyereseg" aria-describedby="basic-addon2" min=0 max=100>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div><br>
                <div class="form-group">
                    <a class="dropdown-toggle" style="color: #000; text-decoration: none;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Alapanyagok
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Bevitel</button>
            </form>
        </div>


		<!-- Script files -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>