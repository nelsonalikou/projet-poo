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

    public function __construct(string $valeur, string $couleur, int $ordre = 0)
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

    /**
    * Accesseur à l'ordre de la carte.  Retourne l'ordre de la carte parmi toutes les autres
    * sous forme d'une chaine de caractères.
    *
    * @return Symbole de la carte
    */

     public function getSymboleValeur() : string {
        return $this->valeur->__toString();
    }

    /**
    * Accesseur à l'ordre de la carte.  Retourne l'ordre de la carte parmi toutes les autres
    * sous forme d'une chaine de caractères.
    *
    * @return Couleur_du_symbole de la carte
    */

     public function getSymboleCouleur() : string {
        return $this->couleur->__toString();
    }

    /**
    * Accesseur à l'ordre de la carte.  Retourne l'ordre de la carte parmi toutes les autres
    * sous forme d'une chaine de caractères.
    *
    * @return Couleur de la carte
    */

     public function getCouleur() : string {
        return $this->couleur->getCouleur();
    }

    /**
    * Fonction test. Test si la carte est un Joker.
    *
    * @return True si la carte est un joker, False sinon
    */

    public function isJoker () : bool{
        return $this->valeur->getValeur()=="Joker";
    }

    /**
     * Fonction d'affichage. Permet de faire un affichage d'une carte.
     * Ne prend pas de paramètres
     *
     * @return affichage
     */


    public function __toString() : string
    {
        $coul = $this->couleur->__tostring(); # couleur récupérée de la classe couleur
        $val = $this->valeur->__toString();  # Valeur récupéreée de la classe valeur
        if ($coul == "\e[31;47m♦\e[0m" || $coul == "\e[31;47m♥\e[0m"){
            $res = "\n" ;
            if ($this->valeur->getValeur() == 10){
                $res = $res ." \e[47m\e[31;47m$val\e[0m\e[0m"."\e[47m   \e[0m"."\n";
            }
            else{
                $res = $res ." \e[47m \e[31;47m$val\e[0m\e[0m"."\e[47m   \e[0m"."\n";
            }
            $res = $res ." \e[47m     \e[0m"."\n" ;
            $res = $res ." \e[47m   $coul\e[0m"."\e[47m \e[0m"."\n";
        }else if ($coul == "\e[30;47m♠\e[0m" || $coul == "\e[30;47m♣\e[0m") {
            $res = "\n" ;
            if ($this->valeur->getValeur() == 10){
                $res = $res ." \e[47m\e[30;47m$val\e[0m\e[0m"."\e[47m   \e[0m"."\n";
            }
            else{
                $res = $res ." \e[47m \e[30;47m$val\e[0m\e[0m"."\e[47m   \e[0m"."\n";
            }
            $res = $res ." \e[47m     \e[0m"."\n" ;
            $res = $res ." \e[47m   $coul\e[0m"."\e[47m \e[0m"."\n";
        }else {
        $res = "\n" ;
            if ($this->valeur->getValeur() == 10){
                $res = $res ." \e[47m\e[32;47m$val\e[0m\e[0m"."\e[47m   \e[0m"."\n";
            }
            else{
            $res = $res ." \e[47m \e[32;47m$val\e[0m\e[0m"."\e[47m   \e[0m"."\n";
            }
        $res = $res ." \e[47m     \e[0m"."\n" ;
        $res = $res ." \e[47m   $coul\e[0m"."\e[47m \e[0m"."\n";
    }

        /*$res = "\n" ;
        $res = $res ." \e[47m {$this->valeur->__toString()}\e[0m"."\e[47m   \e[0m"."\n";
        $res = $res ." \e[47m     \e[0m"."\n" ;
        $res = $res ." \e[47m   {$this->couleur->__tostring()}\e[0m"."\e[47m \e[0m"."\n";*/
        return $res;
    }

    public function getValeur() : string {
        return $this->valeur->getValeur();
    }
}
