<?php

require_once("Pile.class.php");
require_once("Carte.class.php");

class Deck{
    private $cartes; // Pile

    public function __construct()
    {
        $this->cartes = new Pile;
    }

    /**
     * La méthode getNbCartesD() retourne le nombre de cartes du deck.
     * 
     * @return Nombre de cartes
     */

    public function getNbCartes() : int{
        return $this->cartes->getNbCartes();
    }

    /**
     * La méthode piocherCarte() enlève la dernière carte du deck et retourne cette carte.
     * Sinon, la méthode lance une exception selon l'erreur commise.
     *
     * @return carte pioché
     */

    public function piocherCarte() : Carte
    {
        return $this->cartes->jouerCarte();
        //ici on a un transfert d'exception
    }

    /**
     * La méthode ajouterCarte() ajoute la carte renseignée en paramètre à la fin du deck.
     *
     * @param $carte Carte à ajouter
     */

    public function ajouterCarte(Carte $carte) : void{
        $this->cartes->ajouterCarte($carte);
    }
    

}
