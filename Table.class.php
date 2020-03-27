<?php

require_once("Pile.class.php");
require_once("Carte.class.php");

class Table{
    private $piles; // Array

    /**
     * Constructeur de la classe Pile. Ce constructeur affecte à l'attribut $piles une liste vide.
     */

    public function __construct(){
        $this->piles = [];
    }

    /**
     * La méthode getNbCol() retourne le nombre de colonnes de la pile.
     * 
     * @return Nombre de colonnes
     */

    public function getNbCol() : int{
        return count($this->piles);
    }

    /**
     * La méthode ajouterColonne() ajoute à l'attribut $piles la pile mise en paramètre si celle-ci à bien 5 cartes.
     * 
     * @param $pile Colonne à ajouter
     */

    public function ajouterColonne(Array $colonne) : void{
        if (count($colonne) != 5){
            throw new Exception("Nombre de carte incorrect");
        }
        if ($this->getNbCol() == 7){
            throw new Exception("La table est deja complète");
        }

        $this->piles[] = $colonne;
    }

    /**
     * La méthode getNbCarte() retourne le nombre de cartes de la pile d'indice i, et lance une exception si l'indice n'est pas correct
     * 
     * @param $i Indice de la pile
     * @return Nombre de cartes
     */

    public function getNbCartes(int $i) : int{
        if ($i < 0 || $i >= 7){
            throw new Exception("Indice invalide");
        }
        return count($this->piles[$i]);
    }

    /**
     * La méthode retirerCarte() enlève la dernière carte de la pile i si cet indice est correct et si la pile n'est pas déjà vide.
     * Sinon, la méthode lance une exception selon l'erreur commise.
     * 
     * @param $i Indice de la pile
     */

    public function retirerCarte(int $i) : void{
        if ($i < 0 || $i >= 7){
            throw new Exception("Indice invalide");
        }
        if ($this->getNbCartes($i) == 0){
            throw new Exception("La pile est déjà vide");
        }

        $this->piles[$i] = array_pop($this->piles[$i]);
    }

    /**
     * La méthode ajouterCarte() ajoute la carte mise en paramètre dans la pile d'indice i.
     * 
     * @param $i Indice de la colonne
     * @param $carte Carte à ajouter
     */

    public function ajouterCarte(int $i, Carte $carte) : void{
        if ($i < 0 || $i >= 7){
            throw new Exception("Indice invalide");
        }
        if ($this->getNbCartes($i) == 0){
            throw new Exception("La pile est déjà vide");
        }

        $this->piles[$i]->ajouterCarte($carte);
    }

    /**
     * La méthode estVide() détermine si toute les colonnes de la table sont vides, et retourne un booléen.
     * 
     * @return True si la table est vide, False sinon
     */

    public function estVide() : bool{
        $i = 0;
        $boucle = False;

        while ($boucle && $i < 7){
            if ($this->getNbCartes($i) != 0){
                $boule = True;
            }
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

    public function getDernCarte(int $i) : Carte{
        if ($i < 0 || $i > 7 || $this->getNbCartes($i) == 0){
            throw new OutOfRangeException("Indice invalide");
        }

        return $this->piles[$i][$this->getNbCartes($i)-1];
    }

    public function __toString() : string{
        
    }
}