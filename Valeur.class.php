<?php
class Valeur{
    private $valeur; // string

    /**
     * Constructeur de la classe Valeur.
     * Affecte à l'attribut $valeur la chaine de caractères ou le nombre mit en paramètre.
     * Si le paramètre est invalide, le constructeur lance une excpetion.
     * 
     * @param $valeur Valeur à attribuer
     */

    public function __construct($valeur) {
        $valeurs = ["As", "Valet", "Dame", "Roi", "Jocker"];

        if (gettype($valeur) == gettype("str")){
            $valeur = ucfirst($valeur);
            $boucle = False;
            $i = 0;
            while ($i < count($valeurs) && $boucle == False){
                if ($valeurs[$i] == $valeur){
                    $boucle = True;
                }
                $i++;
            }

            if ($boucle == False){
                throw new Exception("La valeur n'est pas correcte");
            }
        }else{
            if ($valeur < 2 || $valeur > 10){
                throw new Exception("La valeur n'est pas correcte");
            }
        }

        $this->valeur = (string) $valeur;
    }

    /**
     * Accesseur de $valeur.
     * Retourne la valeur de l'attribut $valeur.
     * 
     * @return $valeur
     */

    public function getValeur() : string{
        return $this->valeur;
    }
}