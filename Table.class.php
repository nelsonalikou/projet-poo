<?php

require_once("Pile.class.php");
require_once("Carte.class.php");

class Table{
    private $piles; // Array de Pile

    /**
     * Constructeur de la classe Pile. Ce constructeur affecte à l'attribut $piles une liste vide.
     */

    public function __construct(){
        $this->piles = [];
        for ($i = 0 ; $i < 7 ; $i++)
            $this->piles[] = new Pile;
    }


    /**
     * La méthode getNbCarte() retourne le nombre de cartes de la pile d'indice i, et lance une exception si l'indice n'est pas correct
     *
     * @param $i Indice de la pile
     * @return Nombre de cartes
     */

    public function getNbCartesColonne(int $i) : int{
        if ($i < 0 || $i >= 7){
            throw new Exception("Indice invalide");
        }
        return $this->piles[$i]->getNbCartes();
    }

    /**
     * La méthode retirerCarte() enlève la dernière carte de la pile i si cet indice est correct et si la pile n'est pas déjà vide.
     * Sinon, la méthode lance une exception selon l'erreur commise.
     *
     * @param $i Indice de la pile
     */

    public function jouerCarte(int $i) :Carte {
        if ($i < 0 || $i >= 7){
            throw new OutOfBoundsException("Indice invalide");
        }
        return $this->piles[$i]->jouerCarte();
    }

    /**
     * La méthode ajouterCarte() ajoute la carte mise en paramètre dans la pile d'indice i.
     *
     * @param $i Indice de la colonne
     * @param $carte Carte à ajouter
     */

    public function ajouterCarte(int $j , Carte $carte) : void{
        
        if ($j < 0 || $j >=  7){
            throw new OutOfBoundsException("La table est deja complète");
        }
        $this->piles[$j]->ajouterCarte($carte); // attention, il peut y avoir transfert d'exception
    }

    /**
     * La méthode estVide() détermine si toute les colonnes de la table sont vides, et retourne un booléen.
     *
     * @return True si la table est vide, False sinon
     */

    public function estVide() : bool{
        $i = 0;
        $boucle = True;

        while ($boucle && $i < 7){
            $boucle = $this->piles[$i]->estVide();
            $i++;
        }
        return $boucle;
    }

    /**
     * La méthode getDernCarte() retourne la dernière carte de la colonne d'indice i, si cet indice est correct.
     *
     * @param $i Indice de la colonne
     * @return $carte Dernière carte
     */

    public function voirCarte(int $i, int $j) :Carte {
        if ($i < 0 || $i >= 7){
            throw new OutOfBoundsException("Indice invalide");
        }
        return $this->piles[$i]->getCarte($j);
    }
    

}
