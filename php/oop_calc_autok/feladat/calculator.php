<?php


    class Calculator{

        public $szam1;
        public $szam2;

        function __construct($int1, $int2){

            $this->szam1 = $int1;
            $this->szam2 = $int2;
        }

        public function osszeadas(){

            return $this->szam1 + $this->szam2;
        }

        public function kivonas(){

            return $this->szam1 - $this->szam2;
        }

        public function szorzas(){

            return $this->szam1 * $this->szam2;
        }

        public function osztas(){

            return $this->szam1 / $this->szam2;
        }
    }