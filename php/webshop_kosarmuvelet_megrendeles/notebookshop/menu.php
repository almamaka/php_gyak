<?php

    if($_SESSION["logged"])
    {


    
?>
<nav>
    <form action="" method="post">
        <a href="index.php">Kezdőoldal</a>
        <a href="termekek.php">Termékek</a>
        <a href="kapcsolat.php">Kapcsolat</a>
        <a href="kereses.php">Keresés</a>
        <a href="kosar.php">Kosár</a>
        <a href="#"> 
            <i class='fas fa-user'></i>
            <?php  echo $_SESSION["user"];  ?> 
        </a>
        <button type="submit" name="logout"> <i class='fas fa-sign-out-alt'></i> </button>
    </form>
</nav>

<?php

    }
    else{

        $_SESSION["user"] = "";
   

?>

<nav>
        <a href="index.php">Kezdőoldal</a>
        <a href="termekek.php">Termékek</a>
        <a href="kapcsolat.php">Kapcsolat</a>
        <a href="kereses.php">Keresés</a>
        <a href="kosar.php">Kosár</a>
        <a href="login.php">Jelentkezz be!</a>
</nav>

<?php

    }

    if(isset($_POST["logout"])){

        unset($_SESSION["logged"]);
        $_SESSION["logged"] = false;
        header("Location: index.php");
    }

?>