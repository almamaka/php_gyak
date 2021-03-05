<?php


class Access{

    public $nyilvanos = "Nyilvános";
    private $privat = "Privát";
    protected $vedett = "Védett";

    public function valtozok(){

        $this->nyilvanos = $nyilvanos;
        $this->privat = $privat;
        $this->vedett = $vedett;
    }

}

$access = new Access();
echo $access->nyilvanos;
//echo $access->privat;
echo $access->vedett;