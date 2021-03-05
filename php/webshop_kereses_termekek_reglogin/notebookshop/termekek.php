<?php  require "header.php";   ?>

<div id="top">
    <img src="" id="logo" alt="" title="" />
    <?php require "menu.php";   ?>
</div>

<div id="left">
    <?php   require "kategoria.php";   ?>
</div>

<div id="right">

    <div id="sort">
        <a href="?sort=price_asc">Legolcsóbb elől</a>
        <a href="?sort=price_desc">Legdrágább elől</a>
        <a href="?sort=best">Legnépszerűbb elől</a>
        <a href="?sort=neweset">Legfrisebb elől</a>
    </div>

    <?php

        $con = mysqli_connect(host,user,pwd,dbname);
        mysqli_query($con, "SET NAMES utf8");

        //Ha van beállítva az urlbe kategória id (katid=?)
        if(isset($_GET["katid"])){

            //Akkor azt az id-t eltárolom egy változóba
            $katid = $_GET["katid"];

            //Írok egy lekédezést, ami csak azokat a termékeket fogja megjeleníteni, amelyeknél a kategória ugyanaz mint amit az urlből lekértem
            $sql = "SELECT * FROM termekek WHERE kategoria='$katid'";
        }
        else{

            $sql = "SELECT * FROM termekek ORDER BY id DESC";
        }

        //Ha van beállíva az urlbe rendezéssel kapcsolatos információ (sort=?)
        if(isset($_GET["sort"])){

            //Eltárolom változba a sort értékét (price_asc vagy price_desc vagy best vagy newest)
            $sort = $_GET["sort"];

            //Megnézem, hogy a sort értékei közül melyik van eltárolva a változóba
            switch($sort){

                case "price_asc":
                    $sql = "SELECT * FROM termekek ORDER BY ar ASC";
                break;

                case "price_desc":
                    $sql = "SELECT * FROM termekek ORDER BY ar DESC";
                break;

                case "newest":
                    $sql = "SELECT * FROM termekek ORDER BY id DESC";
                break;

                default:
                    $sql = "SELECT * FROM termekek ORDER BY id DESC";
                break;
            }
        }

        $result = mysqli_query($con, $sql);

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

    ?>
</div>

</body>
</html>