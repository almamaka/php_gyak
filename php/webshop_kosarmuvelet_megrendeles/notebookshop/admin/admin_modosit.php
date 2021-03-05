<?php
    require "../connection.php";

    $termekid = $_GET["id"];

    $success = "";

    if(isset($_POST["upload"])){

        $termekkep = $_POST["file"];
        $termeknev = $_POST["termeknev"];
        $termekar = $_POST["termekar"];
        $cikkszam = $_POST["cikkszam"];
        $keszlet = $_POST["keszlet"];
        $rleiras = $_POST["rleiras"];
        $hleiras = $_POST["hleiras"];

        $con = mysqli_connect(host,user,pwd,dbname);
        mysqli_query($con, "SET NAMES utf8");

        $sql = "UPDATE termekek SET  nev='$termeknev', cikkszam='$cikkszam', ar='$termekar', rleiras='$rleiras', hleiras='$hleiras', kep='$termekkep', keszlet='$keszlet' WHERE  id='$termekid'";

        mysqli_query($con, $sql);

        $success = "Sikeres módosítás!";
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
<title>Admin - Termék módosítása</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="admin_feltolt.php">Termék feltöltése</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_rendelesek.php">Rendelések</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">

    <h2 class="text-center mb-3">Termék módosítása</h2>

    <div class="row justify-content-center">

        <?php

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "SELECT * FROM termekek WHERE id='$termekid'";

            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_array($result)){

                ?>
                
                    <form action="" method="post" class="form-group text-center p-5" style="width: 600px;">

                        <h4 class="text-success mb-3"><?php  if(!empty($success)){echo $success;}   ?></h4>

                        <label for="">Termékkép</label>
                        <input type="text" name="file" class="form-control mb-3" value="<?php echo $row["kep"];  ?>">

                        <label for="">Terméknév</label>
                        <input type="text" name="termeknev" class="form-control mb-3" value="<?php echo $row["nev"];  ?>">

                        <label for="">Termékár</label>
                        <input type="text" name="termekar" class="form-control mb-3" value="<?php echo number_format($row["ar"],0,".","."); ?>">

                        <label for="">Cikkszám</label>
                        <input type="text" name="cikkszam" class="form-control mb-3" value="<?php echo $row["cikkszam"];  ?>">

                        <label for="">Készlet</label>
                        <input type="text" name="keszlet" class="form-control mb-3" value="<?php echo $row["keszlet"]; ?>">

                        <label for="">Termék rövid leírása</label>
                        <input type="text" name="rleiras" class="form-control mb-3" value="<?php echo $row["rleiras"]; ?>">

                        <label for="">Termék részletes leírása</label>
                        <textarea name="hleiras" class="form-control mb-3" cols="30" rows="10">
                            <?php  echo $row["hleiras"];  ?>
                        </textarea>

                        <button type="submit" name="upload" class="btn btn-success">Termék módosítása</button>


                    
                    </form>


                <?php
            }

        ?>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>