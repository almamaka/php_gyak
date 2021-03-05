<?php

//Ha a cookie szuperglobális tömbben eltárolt adatok száma nagyobb mint 0
    if(count($_COOKIE) > 0){

        //Akkor irassuk ki a böngészőben hány adat van eltárolva benne
        echo "Ennyi adat van eltárolva cookie-ban: ".count($_COOKIE). "<br>";
    }
    else{

        echo "Nincs eltárolva adat cookie-ban";
    }

    //Cookie-ban eltárolt adat megjelenítése - ha van eltárolva "username" nevű cookie a cookie szuperglobális tömbben
    if(isset($_COOKIE["username"])){
        
        //Akkor irassuk ki
        echo "Felhasználónév: ".$_COOKIE["username"]." be lett állítva <br>";
    }


    //Cookie törlése - ugyanaz mint a beállítása, csak a végén az időt minuszba rakjuk
    setcookie("username","teszt_oktató", time() - 3600);