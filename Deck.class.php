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
     * La méthode getNbCartes() retourne le nombre de cartes du deck.
     * 
     * @return Nombre de cartes
     */

    public function getNbCartes() : int{
        return count($this->cartes);
    }

    /**
     * La méthode piocherCarte() enlève la dernière carte du deck et retourne cette carte.
     * Sinon, la méthode lance une exception selon l'erreur commise.
     *
     * @return $carte
     */

    public function piocherCarte() : Carte
        {
        if (count($this->cartes) == 0){
            throw new Exception("Le deck est vide");
        }

        $carte = $this->cartes[$this->getNbCartes()];
        $this->cartes = array_pop($this->cartes);

        return $cartes;
    }

    /**
     * La méthode ajouterCarte() ajoute la carte renseignée en paramètre à la fin du deck.
     * 
     * @param $carte Carte à ajouter
     */

    public function ajouterCarte(Carte $carte) : void{
        $this->cartes[] = $carte;
    }

}
