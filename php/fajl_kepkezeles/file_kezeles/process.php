<?php

    //Beírás függvénéynek megírása
    function beir($file, $adat){

        //File megnyitása írásra
        $fo = fopen($file, "a");

        //Fileba írás és a sor végére sortörés
        fwrite($fo, $adat."\r\n");

        //File bezárása
        fclose($fo);
    }


    //Ellenőrző függvény megírása - van-e már ilyen adat a fileban
    function ellenoriz($file, $adat){

        $hiba = false;

        //File megnyitása olvasásra
        $fo = fopen($file, "r");

        //Amíg nincs vége a file beolvasásának (amíg van benne adat)
        while(!feof($fo)){

            //Minden ciklusfutáskor az aktális adatot (sort) eltárolom egy változóba
            $sor = fgets($fo);

            //Megnézzükk, hogy a sor változóban eltárolt adat (fileban eddig eltárolt adatok közül valamelyik) megyegyezik-e azzal amit éppen be akrok írni a fileba (input mezőből jövő adat lesz)
            if(trim($sor) == $adat){

                //Ha van egyezés, akkor a hiba változó értékét átállítjuk true-ra
                $hiba = true;
            }
        }

        //Ha a $hiba változó értéke false -> nincs egyezés az adatok között -> megtörténhet a beírás
        //Ha a $hiba változó értéke true -> van egyezés az adatok között -> nem történhet meg a beírás
        return $hiba;
    }



    //Módosítás függvényének megírása
    function modosit($file, $adat, $ujadat){

        //EREDETI file megnyitása olvasásra
        $fo = fopen($file, "r");
        //IDEIGNLENES file megnyitása írása
        $fo2 = fopen($file."_tmp", "w");

        while(!feof($fo)){

            $sor = fgets($fo);

            if(trim($sor) != $adat){

                fwrite($fo2, $sor);
            }
            else{

                fwrite($fo2, $ujadat."\r\n");
            }
        }
        //Eredeti file bezárása
        fclose($fo);
        //Ideiglenes file bezárása
        fclose($fo2);
        //Ürítem az eredeti file tartalmát
        unlink($file);
        //Átnevezem az ideiglenes file-t az eredeti filera
        rename($file."_tmp", $file);
    }


    //Törlés függvény megírása
    function torol($file, $adat){

        $fo = fopen($file, "r");
        $fo2 = fopen($file."_tmp", "w");

        while(!feof($fo)){

            $sor = fgets($fo);

            if(trim($sor) != $adat){

                fwrite($fo2, $sor);
            }
        }
        fclose($fo);
        fclose($fo2);
        unlink($file);
        rename($file."_tmp", $file);

    }














    //Beírás lekezelésének megírása
    if(isset($_POST["beir"])){

        $adat = $_POST["adat"];

        if(empty($adat)){

            echo "A beíráshoz a mező kitöltése kötelező!";
        }
        //Ha az ellenoriz függvény visszatérési értéke false (NINCS egyezés aközött ami a fileban van és aközött amit be akarok írni)
        else if(!ellenoriz("user.txt", $adat)){

            //Akkor meghívjuk a beír függvényünket -> beírunk a fileba
            beir("user.txt", $adat);
            //Visszairányítjuk a felhasználót az index.php oldalra
            header("Location: index.php");

        }
        //Ha az ellenoriz függvény visszatérési értéke true (VAN egyezés aközött ami a fileban van és aközött amit be akarok írni)
        else{

            //Kiírunk egy hibaüzentet
            echo "Nem sikerült a beírás, az adat már létezik!";
        }
    }



    //Módosítás lekezelésének megírása
    if(isset($_POST["modosit"])){

        $adat = $_POST["adat"];
        $ujadat = $_POST["ujadat"];

        if(empty($adat) || empty($ujadat)){

            echo "A módosításhoz mindkét mező kitöltése kötelező!";
        }
         //Ha az ellenoriz függvény visszatérési értéke true (VAN egyezés aközött ami a fileban van és aközött amit be akarok írni) -> tudom módosítani az adatot
        else if(ellenoriz("user.txt", $adat)){
            //Meghívom a módosítás függvényét -> módosítom az adatokat
            modosit("user.txt", $adat, $ujadat);
            //Visszairányítjuk a felhasználót az index.php-ra
            header("Location: index.php");
        }
        //Ha az ellenoriz függvény visszatérési értéke false (NNICS egyezés aközött ami a fileban van és aközött amit be akarok írni) -> nincs olyan adat amit  módosítani szeretnénk
        else{

            echo "Hiba a módosítás során. Nincs olyan adat amit módosítani szeretne!";
        }
    }


    //Törlés lekezelésének megírása
    if(isset($_POST["torol"])){

        $ujadat = $_POST["ujadat"];

        if(empty($ujadat)){

            echo "A törléshez a mező kitöltése kötelező!";
        }
        else if(ellenoriz("user.txt", $ujadat)){

            torol("user.txt", $ujadat);
            header("Location: index.php");
        }
        else{

            echo "Hiba a törlés során. Nincs olyan adat amit törölni szeretne!";
        }
    }