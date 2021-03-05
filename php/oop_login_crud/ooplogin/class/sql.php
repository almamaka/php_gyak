<?php

    require "database.php";

    class Sql extends Database {

        public function __construct(){

            parent::__construct();
        }

        //Regisztrációhoz szükséges metódus
        public function regin($username, $pwd){

            $con = parent::connect();
            $res = $con -> prepare("INSERT INTO adatok(username,pwd) VALUES(?,?)");
            $res->bindParam(1, $username);
            $res->bindParam(2, $pwd);
            $res->execute();

            
        }

        //Bejelentkezéshez szükséges metódus
        public function login($username, $pwd){

            $con = parent::connect();
            $res = $con->prepare("SELECT username,pwd FROM adatok WHERE username=? AND pwd=?");
            $res->bindParam(1, $username);
            $res->bindParam(2, $pwd);
            $res->execute();

            $eredmeny = $res->fetchAll();

            return $eredmeny;

           
        }


        //Leellenőrizzük, hogy van-e már ilyen felhasználónév regisztrálva
        public function check($username){

            $con = parent::connect();
            $res = $con->prepare("SELECT username,pwd FROM adatok WHERE username=?");
            $res->bindParam(1, $username);
            $res->execute();

            $eredmeny = $res->fetchAll();

            return $eredmeny;
        }
    }