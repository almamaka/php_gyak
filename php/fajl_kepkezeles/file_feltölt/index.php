<?php

    //Kiírandó üzeneteknek felvett változók (értékük üres, de később változni fog)
    $error = "";
    $success = "";

    //Ha megnyomom az upload gombot....
    if(isset($_POST["upload"])){

        $file = $_FILES["file"]["name"];             //File nevének (név+kiterjeztés) eltárolása változóban
        $target = "upload/";                       //Célmappa eltárolása változóban
        $tmp = $_FILES["file"]["tmp_name"];        //Ideiglenes file eltárolása változóban


        $size = $_FILES["file"]["size"];           //File méretének elárolása változóban
        $max_size = 2000000;                       //File max méretének megadása (byte-ban - 2MB)

        
        //File kiterjesztésének vizsgálata - Ha a file kiterjesztése nem png,gif,jpg,jpeg akkor dobunk egy hibaüzentet
        if(!preg_match('/(png|jpg|jpeg|gif)$/i', $file)){

            $error = "Hiba! A file kiterjesztése csak png,jpg,jpeg vagy gif lehet!";
        }
        //Ha jó a file kiterjesztése akkor...
        else{

            //Megnézzük, hogy a file mérete meghaladja-e a maximum méretet amit megadtunk (2MB)
            if($size > $max_size){

                $error = "Hiba! A file mérete max 2MB lehet!";
            }
            //Ha a file mérete megfelelő...
            else{

                //Ha minden rendben van feltöltjük a filet a célmappába
                move_uploaded_file($tmp, $target.$file);

                $success = "Sikeres feltöltés!";

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
        <input type="file" name="file" id="">
        <button type="submit" name="upload">Feltölt</button>
    </form>
</body>
</html>