<?php

    require "class/sql.php";

    $sql = new Sql();

    if(isset($_POST["upload"])){

        $marka = $_POST["marka"];
        $tipus = $_POST["tipus"];
        $evjarat = $_POST["evjarat"];
        $ar = $_POST["ar"];
        $img = $_FILES["file"]["name"];

        try{
            $sql->insertCar($marka,$tipus,$evjarat,$ar,$img);
            header("Location: megjelenit.php");
        }catch(Exception $e){

            $error = $e->getMessage();
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Autók feltöltése</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <form enctype="multipart/form-data" method="post" class="form-group text-center p-5 rounded bg-dark text-light">
            
                <p class="text-danger mb-5">
                    <?php  if(!empty($error)){echo $error;}  ?>
                </p>

                <label for="">Márka</label>
                <input type="text" name="marka" class="form-control mb-3">

                <label for="">Típus</label>
                <input type="text" name="tipus" class="form-control mb-3">

                <label for="">Évjárat</label>
                <input type="text" name="evjarat" class="form-control mb-3">

                <label for="">Ár</label>
                <input type="text" name="ar" class="form-control mb-3" >

                <label for="">Kép</label>
                <input type="file" name="file" class="form-control mb-3">

                <button type="submit" name="upload" class="btn btn-warning">Autó feltöltése</button>
            
            </form>
        </div>
    </div>










<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>