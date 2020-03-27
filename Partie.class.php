<?php

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

    public function getScore() : int{
        return $this->score;
    }

    public function ajouterScore(int $score){
        $this->score += $score;
    }

    public function getDifficulte() : int{
        return $this->difficulte;
    }

    public function getNbTourGagne() : int{
        return $this->nbTourGagne;
    }

    public function ajouterTourGagne(){
        $this->nbTourGagne+=1;
    }

    public function initialiser() : void{
        $tour = new Tour($this);
        $tour->distribution();
        $gagne = $tour->jouer();

        while ($gagne){
            $this->ajouterScore(1000);
            $this->ajouterTourGagne();
            $tour->distribution();
            $gagne = $tour->jouer();
        }

        echo "Votre score final : ".$this->score;
    }

    public function sauvegarder() : void{

    }
}