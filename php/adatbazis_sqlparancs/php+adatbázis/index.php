<?php

    require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Adatbázis</title>
</head>
<body>
    <table width="90%" align="center" cellpadding="7" border="1">
        <tr>
            <th>Azonosító</th>
            <th>Név</th>
            <th>E-mail cím</th>
            <th>Telefonszám</th>
            <th>Lakcím</th>
        </tr>

        <?php

            /*Adatbázis kapcsolódáshoz szükséges értékek felvétele
            $host = "localhost";
            $user = "root";
            $pwd = "";
            $dbname = "php1010";
            */

            //Adatbázis kapcsolódás létrehozása
            $con = mysqli_connect(host,user,pwd,dbname);

            //Adatbázis kapcsolódás lefuttatása és karakterkódolás beállítása
            mysqli_query($con, "SET NAMES utf8");

            //SQL lekérdezés megírása és eltárolása egy változóban
            $sql = "SELECT * FROM felhasznalok";

            //SQL lekérdezésem leffutatása és eredményének eltárolása a $result változóba
            $result = mysqli_query($con, $sql);

            //Minden ciklusfutáskor eltárolom a $row változóba a tömbösített sql lekérdezésem sorait
            while($row = mysqli_fetch_array($result)){

                //ELtárolom változókba az adatbázisomban felvett oszlopokat -> eltárolom a hozzájuk tartozó értékeket ciklusfutásonként
                $id = $row["id"];
                $nev = $row["nev"];
                $email = $row["email"];
                $telefon = $row["telefon"];
                $lakcim = $row["lakcim"];

                echo "

                    <tr align='center'>
                        <td>".$id."</td>
                        <td>".$nev."</td>
                        <td>".$email."</td>
                        <td>".$telefon."</td>
                        <td>".$lakcim."</td>
                    </tr>
                
                ";

            }

        ?>
    </table>
</body>
</html>