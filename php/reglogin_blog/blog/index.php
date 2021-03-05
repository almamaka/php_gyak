<?php

    require "connection.php";

    $error = "";
    $success = "";

    if(isset($_POST["upload"])){

        $szerzo = $_POST["szerzo"];
        $datum = $_POST["datum"];
        $cim = $_POST["cim"];
        $kategoria = $_POST["kategoria"];
        $bejegyzes = $_POST["bejegyzes"];

        if(empty($szerzo) || empty($cim) || empty($datum) || empty($bejegyzes)){

            $error = "Bejegyzés rögzítéséhez minden mezőt ki kell töltened!";
        }
        else{

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "INSERT INTO adatok(szerzo,cim,kategoria,datum,bejegyzes) VALUES('$szerzo', '$cim', '$kategoria', '$datum', '$bejegyzes')";

            mysqli_query($con, $sql);

            $success = "Bejegyzés sikeresen rögzítve!";
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
<title>Blog</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <form action="" method="post" class="form-group text-center p-5 rounded">
                
                <p class="text-danger mb-3"> <?php  if(!empty($error)){ echo $error; }  ?> </p>
                <p class="text-success mb-3"> <?php  if(!empty($success)){ echo $success; }  ?> </p>
                

                <h3 class="mb-3">Bejegyzés rögzítése</h3>

                <label for="">Szerző</label>
                <input type="text" name="szerzo" class="form-control mb-3">

                <label for="">Cím</label>
                <input type="text" name="cim" class="form-control mb-3">

                <label for="">Kategória</label>
                <select name="kategoria" class="form-control mb-3">
                    <option value="Hobbi">Hobbi</option>
                    <option value="Filmek">Filmek</option>
                    <option value="Sorozatok">Sorozatok</option>
                    <option value="Tudomány">Tudomány</option>
                </select>

                <label for="">Dátum</label>
                <input type="date" name="datum" class="form-control mb-3">

                <label for="">Bejegyzés</label>
                <textarea name="bejegyzes"  cols="50" rows="10" class="form-control mb-3"></textarea>

                <button type="submit" name="upload" class="form-control mb-3 btn btn-info">Bejegyzés rögzítése</button>


            </form>
        </div>
    </div>
</body>
</html>