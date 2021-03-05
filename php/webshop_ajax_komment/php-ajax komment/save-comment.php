<?php

    require "connection.php";

    $con = mysqli_connect(host,user,pwd,dbname);
    mysqli_query($con, "SET NAMES utf8");

    $name = $_POST["name"];
    $comment = $_POST["comment"];

    $sql = "INSERT INTO comments(name,comment) VALUES('$name', '$comment')";

    mysqli_query($con, $sql);