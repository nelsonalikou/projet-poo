<?php

declare(strict_types = 1);

require_once "Couleur.class.php";
require_once "Valeur.class.php";

Class Carte
{
    Private $ordre; //int
    private $couleur; // Couleur
    private $valeur; // Valeur

    /**
     * Constructeur de la classe Card. Ce constructeur permet de créer
    * une carte possedant une valeur, une couleur et un ordre.
    * Par défaut la valeur et couleur sont des chaines vides et l'ordre est 0
    *
    * @param $valeur valeur de la carte
    * @param $couleur couleur de la carte
    * @param $ordre ordre de la carte
    */

    public function __construct( String $valeur = "" , String $couleur = "", int $ordre = 0)
    {
        $this->valeur = $valeur;
        $this->couleur = $couleur;
        $this->ordre = $ordre;
    }

    /**
    * Accesseur à l'ordre de la carte.  Retourne l'ordre de la carte parmi toutes les autres
    * sous forme d'une chaine de caractères.
    *
    * @return Ordre de la carte
    */

    public function getOrdre() : int
    {
        return $this->ordre;
    }


    public function __toString() : string
    {
        if ($this->couleur == "♦" || $this->couleur == "♥"){
            $couleur = "\e[31m".$this->couleur."\e[0m";
            $valeur = "\e[31m".$this->valeur."\e[0m";
        }else if ($this->couleur == "♣" || $this->couleur == "♠"){
            $couleur = "\e[30m".$this->couleur."\e[0m";
            $valeur = "\e[30m".$this->valeur."\e[0m";
        }else{
            $couleur = "\e[32m".$this->couleur."\e[0m";
            $valeur = "\e[32m".$this->valeur."\e[0m";
        }

        $res = "\n" ;
        $res = $res ." \e[47m $valeur\e[0m"."\e[47m   \e[0m"."\n";
        $res = $res ." \e[47m     \e[0m"."\n" ;
        $res = $res ." \e[47m   $couleur\e[0m"."\e[47m \e[0m"."\n";
        return $res;
    }
}
