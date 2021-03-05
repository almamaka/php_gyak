<?php

    require "PHPMailer/Exception.php";
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    $msg = "";

    if(isset($_POST["send"])){

        try{

        
            //Emailező szerver beállításainak megadása
            $mail ->isSMTP();
            $mail ->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = $_POST["senderAddress"];
            $mail->Password = $_POST["pwd"];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->Charset = "UTF-8";


            //Levélküldés beállításai
            $mail->setFrom($_POST["senderAddress"]);  //Kitől jön az email
            $mail->addAddress($_POST["address"]);    //Kinek megy az email

            /*
            $mail->addReplyTo("info@pelda.com", "Példa");
            $mail->addCC("cc@pelda.com");
            $mail->addAttachment();
            */


            //Levél tartalmi beállítása
            $mail->isHTML(true);
            $mail->Subject = $_POST["subject"];
            $mail->Body = nl2br($_POST["body"]);


            //Levél elküldése
            $mail->send();
            $msg = "<h4>Levél elküldve!</h4>";
        }
        catch(Exception $e){

            $msg = "<h4>Levélküldés sikertelen</h4> <p>Hiba: ".$mail->ErrorInfo."</p>";
        }

    }





?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <form action="" method="post" class="form-group text-center p-5">

            <h1 class="mb-5">Levélküldés</h1>

            <?php  if(!empty($msg)){echo $msg;}   ?>
            <label for="">Feladó e-mail címe:</label>
            <input type="email" name="senderAddress" class="form-control mb-3">

            <label for="">Feladó neve:</label>
            <input type="text" name="senderName" class="form-control mb-3">

            <label for="">Jelszó:</label>
            <input type="password" name="pwd" class="form-control mb-3">

            <label for="">Címzett:</label>
            <input type="email" name="address" class="form-control mb-3">

            <label for="">Tárgy:</label>
            <input type="text" name="subject" class="form-control mb-3">

            <label for="">Üzenet:</label>
            <textarea name="body" class="form-control mb-3" cols="50" rows="4"></textarea>

            <button type="submit" name="send" class="btn btn-primary">Küldés</button>


        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>