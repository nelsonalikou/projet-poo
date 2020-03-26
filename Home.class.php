<?php

require_once("Pile.class.php");
require_once("Deck.class.php");
require_once("Table.class.php");

class Home{
    private $home; // Array

    /**
     * Constructeur de la classe Home.
     * Attribut à l'attribut home la liste de carte mise en paramètre contenant une carte.
     * 
     * @param $home Liste contenant une seule carte
     */

<<<<<<< HEAD
    public function __construct(Pile  $Pile){
        if ($Pile->getNbCartes() < 1){
            throw new Exception("Indice invalide");}
        $this->Home[] = $Pile->getCarte($Pile->getNbCartes()-1) ;
=======
    public function __construct(Array $home){
        if (count($home) != 1){
            throw new InvalidArgumentException("Le home doit être initialisé avec une seule carte");
        }
        $this->home = $home;
>>>>>>> 4a9f1b226f983e7a8a6876b8010895273264287f
    }

    
    /**
     * La méthode ajouterCarte() ajoute la carte mise en paramètre au dessus du home.
     * 
     * @param $carte
     */

    public function getNbCartes() : int{
        return count($this->home);
    }

    public function ajouterCarte(Carte $carte) : void{
        $this->home[] = $carte;
    }

    /**
     * La méthode retirerCarte retire la dernière carte du home si la liste n'est pas vide.
     */

    public function retirerCarte() : void{
        if ($this->getNbCartes() == 0){
            throw new OutOfRangeException("Le liste est deja vide");
        }
        $this->home = array_pop($this->home);
    }

}
