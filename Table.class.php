<?php

require_once("Pile.class.php");

class Table{
    private $piles; // Pile

    /**
     * Constructeur de la classe Pile. Ce constructeur affecte à l'attribut $piles une liste de 7 objets de la classe Pile contenant chacun
     * 5 cartes. Si ces conditions ne sont pas respectées, une excpetion est lancée.
     * 
     * @param $piles Liste de piles
     */

    public function __construct(Array $piles){
        if (count($piles) != 7){
            throw new Excpetion("Nombre de colonnes incorrect");
        }
        for ($i = 0; $i < count($piles); $i++){
            if ($piles[$i]->getNbCartes() != 5){
                $n = $i+1;
                throw new Exception("Nombre de carte incorrect dans la colonne $n");
            }
            $this->piles[] = $piles[$i];
        }
    }

    /**
     * La méthode getNbCarte() retourne le nombre de cartes de la pile d'indice i, et lance une exception si l'indice n'est pas correct
     * 
     * @param $i Indice de la pile
     * @return Nombre de cartes
     */

    public function getNbCartes(int $i) : int{
        if ($i < 0 || $i >= 5){
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

    public function retirerCarte(int $i) : void{
        if ($i < 0 || $i >= 5){
            throw new Exception("Indice invalide");
        }
        if ($this->getNbCartes($i) == 0){
            throw new Exception("La pile est déjà vide");
        }

        $this->piles[$i]->retirerCarte();
    }

    public function __toString() : string{
        
    }
}