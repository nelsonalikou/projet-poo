<?php

# ALIKOU DONGMO Nelson & GRAVE Ewan & VANNIER Alexandre

require_once("Tour.class.php");

class Partie{
    private $score; // int
    private $difficulte; // int
    private $nbTourGagne; // int

    /**
     * Le constructeur de la classe Partie affecte la valeur mise en paramètre à l'attribut difficulté, et 0 aux autres attributs
     *
     * @param $diff Difficulté
     */

    public function __construct(int $diff){
        $this->score = 0;
        $this->difficulte = $diff;
        $this->nbTourGagne = 0;
    }

    /**
    * Accesseur au score. Retourne le score.
    *
    * @return score de la partie
    */

    public function getScore() : int{
        return $this->score;
    }

    /**
    * La méthode getNbCartes(). Ajoute un score au score principal.
    *
    */

    public function ajouterScore(int $score){
        $this->score += $score;
    }

    /**
    * Accesseur à la difficultée de la partie.  Retourne la difficultée de la partie.
    *
    * @return difficulte de la partie
    */

    public function getDifficulte() : int{
        return $this->difficulte;
    }

    /**
    * Accesseur au nombre de tour gagné. Retourne le nombre de tour gagné.
    *
    * @return Tour gagné
    */

    public function getNbTourGagne() : int{
        return $this->nbTourGagne;
    }

    /**
    * La méthode ajouterTourGagne(). Ajoute une victoire au total de tour gagné.
    *
    */

    public function ajouterTourGagne(){
        $this->nbTourGagne+=1;
    }

    /**
    * La fonction initialiser(). Initialise la partie.
    *
    */

    public function initialiser() : void{
        switch($this->difficulte){
            case 1:
                $bonusDeck = 100;
            break;
            case 2:
                $bonusDeck = 200;
            break;
            case 3:
                $bonusDeck = 300;
            break;
        }

        $tour = new Tour($this);
        $tour->distribution();
        $gagne = $tour->jouer();

        while ($gagne){
            $this->ajouterScore($tour->getDeck()->getNbCartes()*$bonusDeck);
            $this->ajouterScore(1000);
            $this->ajouterTourGagne();
            $tour->distribution();
            $gagne = $tour->jouer();
        }

        echo "Votre score final : ".$this->score;
    }


   /* public function sauvegarder() : void{

    }*/
}
