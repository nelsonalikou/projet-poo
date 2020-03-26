<?php

require_once("Pile.class.php");
require_once("Deck.class.php");
require_once("Table.class.php");

class Home{
    private $Home; // Pile


    /**
     * Constructeur de la classe Home.
     * Prend la dernière carte de la pile et la met dans le home.
     * 
     * @param $Pile Pile dans laquelle l'on va prendre la carte à mettre dans le home 
     */

    public function __construct(Pile  $Pile){
        if ($Pile->getNbCartes() < 1){
            throw new Exception("Indice invalide");}
        $this->Home[] = $Pile->getCarte($Pile->getNbCartes()-1) ;
    }

    
    /**
     * La méthode ajouterCarte() ajoute la carte mise en paramètre au dessus du home.
     * 
     * @param $carte
     */
    /*public function ajouterCarte(Carte $carte) : void{
        $this->Home[] = $carte;
    }
*/



}
