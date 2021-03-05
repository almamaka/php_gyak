<?php

    //Kiírandó üzeneteknek felvett változók (értékük üres, de később változni fog)
    $error = "";
    $success = "";

    //Ha megnyomom az upload gombot....
    if(isset($_POST["upload"])){

        $nev = $_POST["nev"];
        $email = $_POST["email"];
        $file = $_FILES["file"]["name"];             //File nevének (név+kiterjeztés) eltárolása változóban
        $target = "cv/";                            //Célmappa eltárolása változóban
        $tmp = $_FILES["file"]["tmp_name"];        //Ideiglenes file eltárolása változóban


        $size = $_FILES["file"]["size"];           //File méretének elárolása változóban
        $max_size = 1000000;                       //File max méretének megadása (byte-ban - 1MB)

        
        //File kiterjesztésének vizsgálata - Ha a file kiterjesztése nem png,gif,jpg,jpeg akkor dobunk egy hibaüzentet
        if(!preg_match('/(doc|docx|pdf|txt)$/i', $file)){

            $error = "Hiba! A file kiterjesztése csak doc,docx,pdf vagy txt lehet!";
        }
        //Ha jó a file kiterjesztése akkor...
        else{

            //Megnézzük, hogy a file mérete meghaladja-e a maximum méretet amit megadtunk (2MB)
            if($size > $max_size){

                $error = "Hiba! A file mérete max 1MB lehet!";
            }
            //Ha a file mérete megfelelő...
            else{

                //Ha minden rendben van feltöltjük a filet a célmappába
                move_uploaded_file($tmp, $target.$file);

                $success = "Sikeres feltöltés!";
                
                echo "A név amit beírtál: ".$nev."<br>";
                echo "Az email amit beírtál: ".$email."<br>";
                echo "A file amit feltöltöttél: ".$file."<br>";

            }

        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP file feltöltés</title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="post">
        <p><?php  if(!empty($error)){ echo $error;} ?></p>
        <p><?php  if(!empty($success)){ echo $success;} ?></p>
        <input type="text" name="nev" id="" placeholder="Név..."> <br>
        <input type="email" name="email" id="" placeholder="E-mail..."> <br>
        <input type="file" name="file" id=""> <br>
        <button type="submit" name="upload">Feltölt</button>
    </form>
</body>
</html>