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

    public function __construct( $valeur, string $couleur, int $ordre = 0)
    {
        $this->valeur = new Valeur($valeur);
        $this->couleur = new Couleur($couleur);
        $this->ordre = $ordre;

        if(!($this->valeur->getValeur()=="Joker" && $this->couleur->getCouleur()=="Joker" || $this->valeur->getValeur()!="Joker" && $this->couleur->getCouleur()!="Joker"))
            throw new InvalidArgumentException ("Carte invalide");
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


     public function getSymboleValeur() : string {
        return $this->valeur->__toString();
    }

     public function getSymboleCouleur() : string {
        return $this->couleur->__toString();
    }

     public function getCouleur() : string {
        return $this->couleur->getCouleur();
    }

    public function isJoker () : bool{
        return $this->valeur->getValeur()=="Jocker";
    }

    public function __toString() : string
    {
        $valeur = $this->valeur->getValeur();
        $couleur = $this->couleur->getCouleur();
        if ($couleur == "♦" || $couleur == "♥"){
            $couleur = "\e[31m".$couleur."\e[0m";
            $valeur = "\e[31m".$valeur."\e[0m";
        }else if ($couleur == "♣" || $couleur == "♠"){
            $couleur = "\e[30m".$couleur."\e[0m";
            $valeur = "\e[30m".$valeur."\e[0m";
        }else{
            $couleur = "\e[32m".$couleur."\e[0m";
            $valeur = "\e[32m".$valeur."\e[0m";
        }

        $res = "\n" ;
        $res = $res ." \e[47m {$this->valeur->__toString()}\e[0m"."\e[47m   \e[0m"."\n";
        $res = $res ." \e[47m     \e[0m"."\n" ;
        $res = $res ." \e[47m   {$this->couleur->__tostring()}\e[0m"."\e[47m \e[0m"."\n";
        return $res;
    }
}
