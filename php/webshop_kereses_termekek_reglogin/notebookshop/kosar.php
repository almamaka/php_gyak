<?php  require "header.php";   ?>

<div id="top">
    <img src="" id="logo" alt="" title="" />
    <?php require "menu.php";   ?>
</div>

<div id="left">
    <?php   require "kategoria.php";   ?>
</div>

<div id="right">
    <h2>Kosár tartalma</h2>

    <table class="table table-striped text-center mt-5">
        <tr>
            <th>Azonosító</th>
            <th>Terméknév</th>
            <th>Bruttó ár</th>
            <th>Darabszám</th>
            <th>Cikkszám</th>
            <th>Készlet</th>
            <th>Érték</th>
            <th> <a href="kosarmuvelet.php?action=empty"> <i class="fas fa-trash-alt"></i> </a> </th>
        </tr>

        <?php

            $vegosszeg = 0;

            //Ha be van állítva a kosár -> ha van termék a kosaramba
            if(isset($_SESSION["cart"])){

                foreach($_SESSION["cart"] as $product_id => $db){

                    $con = mysqli_connect(host,user,pwd,dbname);
                    mysqli_query($con, "SET NAMES utf8");

                    $sql = "SELECT * FROM termekek WHERE id='$product_id'";

                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){

                        $ertek = $row["ar"] * $db;

                        ?>

                            <tr>
                                <td><?php  echo $product_id; ?></td>
                                <td><?php  echo $row["nev"]; ?></td>
                                <td><?php  echo number_format($row["ar"], 0, ".", "."); ?> Ft</td>
                                <td><?php  echo  $db; ?></td>
                                <td><?php  echo  $row["cikkszam"]; ?></td>
                                <td><?php  echo  $row["keszlet"]; ?></td>
                                <td><?php  echo  number_format($ertek, 0, ".", "."); ?> Ft</td>
                                <td>
                                    <a href="kosarmuvelet.php?id=<?php echo $product_id ?>&action=add">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a href="kosarmuvelet.php?id=<?php echo $product_id ?>&action=remove">
                                        <i class="fas fa-minus"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php

                        $vegosszeg += $ertek;
                    }
                }

            }
            else{

                echo "<h3 class='text-center'>A kosár üres!</h3>";
            }

        ?>

        <tr>
            <td align="right" colspan="8">
                <strong>Végösszeg: <?php  echo number_format($vegosszeg, 0, ".", "."); ?> Ft</strong>
            </td>
        </tr>
    </table>

    <?php

        if($_SESSION["logged"]){

            ?>

                <a class="btn btn-success" href="megrendeles.php">Megrendelem</a>

            <?php

        }
        else{

            ?>

                <a class="btn btn-success" href="login.php">Rendelés leadásához kérjük jelentkezzen be!</a>

            <?php
        }

    ?>

</div>

</body>
</html>