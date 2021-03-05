<?php

    require "connection.php";

    $con = mysqli_connect(host,user,pwd,dbname);
    mysqli_query($con, "SET NAMES utf8");

    //Ajax-al átküldött érték eltárolása php változóban
    $search = $_POST["search"];

    $sql = "SELECT * FROM termekek WHERE nev LIKE '%$search%'";

    $result = mysqli_query($con, $sql);

    //Van-e eredménye az sql lekérdezésünknek
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $id = $row["id"];
            $termeknev = $row["nev"];
            $termekar = $row["ar"];
            $termekkep = $row["kep"];
            $keszlet = $row["keszlet"];
    
                echo "
                    
                    <div class='termekdoboz'>
    
                        <div class='termekkep'>
                            <a href='termek.php?termekid=$id'>
                                <img src='$termekkep' alt='' title='' />
                            </a>
                        </div>
    
                        <div class='termeknev'>".$termeknev."</div>
                        <div class='keszlet'>Készlet: ".$keszlet." db</div>
                        <div class='termekar'>".number_format($termekar, 0, ".", ".")." Ft</div>
    
                        <div class='termekkosar'>
                            <a href='kosarmuvelet.php?id=$id&action=add'>Kosárba</a>
                        </div>
                    </div>

                    ";
        }

    }
    //Ha nincs eredménye az sql lekérdezésnek -> nincs olyan termék az adatbázisban amit beírtam az input mezőbe
    else{

        echo "<h3 class='text-center mt-3'>Nincs ilyen termék az adatbázisban!</h3>";

    }