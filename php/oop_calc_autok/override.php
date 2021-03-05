<?php

    final class Osztaly{

        public $valami = "Ez egy teszt szöveg!";

        function kiir(){

            echo $this->valami;
        }
    }

    /*$osztaly = new Osztaly();
    $osztaly->kiir();
    */

    class Alosztaly extends Osztaly{

        public $valami = "Ez egy teszt szöveg de már módosult az alosztályban!";

        function kiir(){

            echo $this->valami;
        }
    }

    $alosztaly = new Alosztaly();
    $alosztaly->kiir();