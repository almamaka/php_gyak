<?php require "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.5.2/cyborg/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<title>Utazási adatok megjelenítése</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">

            <h2 class="mb-2">Utazás részleteinek megtekintése</h2>
            
            <form action="" class="form-group text-center p-5 rounded col-12" method="post">
                <input type="text" name="search_text" class="form-control mb-2" placeholder="Írd be az utazó nevét...">
                <button type="submit" name="search" class="btn btn-success mb-5">Keresés</button>
            </form>


            <table class="table table-striped text-center">
                <tr>
                    <th>Azonosító</th>
                    <th>Utazó neve</th>
                    <th>Honnan utazunk?</th>
                    <th>Hova utazunk?</th>
                    <th>Utazás hossza kilométerben</th>
                    <th>Jármű</th>
                    <th>Utazás időpontja</th>
                </tr>

                <?php

                if(isset($_POST["search"])){

                    $search_text = $_POST["search_text"];

                    $con = mysqli_connect(host,user,pwd,dbname);
                    mysqli_query($con, "SET NAMES utf8");

                    $sql = "SELECT * FROM adatok WHERE nev LIKE '%$search_text%'";

                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){

                        $id = $row["id"];
                        $nev = $row["nev"];
                        $honnan = $row["honnan"];
                        $hova = $row["hova"];
                        $km = $row["km"];
                        $jarmu = $row["jarmu"];
                        $datum = $row["datum"];


                        echo "
                        
                            <tr>
                                <td>".$id."</td>
                                <td>".$nev."</td>
                                <td>".$honnan."</td>
                                <td>".$hova."</td>
                                <td>".$km." km</td>
                                <td>".$jarmu."</td>
                                <td>".$datum."</td>
                            </tr>
                    ";

                    }

                }
                else{

                     //Adatbázis kapcsolódás megírása és eltárolása változóban
                    $con = mysqli_connect(host,user,pwd,dbname);

                    //Adatázis kapcsolódás lefuttatása és kódolás beállítása
                    mysqli_query($con, "SET NAMES utf8");

                    //SQL lekérdezés megírása : adatok megjelenítése a táblából id alapján növekvő sorrendben
                    $sql = "SELECT * FROM adatok ORDER BY id ASC";

                    //SQL lekérdezés futtatása és eredményének eltárolsáa a $result változóba
                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){

                        $id = $row["id"];
                        $nev = $row["nev"];
                        $honnan = $row["honnan"];
                        $hova = $row["hova"];
                        $km = $row["km"];
                        $jarmu = $row["jarmu"];
                        $datum = $row["datum"];


                        echo "
                        
                            <tr>
                                <td>".$id."</td>
                                <td>".$nev."</td>
                                <td>".$honnan."</td>
                                <td>".$hova."</td>
                                <td>".$km." km</td>
                                <td>".$jarmu."</td>
                                <td>".$datum."</td>
                            </tr>
                        ";

                    }

                }






               
                ?>

            </table>
        </div>
    </div>

</body>
</html>