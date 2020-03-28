<?php

require_once("Pile.class.php");
require_once("Carte.class.php");

class Home{
    private $home; // Pile

    /**
     * Constructeur de la classe Home.
     * Attribut à l'attribut home la liste de carte mise en paramètre contenant une carte.
     *
     * @param $home Liste contenant une seule carte
     */

    public function __construct(){

        $this->home = new Pile;

    }

    /**
    * Accesseur au nombre de cartes. Renvoie le nombre de cartes présente dans le home.
    *
    * @return Nombre de cartes
    */

    public function getNbCartes() : int{
        return $this->home->getNbCartes();
    }

     /**
      * La méthode ajouterCarte() ajoute la carte mise en paramètre au dessus du home.
      *
      * @param $carte
      */

    public function ajouterCarte(Carte $carte) : void{
        $this->home->ajouterCarte($carte);
    }

    /**
     * La méthode retirerCarte retire la dernière carte du home si la liste n'est pas vide.
     *
     */

    public function retirerCarte() : Carte{
        return $this->home->jouerCarte();    }

    /**

     * La méthode getHome() retourne la dernière carte de la liste.
     *
     * @return Derniere carte
     */

    public function getDerniereCarte() : Carte{

        return $this->home->getCarte($this->getNbCartes()-1);

    }

    /**
     * La méthode estJouable() détermine si la carte mise en paramètre est jouable avec le home actuel.
     *
     * @return True si la carte est jouable, False sinon
     */

    public function estJouable(Carte $carte) : bool{
        $ordre = $this->getDerniereCarte()->getOrdre();
        return $carte->getOrdre() == $ordre-1 || $carte->getOrdre() == $ordre+1 || $carte->isJoker() || $this->getDerniereCarte()->isJoker();
    }




     /**
      * Fonction d'affichage. Affiche uniquement la carte située au dessus du home.
      *
      * @return affichage
      */

    public function __toString() {
        $res = "\n";
        $res= $res."{$this->getDerniereCarte()}";
        $res= $res."\n";

        return $res;
    }

}
