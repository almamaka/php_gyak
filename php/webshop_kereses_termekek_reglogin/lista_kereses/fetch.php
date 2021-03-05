<?php

    $con = mysqli_connect("localhost", "root", "", "webshop");
    mysqli_query($con, "SET NAMES utf8");

    $search = $_POST["search"];

    $sql = "SELECT id,nev,ar FROM termekek WHERE nev LIKE '%$search%'";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){


        while($row = mysqli_fetch_array($result)){

            $id = $row["id"];
            $termeknev = $row["nev"];
            $termekar = $row["ar"];

            echo "

                <a href='termekek.php?id=$id' class='list-group-item list-group-item-action border-1 '>".$termeknev."</a>
    
            ";
        }
    }
    else{

       echo " <a href='#' class='list-group-item list-group-item-action border-1 '>Nincs ilyen termék az adatbáziban!</a>";
    }