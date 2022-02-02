<?php

class Aihe {
    // Aiheen ominaisuudet
    public $aiheennimi = "";
    public $viesti = "";
    public $aika = "";
    public $kirjoittaja = "";

    //Konstruktori
    function __construct($aiheennimi, $viesti, $aika, $kirjoittaja)
    {
        $this->aiheennimi = $aiheennimi;
        $this->viesti = $viesti;
        $this->aika = $aika;
        $this->kirjoittaja = $kirjoittaja;
    }

    //function ajanKohtaSuomi() {
       // $dt = new DateTime($this->aika);
        //return $dt->format("d.m.Y k\l\o H:i");
    //}


}

?>