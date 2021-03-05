<?php

    class Database{

        //Adatbázis kapcsolódáshoz szükséges attribútumok felvétele
        public $host;
        public $user;
        public $pwd;
        public $dbname;

        //Létrehozzuk a konstruktort ami értéket ad az attribútumoknak
        public function __construct(){

            $this->host = "localhost";
            $this->user = "root";
            $this->pwd = "";
            $this->dbname = "autok";
        }

        //Létrehozzuk az adatbázis kapcsolódásért felelős metódust
        public function connect(){

            $con = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pwd);
            $con->exec("SET NAMES utf8");

            return $con;
        }
    }