<?php  require "header.php";   ?>

<div id="top">
    <img src="" id="logo" alt="" title="" />
    <?php require "menu.php";   ?>
</div>

<div id="left">
    <?php   require "kategoria.php";   ?>
</div>

<div id="right">
    <?php

        $con = mysqli_connect(host,user,pwd,dbname);
        mysqli_query($con, "SET NAMES utf8");

        //MEgnézem, hogy az urlbe van-e eltárolva termékid(termekid=?)
        if(isset($_GET["termekid"])){

            //Ha van, akkor eltárolom egy változóba
            $termekid = $_GET["termekid"];

            //Megírom a lekérdezem, amiben csak azt a terméket fogom megjeleníteni, aminek az azonosítója el van tárolva a változóba
            $sql = "SELECT * FROM termekek WHERE id='$termekid'";
        }
        else{

            header("Location: teremkek.php");
        }

        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($result)){

            $id = $row["id"];
            $termeknev = $row["nev"];
            $termekar = $row["ar"];
            $termekkep = $row["kep"];
            $cikkszam = $row["cikkszam"];
            $keszlet = $row["keszlet"];
            $rleiras = $row["rleiras"];
            $hleiras = $row["hleiras"];

            echo "
            
                <div id='termekkep'>
                    <img src='$termekkep' alt='' title='' />
                </div>

                <div id='termekadatok'>

                    <div id='termeknev'>
                        <h1>".$termeknev."</h1>
                    </div>

                    <div id='termekar'>
                        <h3>".number_format($termekar, 0, ".", ".")." Ft</h3>
                    </div>

                    <div id='rleiras'>
                        <p>".$rleiras."</p>
                    </div>

                    <div id='cikk'>
                        <p> <strong>Cikkszám: </strong>".$cikkszam." <strong>Készlet: </strong>".$keszlet." </p>
                    </div>

                    <div id='termekkosar'>
                        <a href='kosarmuvelet.php?id=$id&action=add'>Kosárba</a>
                    </div>
                
                </div>

                <div id='hleiras'>
                    <h3>Termék részletes leírása:</h3>
                    <p>".$hleiras."</p>
                </div>


            
            ";
        }


    ?>
</div>

</body>
</html>