<?php
    require "class/sql.php";

    $sql = new Sql();
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
<link rel="stylesheet" href="css/style.css">
<title>Autók megjelenítése</title>
</head>
<body>


<div class="container">
    <div class="row justify-content-center">
        <form class="form-group text-center p-5 bg-dark text-light rounded" method="post">

            <select name="select">
            
            <?php

                $autok = $sql->select();

                foreach($autok as $kulcs => $ertek){

                    echo "
                        <option value='$ertek[0]'>".$ertek[0]."</option>
                    ";
                }

            ?>
            
            </select>
            <button type="submit" name="show" class="btn btn-warning" >Autók megjelenítése</button>
        
        </form>
    </div>
</div>

<?php

    if(isset($_POST["show"])){

        $select = $_POST["select"];

        $auto = $sql->show($select);

        foreach($auto as $kulcs => $ertek){

            ?>
            
                <div class="result mt-5 ml-5 float-left">

                    <div>
                        <img src="img/<?php echo $ertek[5]  ?>" alt="">
                    </div>

                    <div>
                        Azonosító: <?php echo $ertek[0];  ?>
                    </div>

                    <div>
                        Márka: <?php echo $ertek[1];  ?>
                    </div>

                    <div>
                        Típus: <?php echo $ertek[2];  ?>
                    </div>

                    <div>
                        Évjárat: <?php echo $ertek[3];  ?>
                    </div>

                    <div>
                        Ár: <?php echo number_format($ertek[4], 0, ".", ".");  ?> Ft
                    </div>
                
                </div>

            <?php
        }


    }


?>












<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>