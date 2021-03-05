<?php

    require "database.php";

    class Sql extends Database{

        //Használom a szülőosztály konstruktorát -> lefuttatom a database osztályon belüli konstruktort -> az attribútumoknak értéket adtam
        public function __construct(){

            parent::__construct();
        }

        //Autók feltöltése adatbázisba
        public function insertCar($marka,$tipus,$evjarat,$ar,$img){

            $con = parent::connect();
            $res = $con->prepare("INSERT INTO auto_info(Marka,Tipus,Evjarat,Ar,img) VALUES(?,?,?,?,?)");
            $res->bindParam(1, $marka);
            $res->bindParam(2, $tipus);
            $res->bindParam(3, $evjarat);
            $res->bindParam(4, $ar);
            $res->bindParam(5, $img);
            $res->execute();

            if(empty($marka) || empty($tipus) || empty($evjarat) || empty($ar) || empty($img)){

                throw new Exception("Minden mező kitöltése kötelező!");
            }

        }


        //Autómárkák megjelenítése a selectben
        public function select(){

            $con = parent::connect();
            $res = $con->prepare("SELECT DISTINCT Marka FROM auto_info");
            $res->execute();

            $autok = $res->fetchAll();

            return $autok;
        }


        //Autók megjelenítése a böngészőben
        public function show($car){

            $con = parent::connect();
            $res = $con->prepare("SELECT * FROM auto_info WHERE Marka=?");
            $res->bindParam(1, $car);
            $res->execute();

            $autok = $res->fetchAll();

            return $autok;

        }


    }