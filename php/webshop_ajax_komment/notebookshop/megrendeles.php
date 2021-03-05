<?php  require "header.php";   ?>

<div id="top">
    <img src="" id="logo" alt="" title="" />
    <?php require "menu.php";   ?>
</div>

<div id="left">
    <?php   require "kategoria.php";   ?>
</div>

<div id="right">
    <h2>Megrendelés összesítése</h2>

    <table class="table table-striped text-center mt-5">
        <tr>
            <th>Azonosító</th>
            <th>Terméknév</th>
            <th>Bruttó ár</th>
            <th>Darabszám</th>
            <th>Cikkszám</th>
            <th>Készlet</th>
            <th>Érték</th>
        </tr>

        <?php

            $vegosszeg = 0;

            if(isset($_SESSION["cart"])){

                foreach($_SESSION["cart"] as $product_id => $db){

                    $con = mysqli_connect(host,user,pwd,dbname);
                    mysqli_query($con, "SET NAMES utf8");

                    $sql = "SELECT * FROM termekek WHERE id='$product_id'";

                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){

                        $ertek = $row["ar"] *$db;

                        ?>

                            <tr>
                                <td><?php echo $product_id;  ?></td>
                                <td><?php echo $row["nev"];   ?></td>
                                <td><?php echo number_format($row["ar"],0,".",".");?> Ft</td>
                                <td><?php echo $db;  ?></td>
                                <td><?php echo $row["cikkszam"];    ?></td>
                                <td><?php echo $row["keszlet"];    ?></td>
                                <td><?php echo number_format($ertek,0,".","."); ?> Ft</td>
                            </tr>

                        <?php

                        $vegosszeg += $ertek;
                    }
                }
            }

        ?>

        <tr>
            <td align="right" colspan="7">
                <strong>Végösszeg: </strong> <?php  echo number_format($vegosszeg, 0, ".", "."); ?> Ft
            </td>
        </tr>
    </table>

    <?php

        $error1 = "";
        $error2 = "";
        $success = "";
        
        //Ha megnyomtam a megrendel gombok és a feltételeket is elfogadtam
        if(isset($_POST["megrendel"]) && isset($_POST["check"]) == 1){

            $nev = $_POST["nev"];
            $telefon = $_POST["telefon"];
            $email = $_POST["email"];
            $szcim = $_POST["szcim"];
            $szmod = $_POST["szmod"];
            $fizmod = $_POST["fizmod"];

            if(empty($nev) || empty($telefon) || empty($email) || empty($szcim)){

                $error1 = "Rendelés leadásához minden mező kitöltése kötelező!";
            }
            else{

                $con = mysqli_connect(host,user,pwd,dbname);
                mysqli_query($con, "SET NAMES utf8");

                $sql = "INSERT INTO vevok(nev,email,cim,telefon,pw,szcim) VALUES('$nev', '$email', '$szcim', '$telefon', '', '$szcim')";

                mysqli_query($con, $sql);

                //Lekérem az utoljára bekerült vevőm azonosítóját
                $utolsovevoid = "SELECT id FROM vevok ORDER BY id DESC LIMIT 1";

                //A lekérdezésem eredményét eltárolom egy változóba
                $result = mysqli_query($con, $utolsovevoid);

                //Tömbösítem az sql lekérdezésem kimenetét ($result)
                $get_vevoid = mysqli_fetch_array($result);

                //Az sql lekérdezemben keresett vevoid-t eltárolom egy változóban
                $kapottvevoid = $get_vevoid[0];


                //Feltöltöm az adatokat a rendelések táblába
                $sql2 = "INSERT INTO rendelesek(vevoid,szallitas,fizmod,datum,statusz,bosszeg) VALUES('$kapottvevoid', '$szmod', '$fizmod', NOW(), 'függőben', '$vegosszeg')";

                mysqli_query($con, $sql2);

                //Megkeresem az utolsó rendelésem azonosítóját
                $utolsorendelesid = "SELECT id FROM rendelesek ORDER BY id DESC LIMIT 1";

                //Eltárolom a lekérdezésem kimenetét egy $result2 változóba
                $result2 = mysqli_query($con, $utolsorendelesid);

                //Töbösítem a $result2 változóban tárolt sql lekérdezés kimenetét
                $get_rendelesid = mysqli_fetch_array($result2);

                //Az sql lekérdezemben keresett rendelesid-t eltárolom egy változóban
                $kapottrendelesid = $get_rendelesid[0];


                foreach($_SESSION["cart"] as $product_id => $db){

                    //Feltöltöm a rend_term táblát a megfelelő adatokkal
                    $sql3 = "INSERT INTO rend_term(rendelesid,termekid,db) VALUES('$kapottrendelesid', '$product_id', '$db')";

                    mysqli_query($con, $sql3);

                    //Frissítem az adott termék készletének darabszámát
                    $sql4 = "UPDATE termekek SET keszlet=keszlet-'$db' WHERE id='$product_id'";

                    mysqli_query($con, $sql4);
                }

                echo "<h4 class='text-success text-center'>Rendelésed sikeresen rögzítettük!</h4>";
                unset($_SESSION["cart"]);

            }
        }

        //Ha megnyomtam a gombot, de nincs kipipálva a checkbox
        else if(isset($_POST["megrendel"]) && isset($_POST["check"]) == 0){

            $nev = $_POST["nev"];
            $telefon = $_POST["telefon"];
            $email = $_POST["email"];
            $szcim = $_POST["szcim"];

            //Megadjuk a hibaüzenet arra vonatkozón, hogy ha nincs kipipálva a checkbox
            $error2 = "Vásárlási feltételek elfogadása kötelező!";

            //Megnézzük, hogy ki vannak-e töltve a mezők, ha nincsenek dobunk egy hibát
            if(empty($nev) || empty($telefon) || empty($email) || empty($szcim)){

                $error1 = "Rendelés leadásához minden mező kitöltése kötelező!";
            }

        }

    ?>

    <div class="container" style="max-width:1200px;">
        <form action="" method="post" class="form-group text-center p-5">

            <p class="text-danger mb-3"><?php  if(!empty($error1)){ echo $error1; }   ?></p>

            <h3 class="mb-3">Rendeléshez szükséges adatok megadása</h3>

            <input type="text" name="nev" placeholder="Teljes név..." class="form-control mb-3">
            <input type="text" name="telefon" placeholder="Telefonszám..." class="form-control mb-3">
            <input type="text" name="email" placeholder="E-mail cím..." class="form-control mb-3">
            <input type="text" name="szcim" placeholder="Szállítási cím (irsz,város,utca,házszám)..." class="form-control mb-3">

            <select name="szmod" class="form-control mb-3">
                <option value="gls">GLS futárral</option>
                <option value="posta-utanvet">Postai utánvéttel</option>
                <option value="szemelyes">Személyes átvétel</option>
            </select>

            <select name="fizmod" class="form-control mb-3">
                <option value="obk">Online bankkártya</option>
                <option value="atutalas">Átutalás</option>
                <option value="szemelyes-futar">Személyesen a futárnak</option>
            </select>

            <p class="text-danger mb-3"><?php  if(!empty($error2)){ echo $error2; }   ?></p>

            <p> <a href="tajekoztato.php">Elfogadom a vásárlási feltételeket</a> </p>
            <input type="checkbox" name="check"> <br>

            <button type="submit" name="megrendel" class="btn btn-success">Rendelés leadása</button>
        </form>
    </div>
</div>

</body>
</html>