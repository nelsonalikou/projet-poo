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
        $couleurs = ["Pique","Trèfle","Carreau","Coeur", "Joker"];

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
            throw new Exception("Couleur invalide");
        }
        switch ($couleur){
            case $couleurs[0]:
                $couleur = "♠";
            break;
            case $couleurs[1]:
                $couleur = "♣";
            break;
            case $couleurs[2]:
                $couleur = "♦";
            break;
            case $couleurs[3]:
                $couleur = "♥";
            break;
            case $couleurs[4]:
                $couleur = "*";
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
}