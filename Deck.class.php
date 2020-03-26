<?php

require_once("Pile.class.php");
require_once("Carte.class.php");

class Deck{
    private $cartes; // Array

    public function __construct()
    {
        $this->cartes = [];
    }

    /**
     * La méthode piocherCarte() enlève la dernière carte du deck.
     * Sinon, la méthode lance une exception selon l'erreur commise.
     *
     */

    public function piocherCarte() : void
        {
        if (count($this->cartes) == 0){
            throw new Exception("Le deck est vide");
        }
        $this->cartes = array_pop($this->cartes);
    }

    public function getNbCartes() : int{
        return count($this->cartes);
    }

    public function ajouterCarte(Carte $carte) : void{
        $this->cartes[] = $cartes;
    }

}
