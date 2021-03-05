<?php

    class Calculator{

        //Osztály attribútumainak felvétele -> két input mező értéke
        public $input1;
        public $input2;

        //Osztály metódusa -> első szám bekérése input mezőből
        public function setInput1($int){

            $this->input1 = $int;
        }

        //Osztály metódusa -> második szám bekérése input mezőből
        public function setInput2($int){

            $this->input2 = $int;
        }

        //Osztály metódusa -> két bekért szám összeadása
        public function sum(){

            return $this->input1 + $this->input2;
        }
    }