<?php

    

    class Login{

        public $sql;

        public function __construct(){

            $this->sql = new Sql();
        }

        public function login($username,$pwd){

            $pwd = sha1($pwd);
            $login = $this->sql->login($username,$pwd);

            //Ha lefut a bejelentkezéshez szükséges metódus
            if($login){

                //Akkor felveszünk session változókat amik arra szolgálnak, hogy a logged.php oldalon ki tudjuk írni a bejelentkezett felhasználó nevét és átugrunk a logged.php oldalra
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $username;
                header("Location: logged.php");
            }
            //Ha probléma lenne a bejelentkezés során, dobunk egy hibát
            else{

                throw new Exception("Hibás belépési adat(ok)!");
            }
        }
    }