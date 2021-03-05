<?php

    require "../connection.php";


    $error = "";
    $success = "";

    if(isset($_POST["upload"])){

        //Célmappa felvétele teljes elérési úttal - képfeltöltéshez
        $target = "../img/".$_FILES["file"]["name"];

        $termekkep = $_FILES["file"]["name"];
        $termeknev = $_POST["termeknev"];
        $termekar = $_POST["termekar"];
        $kategoria = $_POST["kategoria"];
        $cikkszam = $_POST["cikkszam"];
        $keszlet = $_POST["keszlet"];
        $rleiras = $_POST["rleiras"];
        $hleiras = $_POST["hleiras"];

        //Ellenőrizzük le, hogy üresek-e a mezők, ha igen akkor dobjunk egy hibát
        if( empty($termeknev) || empty($termekar) || empty($cikkszam) || empty($keszlet) || empty($rleiras) || empty($hleiras)){

            $error = "Termék feltöltéséhez minden mező kitöltése kötelező!";
        }
        else{

            //Adatbázis kapcsolódás létrehozása és futtatása utf8-as karakterkódolással
            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            //Input mezőből jövő értékek eltárolása a termékek táblában
            $sql = "INSERT INTO termekek(kategoria,nev,cikkszam,ar,rleiras,hleiras,kep,keszlet,aktiv) VALUES('$kategoria', '$termeknev', '$cikkszam', '$termekar', '$rleiras', '$hleiras', 'img/$termekkep', '$keszlet', '1')";

            //SQL lekérdezés futtatása - termék rögzítése a termekek táblában
            mysqli_query($con, $sql);

            //Kép eltárolása a megadott célmappába
            move_uploaded_file($_FILES["file"]["tmp_name"], $target);

            $success = "Termék sikeresen feltöltve!";


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
<title>Notebook Shop - Termék felvétele</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">

            <form enctype="multipart/form-data" action="" method="post" autocomplete="off" class="form-group text-center p-5 rounded">

                <h3 class="text-danger mb-4"> <?php  if(!empty($error)){echo $error;}   ?> </h3>
                <h3 class="text-success mb-4"> <?php  if(!empty($success)){echo $success;}   ?> </h3>


                <h2 class="mb-3">Termék felvétele</h2>

                <label for="">Termékkép</label>
                <input type="file" name="file" class="form-control mb-3">

                <label for="">Terméknév</label>
                <input type="text" name="termeknev" class="form-control mb-3">

                <label for="">Termékár (bruttó)</label>
                <input type="text" name="termekar" class="form-control mb-3">

                <label for="">Kategória</label>
                <select name="kategoria" class="form-control mb-3">
                
                <?php
                    
                    //Adatbázis kapcsolódás létrehozása és futtatása utf8-as karakterkódolással
                    $con = mysqli_connect(host,user,pwd,dbname);
                    mysqli_query($con, "SET NAMES utf8");

                    //Kategória id,név lekérése a kategóriák táblából
                    $sql = "SELECT id,katnev FROM kategoriak ORDER BY katsorrend ASC";

                    //Lekérdezés futtatása és eltárolása $result változóban
                    $result = mysqli_query($con, $sql);

                    //Lekérdezésből kinyert adatok megjelenítése - ciklussal bejárjuk a tömbösített sql lekérdezésünk kimenetét
                    while($row = mysqli_fetch_array($result)){

                        //ID és kategória név eltárolása változókban
                        $id = $row["id"];
                        $katnev = $row["katnev"];

                        echo "
                        
                            <option value='$id'>".$katnev."</option>
                        
                        ";
                    }

                
                ?>
                
                </select>

                <label for="">Cikkszám</label>
                <input type="text" name="cikkszam" class="form-control mb-3">

                <label for="">Készlet (db)</label>
                <input type="text" name="keszlet" class="form-control mb-3">

                <label for="">Termék rövid leírása</label>
                <input type="text" name="rleiras" class="form-control mb-3">

                <label for="">Termék részletes leíársa</label>
                <textarea name="hleiras" class="form-control mb-3" cols="50" rows="10"></textarea>

                <button type="submit" class="btn btn-primary" name="upload">Termék feltöltése</button>

            </form>

        </div>
    </div>

</body>
</html>