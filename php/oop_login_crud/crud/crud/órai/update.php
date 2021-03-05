<?php

    require "class/sql.php";

    $sql = new SQL();

    if(isset($_GET["id"])){

        $id = $_GET["id"];
    }

    if(isset($_POST["update"])){

        $username = $_POST["username"];
        $pwd = $_POST["pwd"];
        $email = $_POST["email"];

        try{

            $sql->update($username,$pwd,$email,$id);
            header("Refresh:3; url=index.php", true, 303);
        }
        catch(Exception $e){

            echo $e->getMessage();
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
<title>Title</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <form class="form-group text-center p-5" method="post">

                <h1>Adatok módosítása</h1>

                <?php

                    $data = $sql->selected_data($id);

                    foreach($data as $kulcs => $ertek){

                        echo "

                            <label>Felhasználónév</label>
                            <input type='text' name='username' value=".$ertek[0]." class='form-control mb-3' />

                            <label>Jelszó</label>
                            <input type='text' name='pwd' value=".$ertek[1]." class='form-control mb-3' />

                            <label>E-mail cím</label>
                            <input type='text' name='email' value=".$ertek[2]." class='form-control mb-3' />

                            <button type='submit' name='update' class='btn btn-primary'>Módosít</button>
                        
                        ";
                    }
                ?>

            </form>
        </div>
    </div>

</body>
</html>