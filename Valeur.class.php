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
        $valeurs = ["As", "Valet", "Dame", "Roi", "Joker"];

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
                throw new InvalidArgumentException("La valeur n'est pas correcte");
            }
        }else{
            if ((int)$valeur < 2 || (int)$valeur > 10){
                throw new InvalidArgumentException("La valeur n'est pas correcte");
            }
        }

        $this->valeur = (string)(int)$valeur;
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
    
        public function toString():string{    
        $symboles = ["As"=>"A", "Valet"=>"V", "Dame"=>"D", "Roi"=>"R", "Joker"=>"\e[32;47m*\e[0m"];
        return $symboles[$couleur];
    }
    
    }
