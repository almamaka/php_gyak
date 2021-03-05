<?php

    //EGYSZÍNŰ KÉP LÉTREHOZÁSA PHPVAL ÉS SZÖVEGEZÉSE

    //Képem eltárolása
    $output = "img/image1.jpg";

    //Megadom a képem szélességét és magasságát (px-ben)
    $width = 500;
    $height = 500;

    //Kép létrehozása megadott szélesség és magasság alapján
    $image = imagecreate($width, $height);


    //Képem háttérszíne
    $black = imagecolorallocate($image, 0,0,0);

    //Képem betűszíne
    $white = imagecolorallocate($image, 255,255,255);

    //Képre írt szöveg betűtípusa
    $font = dirname(__FILE__)."/font/SEASRN.ttf";

    //Képre írt szöveg megadása
    $text = "Legjobb PHP óra a világon!";


    //Szöveg elhelyezezése a képen - melyik képre, milyen betűmérettel, milyen elforgással, milyen pozícióban(left-top), milyen betűszínnel, milyen betűtípussal, milyen szöveggel
    imagettftext($image, 20, 0, 30,200, $white, $font, $text);

    //Kép véglegesítése az $output változóba
    imagejpeg($image, $output);

    //Kép megjelenítése a böngészőben
    echo "<img src='$output' alt='' title='' />";

