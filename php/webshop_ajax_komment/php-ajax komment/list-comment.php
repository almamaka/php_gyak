<?php

    require "connection.php";

    $con = mysqli_connect(host,user,pwd,dbname);
    mysqli_query($con,"SET NAMES utf-8");

    $sql = "SELECT * FROM comments ORDER BY id DESC LIMIT 3";

    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_object($result)){

        ?>

            <div class="col-7">
                <h3><?php  echo $row->name;  ?></h3>
                <small>Dátum: <?php  echo $row->date; ?></small>
            </div>

            <hr>

            <div class="col-7">
                <p><?php  echo $row->comment;  ?></p>
            </div>

        <?php
    }