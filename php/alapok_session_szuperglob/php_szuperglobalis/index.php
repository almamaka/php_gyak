<?php

//KÖSZÖNŐ FELADAT
//Ha megnyomtam a gomb name attribútummal rendelkező html gombot...
 if(isset($_POST["gomb"])){

    //Input mezőből jövő érték eltárolása változóba
    $nev = $_POST["nev"];

    //Név változóban eltárolt érték megjelenítése böngészőben
    echo "<h1>Üdvözöllek az oldalon, ".$nev."!</h1>";
 }


 //OSZTÁLYOZÓ FELADAT
$uzenet = "";

 if(isset($_POST["osztalyoz"])){

    $pont = $_POST["pont"];

    if(empty($pont)){

        $uzenet = "<p style='color: red;'>Adj meg egy pontszámot!</p>";
    }
    else{

        if($pont < 0 || $pont > 50){

            $uzenet = "<p style='color: red;'>A pontszámnak 0 és 50 között kell lennie!</p>";
        }
        else if($pont < 10){

            $uzenet = "Elégtelen";
        }
        else if($pont < 20){

            $uzenet = "Elégséges";
        }
        else if($pont < 30){

            $uzenet = "Közepes";
        }
        else if($pont < 40){

            $uzenet = "Jó";
        }
        else if($pont < 50){

            $uzenet = "Jeles";
        }
        else{

            $uzenet = "Gratulálok! Max pontszámot értél el!";
        }
    }
 }


//ÉVSZAKOS FELADAT

$message = "";

if(isset($_POST["btn"])){

    $honap = $_POST["honap"];

    if(empty($honap)){

        $message = "Kérlek írd be a kedvenc hónapodat!";
    }
    else{

        switch($honap){

            case "December":
            case "Január":
            case "Február":
                $message = "A kedvenc hónapod téli hónap!";
            break;

            case "Március":
            case "Április":
            case "Május":
                $message = "A kedvenc hónapod tavaszi hónap!";
            break;

            case "Június":
            case "Július":
            case "Augusztus":
                $message = "A kedvenc hónapod nyári hónap!";
            break;

            case "Szeptember":
            case "Október":
            case "November":
                $message = "A kedvenc hónapod őszi hónap!";
            break;

            default:
                $message = "Nincs ilyen hónap!";
            break;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Szuperglobális Tömbök</title>
</head>
<body>
    
    <form action="" method="post">
        <input type="text" name="nev" placeholder="Írd be a neved...">
        <button type="submit" name="gomb">Köszön</button>
    </form>


    <form action="" method="post">
        
        <h3>
            <?php
                if(!empty($uzenet)){

                    echo $uzenet;
                }
            ?>
        </h3>

        <label for="">Írd be a pontszámod:</label>
        <input type="text" name="pont">
        <button type="submit" name="osztalyoz">Osztályoz</button>
    </form>



    <form action="" method="post">
        <p style='color: blue;'>
            <?php
                if(!empty($message)){

                    echo $message;
                }
            ?>
        </p>
        <label for="">Írd be a kedvenc hónapod, megmutatom melyik évszakban van:</label>
        <input type="text" name="honap">
        <button type="submit" name="btn">Mutasd</button>
    </form>


</body>
</html>