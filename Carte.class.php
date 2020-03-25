<?php

declare(strict_types = 1);


require_once "Couleur.class.php";
require_once "Valeur.class.php";

Class Carte
{
  Private $ordre; //int


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
        $res = sprintf("%9s","--------")."\n" ;
        $res = $res ."|".sprintf("%9s","|")."\n" ;
        $res = $res .'|'.sprintf("%13s",$this->valeur) .sprintf("%5s","|")."\n";
        $res = $res ."|".sprintf("%9s","|")."\n" ;
        $res = $res ."|".sprintf("%17s",$this->couleur).sprintf("%3s","|")."\n";
        $res = $res ."|".sprintf("%9s","|")."\n" ;
        $res = $res .sprintf("%9s","--------") ;
        return $res;
    }
}
