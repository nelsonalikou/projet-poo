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
    
    public function __construct(){
        /*if (count($home) != 1){
            throw new InvalidArgumentException("Le home doit être initialisé avec une seule carte");
        }
        $this->home = $home;*/
        $this->home = [];

    }

    
    /**
     * La méthode ajouterCarte() ajoute la carte mise en paramètre au dessus du home.
     * 
     * @param $carte
     */

    public function getNbCartes() : int{
        return count($this->home);
    }

    /**
     * La méthode ajouterCarte() ajoute une carte à la fin de la liste de cartes.
     */

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

    /**
     * La méthode getHome() retourne la dernière carte de la liste.
     * 
     * @return Dernière carte
     */

    public function getHome() : Carte{
        return $this->home[$this->getNbCartes()];
    }

    /**
     * La méthode estJouable() détermine si la carte mise en paramètre est jouable avec le home actuel.
     * 
     * @return True si la carte est jouable, False sinon
     */

    public function estJouable(Carte $carte) : bool{
        return $carte->getOrdre() == $this->getHome()->getOrdre()-1 || $carte->getOrdre() == $this->getHome()->getOrdre()+1;
    }

}
