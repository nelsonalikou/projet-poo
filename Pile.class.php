<?php

require_once("Carte.class.php");

class Pile{
    private $cartes; // Carte

    /**
     * Constructeur de la classe Pile.
     * Affecte à l'attribut $cartes la liste de cartes mise en paramètre.
     * 
     * @param $cartes Liste de cartes
     */

    public function __construct(Array $cartes){
        for ($i = 0; $i < count($cartes); $i++){
            $this->cartes[] = $cartes[$i];
        }
    }

    /**
     * La méthode getNbCartes() retourne le nombre de cartes dans la pile.
     * 
     * @return Nombre de cartes
     */

    public function getNbCartes() : int{
        return count($this->cartes);
    }

    /**
     * La méthode getCarte() retourne la carte d'indice $i, si l'indice est invalide la méthode lance une excpetion.
     * 
     * @param $i Indice de la carte
     * @return Carte d'indice $i
     */

    public function getCarte(int $i) : Carte{
        if ($i >= $this->getNbCartes() || $i < 0){
            throw new Excpetion("Indice invalide");
        }
        return $this->cartes[$i];
    }

    /**
     * La méthode retirerCarte() retire la dernière carte de la pile si celle-ci n'est pas vide, et lance une exception sinon.
     */

    public function retirerCarte() : void{
        if ($this->getNbCartes() == 0){
            throw new Exception("Impossible de supprimer une carte car la pile est déjà vide");
        }
        array_pop($this->cartes);
    }

    /**
     * La méthode ajouterCarte() ajoute la carte mise en paramètre à la fin de la pile.
     * 
     * @param $carte
     */

    public function ajouterCarte(Carte $carte) : void{
        $this->cartes[] = $carte;
    }
}