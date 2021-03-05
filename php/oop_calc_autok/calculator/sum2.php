<?php

    class Calculator2{

        public $input1;
        public $input2;

        public function __construct($num1, $num2){

            $this->input1 = $num1; //Első inputból jövő érték
            $this->input2 = $num2; //Második inputból jövő érték
        }

        public function osszead(){

            return $this->input1 + $this->input2;
        }


    }