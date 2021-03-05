<?php

    //Osztály létrehozása
    class User{

        //Az osztály attribútumai (osztályváltozók)
        public $nev;
        public $szulev;

        //Osztály konstruktorának létrehozása az attribútumok értékadása végett
        public function __construct($nev, $szulev){

            $this->nev = $nev; //Szabó Péter
            $this->szulev = $szulev; //1992
        }

        //Az osztály metódusai:
        public function koszon(){

            return "Szia ".$this->nev."!";
        }

        public function kor(){

            return $this->nev." kora: ".(intval(date("Y")) - $this->szulev)." év.";
        }

        public function viszlat(){

            return "Viszlát ".$this->nev."!";
        }
    }


    /*Osztály példányosítása
    $user = new User("Szabó Péter", 1992);
    //Metódusok meghívása
    echo $user->koszon()."<br>";
    echo $user->kor()."<br>";
    echo $user->viszlat();
    */

    //AdminUser osztály örököltetése a User osztályból
    class AdminUser extends User{

        public $password;

        public function __construct($nev,$szulev,$password){
            //A fő osztályom (User) konstruktorát leffutatom az alosztályom(AdminUser) konstruktorában
            parent::__construct($nev, $szulev);
            $this->password = $password;

        }

         //Alosztályom metódusa
         public function pwd($user_pwd){

            return $user_pwd == $this->password;
        }

    }

    $admin = new AdminUser("Szabó Péter", 1992, "123456");
    echo $admin->koszon()."<br>";
    echo $admin->pwd("123456") ? "Helyes jelszó! <br>" : "Rossz jelszó! <br>";
    echo $admin->viszlat();