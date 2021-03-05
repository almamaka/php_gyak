<?php

session_start();

    echo "Az általad beírt név: ".$_SESSION["nev"]."<br>";
    echo "Az általad beírt email: ".$_SESSION["email"]."<br>";
    echo "Az általad beírt üzenet: ".$_SESSION["uzenet"]."<br>";