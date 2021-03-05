<?php  require "header.php";   ?>

<div id="top">
    <img src="" id="logo" alt="" title="" />
    <?php require "menu.php";   ?>
</div>

<div id="left">
    <?php   require "kategoria.php";   ?>
</div>

<div id="right">
    <h1>Termék keresése</h1>

    <form action="" method="post">
        <input type="text" name="search" class="form-control mb-3" placeholder="Írd be a termék nevét...">
        <button type="submit" name="search_btn" class="btn btn-success">Keresés</button>
    </form>

    <?php

        if(isset($_POST["search_btn"])){

            $search = $_POST["search"];

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "SELECT * FROM termekek WHERE nev LIKE '%$search%'";

            $result = mysqli_query($con, $sql);

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
            else{

                echo "<h3 class='text-center mt-3'>Nincs ilyen termék az adatbázisban!</h3>";
            }

            

        }
        

    ?>
</div>

</body>
</html>