<?php

    //MEGLÉVŐ KÉP SZÖVEGEZÉSE PHPVAL

    //Képem eltárolása
    $output = "img/spider2.jpg";


    //Kép létrehozása meglévő képből
    $image = imagecreatefromjpeg("img/spider.jpg");


    //Képem betűszíne
    $black = imagecolorallocate($image, 0,0,0);

    //Képre írt szöveg betűtípusa
    $font = dirname(__FILE__)."/font/SEASRN.ttf";

    //Képre írt szöveg megadása
    $text = "Legjobb PHP óra a világon!";


    //Szöveg elhelyezezése a képen - melyik képre, milyen betűmérettel, milyen elforgással, milyen pozícióban(left-top), milyen betűszínnel, milyen betűtípussal, milyen szöveggel
    imagettftext($image, 30, 0, 10,100, $black, $font, $text);

    //Kép véglegesítése az $output változóba
    imagejpeg($image, $output);

    //Kép megjelenítése a böngészőben
    echo "<img src='$output' alt='' title='' />";

