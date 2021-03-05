<?php

session_start();

$success = "";

if(isset($_POST["reg"])){

    $nev = $_SESSION["nev"] = $_POST["nev"];
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $cim = $_POST["cim"];

    $con = mysqli_connect("localhost", "root", "", "value");
    mysqli_query($con, "SET NAMES utf8");

    $sql = "INSERT INTO adatok(nev,email,telefon,cim) VALUES('$nev', '$email', '$telefon', '$cim')";

    mysqli_query($con, $sql);

    $success = "Sikeres adatrögzítés!";

    header("Refresh: 3; url=http://localhost/PHP1107/regadatok/megrendeles.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<title>Regadatok rögzítése</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <form action="" method="post" class="form-group text-center p-5">

                <h4 class="text-success mb-2"><?php  if(!empty($success)){echo $success;}  ?></h4>

                <h2 class="mb-3">Megrendelői adatok rögzítése</h2>

                <label for="">Vásárló neve</label>
                <input type="text" name="nev" id="" class="form-control mb-3">

                <label for="">Vásárló e-mail címe</label>
                <input type="text" name="email" id="" class="form-control mb-3">

                <label for="">Vásárló telefonszáma</label>
                <input type="text" name="telefon" id="" class="form-control mb-3">

                <label for="">Vásárló címe</label>
                <input type="text" name="cim" id="" class="form-control mb-3">

                <button type="submit" name="reg" class="btn btn-success">Adatok rögzítése</button>

            </form>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>