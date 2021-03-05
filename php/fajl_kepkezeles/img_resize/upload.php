<?php

//EREDETI KÉP FELTÖLTÉSE

//Eltárolom változóba az ideiglenes filet
$file_name = $_FILES["file"]["tmp_name"];

//Célmappa felvétele teljes eléri úttal (eredeti file)
$target = "img/".$_FILES["file"]["name"];

//Eredeti file feltöltése az img mappába
move_uploaded_file($file_name, $target);


//MÓDOSÍTOTT KÉP SZERKESZTÉSE ÉS FELTÖLTÉSE


//Eredeti kép eltárolása változóban későbbi munkára
$original_img = $target;

//Eredeti képből csinálok egy másolatot, hogy a módosítások ezen a másolaton történjenek meg
$new_img = imagecreatefromjpeg($original_img);


//Eredeti képem szélességének és magasságának eltárolása változókban
list($width, $height) = getimagesize($original_img);


//Új képem szélességének és magasságának megadása
$new_width = $width * 0.50;   // vagy megadok egy fix értéket pl 500 (px);
$new_height = $height * 0.50;   // vagy megadok egy fix értéket pl 500 (px);


//Létrehozok egy változót a módosított kép eltárolására és megjelenítésére
$small = "img/small_".$_FILES["file"]["name"];


//Új méretek utáni felesleges keret eltüntetése
$truecolor = imagecreatetruecolor($new_width, $new_height);


//Ez a függvény fogja lefuttatni az össztes módosítást amit fentebb megírtunk
imagecopyresampled($truecolor, $new_img, 0,0,0,0, $new_width, $new_height, $width, $height);

//Új kép megalkotása és minőségének beállítása
imagejpeg($truecolor, $small, 90);


//Kép megjelenítése a böngészőben
echo "<img src='$small' alt='' title='' />";


