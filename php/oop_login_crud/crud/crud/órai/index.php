<?php

    require "class/sql.php";

    $sql = new SQL();


    if(isset($_GET["id"]) && isset($_GET["action"])){

        $id = $_GET["id"];
        $action = $_GET["action"];

        switch($action){

            case "delete":
                $sql->delete($id);
            break;
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
        
            <table class="table table-dark table-striped text-center">

                <tr>
                    <th>ID</th>
                    <th>Felhasználónév</th>
                    <th>Jelszó</th>
                    <th>E-mail cím</th>
                    <th>Műveletek</th>
                </tr>

                <?php

                    $data = $sql->show();

                    foreach($data as $kulcs => $ertek){

                        echo "
                        
                            <tr>
                                <td>".$ertek[0]."</td>
                                <td>".$ertek[1]."</td>
                                <td>".$ertek[2]."</td>
                                <td>".$ertek[3]."</td>
                                <td>
                                    <a href='?id=$ertek[0]&action=delete'> <i class='fa fa-trash text-white'></i> </a>
                                    <a href='update.php?id=$ertek[0]&action=update'> <i class='fa fa-pen text-white'></i> </a>
                                </td>
                            </tr>
                        ";
                    }

                ?>

            </table>

        </div>
    </div>

</body>
</html>