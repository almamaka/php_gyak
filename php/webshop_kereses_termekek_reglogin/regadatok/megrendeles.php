<?php   

session_start();

$nev = $_SESSION["nev"];

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
               
                <h2 class="mb-3">Megrendelő adatai</h2>

                <?php

                    $con = mysqli_connect("localhost", "root", "", "value");
                    mysqli_query($con, "SET NAMES utf8");

                    $sql = "SELECT * FROM adatok WHERE nev LIKE '%$nev%'";

                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){

                        ?>

                        <label for="">Vásárló neve</label>
                        <input type="text" name="nev" class="form-control mb-3" value="<?php  echo $row["nev"]; ?>">

                        <label for="">Vásárló e-mail címe</label>
                        <input type="text" name="nev" class="form-control mb-3" value="<?php  echo $row["email"]; ?>">

                        <label for="">Vásárló telefonszáma</label>
                        <input type="text" name="nev" class="form-control mb-3" value="<?php  echo $row["telefon"]; ?>">

                        <label for="">Vásárló címe</label>
                        <input type="text" name="nev" class="form-control mb-3" value="<?php  echo $row["cim"]; ?>">


                        <?php

                    }

                ?>

            </form>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>