<?php

//Osztály létrehozása
    class Teszt{

        //Konstruktor létrehozása -> a konstruktor egy olyan metódus ami osztály példányosítása után automatikus lefut (nem kell meghívni)
        function __construct($param){

            echo "Ez a szöveg fog megjelenni: ".$param;
        }
    }


    /*Osztály pédányosítása
    $teszt = new Teszt("valamilyen szöveg");
    */



    class Animal {

        //Metódus felvétele
        function kutya(){

            echo "A kutya az ember legjobb barátja!";
        }
    }

    $animal = new Animal();
    //Metódus meghívása
    $animal -> kutya();
    