<?php

    require "connection.php";

    $error = "";
    $success = "";

    if(isset($_POST["upload"])){

        $utazonev = $_POST["nev"];
        $honnan = $_POST["honnan"];
        $hova = $_POST["hova"];
        $km = $_POST["km"];
        $jarmu = $_POST["jarmu"];
        $datum = $_POST["datum"]; 

        if(empty($utazonev) || empty($honnan) || empty($hova) || empty($km) || empty($jarmu) || empty($datum)){

            $error = "Utazási adatok rögzítéséhez minden mező kitöltése kötelező!";
        }
        else{

            //Adatbázis kapcsolódás megírása és eltárolása változóban
            $con = mysqli_connect(host,user,pwd,dbname);

            //Atabázis kapcsolódás lefuttatása és kódolás beállítása
            mysqli_query($con, "SET NAMES utf8");

            //SQL lekérdezés megírása : beszúrás az adatok táblába
            $sql = "INSERT INTO adatok(nev,honnan,hova,km,jarmu,datum) VALUES('$utazonev', '$honnan', '$hova', '$km', '$jarmu', '$datum')";

            //SQL lekérdezés futtatáa (adatbázis kapcsolódással együtt)
            mysqli_query($con, $sql);

            //Siekres rögzítés esetén üzenet eltárolása
            $success = "Utazási adatok sikeresen rögzítve";
        }
    }




?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.5.2/cyborg/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<title>Utazási adatok rögzítése</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <form action="" method="post" class="form-group text-center p-5 rounded">
                
                <p class="text-danger mb-4 lead"> <?php  if(!empty($error)) { echo $error ;}   ?> </p>
                <p class="text-success mb-4 lead"> <?php  if(!empty($success)) { echo $success ;}   ?></p>

                <i class="fas fa-car fa-3x"></i>
                <h3 class="mb-4">Utazási adatok rögzítése</h3>

                <label for="">Utazó neve</label>
                <input type="text" name="nev" class="form-control mb-3">

                <label for="">Honnan utazunk?</label>
                <input type="text" name="honnan" class="form-control mb-3">

                <label for="">Hova utazunk?</label>
                <input type="text" name="hova" class="form-control mb-3">

                <label for="">Utazás hossza kilométerben</label>
                <input type="text" name="km" class="form-control mb-3">

                <label for="">Jármű</label>
                <input type="text" name="jarmu" class="form-control mb-3">

                <label for="">Utazás időpontja</label>
                <input type="date" name="datum" class="form-control mb-5">

                <button type="submit" name="upload" class="btn btn-primary mb-3">Utazás rögzítése</button>
                <br>

                <a href="utazas.php" class="lead">Utazási adatok megtekintése</a>

            </form>
        </div>
    </div>

</body>
</html>