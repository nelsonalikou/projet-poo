<?php

declare(strict_types = 1);

# ALIKOU DONGMO Nelson & GRAVE Ewan & VANNIER Alexandre

class Couleur
{

    Private $couleur; // string

    /**
     * Constructeur de la classe Couleur.
     * Affecte à l'attribut $couleur la chaine de caractères mise en paramètre.
     * Si la couleur ne convient pas, le constructeur lance une exception.
     * 
     * @param $couleur
     */

    Public function __construct (string $couleur) 
    {
        $couleurs = ["Pique","Trefle","Carreau","Coeur", "Joker"];

        $couleur = ucfirst($couleur);
        $i = 0;
        $boucle = True;
        while ($i < count($couleurs) && $boucle){
            if ($couleur == $couleurs[$i]){
                $boucle = False;
            }
            $i++;
        }

        if ($boucle){
            throw new InvalidArgumentException("Couleur invalide");
        }
        
         $this->couleur = $couleur;
    }

    /**
     * L'accesseur de l'attribut $couleur retourne la valeur de cet attribut.
     * 
     * @return $couleur
     */

    public function getCouleur() : string{
        return $this->couleur;
    }
    
    public function __toString():string{
        $symboles = ["Pique"=>"\e[30;47m♠\e[0m","Trefle"=>"\e[30;47m♣\e[0m","Carreau"=>"\e[31;47m♦\e[0m","Coeur"=>"\e[31;47m♥\e[0m", "Joker"=>"\e[32;47m*\e[0m"];
        return $symboles[$this->couleur];
    }
    
    
}
