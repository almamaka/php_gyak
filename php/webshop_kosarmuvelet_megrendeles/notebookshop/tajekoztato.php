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

        $sql = "SELECT * FROM tajekoztato";

        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($result)){

            ?>
            
                <h1><?php  echo $row["cim"]; ?></h1>
                <?php  echo $row["content"];  ?>

            <?php
        }

    ?>

</div>

</body>
</html>