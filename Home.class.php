<?php

require_once("Pile.class.php");
require_once("Deck.class.php");
require_once("Table.class.php");
require_once("Carte.class.php");

class Home{
    private $home; // Array de cartes

    /**
     * Constructeur de la classe Home.
     * Attribut à l'attribut home la liste de carte mise en paramètre contenant une carte.
     *
     * @param $home Liste contenant une seule carte
     */

    public function __construct(){

        $this->home = [];

    }

    /**
    * Accesseur au nombre de cartes. Renvoie le nombre de cartes présente dans le home.
    *
    * @return Nombre de cartes
    */

    public function getNbCartesH() : int{
        return count($this->home);
    }

     /**
      * La méthode ajouterCarte() ajoute la carte mise en paramètre au dessus du home.
      *
      * @param $carte
      */

    public function ajouterCarte(Carte $carte) : void{
        $this->home[] = $carte;
    }

    /**
     * La méthode retirerCarte retire la dernière carte du home si la liste n'est pas vide.
     *
     */

    public function retirerCarte() : void{
        if ($this->getNbCartes() == 0){
            throw new OutOfRangeException("Le liste est deja vide");
        }
        $this->home = array_pop($this->home);
    }

    /**

     * La méthode getHome() retourne la dernière carte de la liste.
     *
     * @return Derniere carte
     */

    public function getHome() : Carte{

        return $this->home[($this->getNbCartesH())-1];

    }

    /**
     * La méthode estJouable() détermine si la carte mise en paramètre est jouable avec le home actuel.
     *
     * @return True si la carte est jouable, False sinon
     */

    public function estJouable(Carte $carte) : bool{
        return $carte->getOrdre() == $this->getHome()->getOrdre()-1 || $carte->getOrdre() == $this->getHome()->getOrdre()+1 || $carte->isJoker() || $this->getHome()->isJoker();
    }



     /**
     * La méthode getCarteH() retourne la carte située au dessus du home, si pas de carte dans le home, la méthode lance une excpetion.
     *
     * @return Carte au dessus du home
     */

    public function getCarteH() : Carte{
        if ( $this->getNbCartesH() == 0){
            throw new OutOfBoundsException("Pas de cartes dans le home");
        }
        return $this->home[($this->getNbCartesH())-1];
    }

     /**
      * Fonction d'affichage. Affiche uniquement la carte située au dessus du home.
      *
      * @return affichage
      */

    public function __toString() {
        $res = "\n";
        $res= $res."{$this->getCarteH($this->getNbCartesH()-1)}";
        $res= $res."\n";

        return $res;
    }

}
