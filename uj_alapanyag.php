<?php
    $db = new mysqli('localhost','Konlll','Kornel2005','meal_calculator');
    mysqli_query($db, "SET NAMES UTF8");
    session_start();
    if (empty($_SESSION['username'])) {
        header('location: index.php');
        session_destroy();
    }

    if (isset($_POST['submit'])) {
        $errors = array();
        $true = true;

        $nev = @strip_tags(trim($_POST['nev']));
        $egysegar = @strip_tags(trim($_POST['egysegar']));
        $mertekegyseg = @strip_tags(trim($_POST['mertekegyseg']));

        if (empty($nev)) {
            $true = false;
            array_push($errors, "Nincs megadva név!");
        }
        if (empty($egysegar)) {
            $true = false;
            array_push($errors, "Nincs megadva egységár!");
        }
        if ($mertekegyseg == 'Válasszon') {
            $true = false;
            array_push($errors, "Nincs megadva mértékegység!");
        }
        
        if ($true) {
            $sql = "INSERT INTO alapanyagok(nev,egysegar,mertekegyseg) VALUES('$nev',$egysegar,'$mertekegyseg')";
            $db->query($sql);
            $_SESSION['uj_alapanyag'] = "<div class='alert alert-success'>Sikeres hozzáadás!</div>";
            header('location: uj_recept.php');
        }
    }
?><!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Új alapanyag</title>
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="container"><br>
            <form method="POST" action="uj_alapanyag.php">
                <?php
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            echo "<div class='alert alert-info' role='alert'>{$error}</div>";
                        }
                    }
                ?>  
                <h1>Új alapanyag</h1>
                <div class="form-group">
                    <label for="nev">Név*</label>
                    <input type="text" class="form-control" id="nev" name="nev">
                </div>
                <div class="form-group">
                    <label for="egysegar">Egységár(ft)*</label>
                    <input type="number" class="form-control" id="egysegar" name="egysegar">
                </div>
                <div class="form-group">
                    <label for="mertekegyseg">Mértékegység*</label>
                    <select name="mertekegyseg" id="mertekegyseg" class="form-control">
                        <option>Válasszon</option>
                        <option value="kg">kg</option>
                        <option value="g">g</option>
                        <option value="dkg">dkg</option>
                        <option value="l">l</option>
                        <option value="dl">dl</option>
                        <option value="ml">ml</option>
                        <option value="db">db</option>
                    </select>
                </div>
                <em>A *-gal jelölt mezők kitöltése kötelező!</em>
                <div class="w-100"></div><br>
                <button type="submit" class="btn btn-primary" id="submit" name="submit">Bevitel</button>
            </form>
        </div>
    </body>
</html>