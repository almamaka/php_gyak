<?php
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    if(isset($_POST['send'])) {

        $pwd = "654321";
        $reset = $_POST["reset"];

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_POST['reset'];
            $mail->Password = "";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->CharSet = 'UTF-8';
        
            //Recipients
            $mail->setFrom("reset@gmail.com", "Reset");
            $mail->addAddress("reset@gmail.com");
            

            /*
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
            */

            
        
            // Content
            $mail->isHTML(true);
            $mail->Subject = "Jelszó frissítés";
            $mail->Body = nl2br("Az új jelszavad: ".sha1($pwd));
        
            $mail->send();
            $msg = "<h3>Levél sikeresen elküldve!</h3>";

            $con = mysqli_connect("localhost", "root", "", "webshop");
            mysqli_query($con, "SET NAMES utf8");

            $sql = "UPDATE adatok SET pwd=sha1('$pwd') WHERE email='$reset'";

            mysqli_query($con, $sql);


        } catch (Exception $e) {
           $msg = " <h3>Levélküldés sikertelen!</h3> <p>Üzenet: ".$mail->ErrorInfo."</p> ";
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

<div class="container" style="max-width: 500px;">

    <p class="text-success mb-3"> <?php  if(!empty($msg)){echo $msg;}  ?></p>
<form action="" method="post">
    <h2>Add meg az e-mail címed és küldjük az új jelszót!</h2>
    <input type="text" name="reset" class="form-control mb-2" placeholder="E-mail cím...">
    <button type="submit" name="send" class="btn btn-primary btn-lg">Küldés</button>
</form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>