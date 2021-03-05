<?php

    //1. feladat: osztáylozó rendszer - adott pnotszámhoz milyen eredmény tartozik pl ha a pont kisebb mnit 10 akkor az elégtelen

    $pont = 50;

    if($pont < 0 || $pont > 50){

        echo "A pontszámnak 0 és 50 között kell lennie!";
    }
    else if($pont < 20){

        echo "Elégséges";
    }
    else if($pont < 30){

        echo "Közepes";
    }
    else if($pont < 40){

        echo "Jó";
    }
    else if($pont < 50){

        echo "Jeles";
    }
    else{

        echo "Gratulálok! Max pontszámot értél el!";
    }

    echo "<br>";

    //2. feladat: melyik hónap milyen évszakban van - legyen egy olyan eset is ami azt vizsgálja, hogy ha nem létező hónap név van a változóban akkor mit írjunk ki

    $honap = "Július";


    switch($honap){

        case "December":
        case "Január":
        case "Február":
            echo "Ez a hónap téli hónap!";
        break;

        case "Március":
        case "Április":
        case "Május":
            echo "Ez a hónap tavaszi hónap!";
        break;

        case "Június":
        case "Július":
        case "Augusztus":
            echo "Ez a hónap nyári hónap!";
        break;

        case "Szeptember":
        case "Október":
        case "November":
            echo "Ez a hónap őszi hónap!";
        break;

        default:
            echo "Nincs ilyen hónap!";
        break;

    }