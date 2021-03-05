<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP alapok</title>
</head>
<body>
    <?php

        //VÁltozók létrehozása PHP-ban - a php nem típusos nyelv - változók típusát nem kell előre definiálni

        $szam = 2;                      //Egész szám változó
        $szoveg = "Szia";              //Szöveges változó (karakterlánc)
        $logikai = true;                //vagy false - Boolean - logikai változó
        $lebegopontos = 3.14;           //Nem egész számok (float)


        //Kiiratás PHP-ban -> php-ban a "." az összefűzésnek a jelene
        echo "<h2>Hello, ez itt az első PHP óra!</h2>";
        echo $szoveg;
        print "<h2>".$szam." Tanuló</h2>";

        //Műveletek változókkal
        $szam1 = 10;
        $szam2 = 5;
        $osszead = $szam1 + $szam2;
        $kivon = $szam1 - $szam2;
        $szoroz = $szam1 * $szam2;
        $osztas = $szam1 / $szam2;
        $maradekos_osztas = $szam1 % $szam2;

        echo "A két szám összege: ".$osszead."<br>";
        echo "A két szám kivonása: ".$kivon."<br>";
        echo "A két szám szorzata: ".$szoroz."<br>";
        echo "A két szám osztása: ".$osztas."<br>";
        echo "A két szám maradékos osztása: ".$maradekos_osztas ."<br>";


        //VEZÉRLÉSI SZERKEZETEK

        #If vezérlési szerkezet

        $kor = 16;

        if($kor > 18){

            echo "Felnőtt vagy, ihatsz alkoholt! <br>";
        }
        else if($kor == 17){

            echo "Már csak 1 év és felnőtt leszel, majd akkor ihatsz alkoholt! <br>";

        }
        else{

            echo "Még nem vagy felnőtt, nem ihatsz alkoholt!<br>";
        }


        #Switch - case

        $auto = "audi";

        switch($auto){

            case "Audi" :
            case "audi" :
                echo "Német gyártású autó! <br>";
            break;

            case "Renault" :
                echo "Francia gyártású autó! <br>";
            break;

            case "Toyota" :
                echo "Japán gyártású autó! <br>";
            break;

            case "Ferrari" :
                echo "Olasz gyártású autó! <br>";
            break;

            default :
                echo "Nincs ilyen autó! <br>";
            break;
        }


        //CIKLUSOk

        #while ciklus - előltesztelő ciklus

        $a = 0;

        while($a < 10){
            
            $a++;
            echo "A változó aktuális értéke: ".$a."<br>";
        }

        #do-while - hátultesztelő ciklus

        $b = 0;

        do{

            $b++;
            echo "A változó aktuális értéke: ".$b."<br>";
        }while($b < 10);


        # for ciklus - számláló ciklus

        for($i = 0; $i<10; $i++){

            if($i == 5){

                echo " Öt ";
            }
            else{

                echo $i." ";
            }
        }

        echo "<br>";
        //TÖMBÖK

        $tomb = array("Szöveg", 21, true, 'C', 3.14);
        $hossz = count($tomb);
         /*print_r($tomb);
        echo "<br>";
        var_dump($tomb);*/


        
        #Tömb bejárása for ciklussal
        for($j = 0; $j<$hossz; $j++){

            echo "A tömböm ".($j+1).".eleme: ".$tomb[$j]. "<br>";
        }


        #Tömb bejárása foreach ciklussal
        $emberek = array("Pista", "Klári", "Zsuzsa", "Feri", "Jóska");

        foreach($emberek as $ember){

            echo $ember. " ";
        }









    ?>
</body>
</html>