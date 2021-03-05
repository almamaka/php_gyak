<?php

    require "sql.php";

    class Reg {

        public $sql;
        public $success;

        public function __construct(){

            $this->sql = new Sql();
        }

        public function registration($username, $pwd){

            $check = $this->sql->check($username);

            //Ha nincs ilyen felhasználónév regisztrválva az adatbázisba
            if(!$check){

                //Ellenőrizzük a jelszó hosszát -> ha a jelszó hossza 6 vagy annál több karakter
                if(strlen($pwd) >= 6){

                    //Akkor sha1 kódoljuk a jelszót
                    $pwd = sha1($pwd);

                    //Majd lefuttatjuk az sql osztályon belüli regin metódust -> beregisztráljuk a felhasználót
                    $this->sql->regin($username,$pwd);

                    $this->success = "Sikeres regisztráció!";
                }
                //Ha a jelszó hossza kevesebb mint 6 karakter
                else{

                    throw new Exception("Jelszó hossza min. 6 karakter legyen!");
                }

            }
            //Ha van már ilyen névvel regisztrálva felhasználó
            else{

                throw new Exception("Létező felhasználónév!");
            }
        }

    }