<?php

require_once("Carte.class.php");

class Pile{
    private $cartes; // array de Cartes

    /**
     * Constructeur de la classe Pile.
     * Affecte à l'attribut $cartes la liste de cartes mise en paramètre.
     * 
     * @param $cartes Liste de cartes
     */
    public function __construct (string $nomFichier="")
    {
        $this->cartes = array();
        if($nomFichier != ""){
            $fichier = parse_ini_file($nomFichier, true, INI_SCANNER_TYPED) ;
            
            if ($fichier === false)
                die('Erreur de lecture') ;
            else
            {
                foreach ($fichier as $couleur => $cartes)
                    foreach ($cartes as $valeur => $ordre)
                        $this->cartes[] = new Carte((string)$valeur, (string)$couleur, (int)$ordre);
                $this->cartes[] = new Carte("Joker", "Joker",14);
                $this->cartes[] = new Carte("Joker", "Joker",14);
                $this->cartes[] = new Carte("Joker", "Joker",14);
                $this->cartes[] = new Carte("Joker", "Joker",14);
            }
        }
    }

    public function melangerCartes() : void{
        shuffle($this->cartes);
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
            throw new OutOfBoundsException("Indice invalide");
        }
        return $this->cartes[$i];
    }

    
    public function estVide() : bool {
        return count($this->cartes)==0;
    }
    /**
     * La méthode retirerCarte() retire la dernière carte de la pile si celle-ci n'est pas vide, et lance une exception sinon.
     */

    public function jouerCarte() : Carte{
        if ($this->getNbCartes() == 0){
            throw new Exception("Impossible de supprimer une carte car la pile est déjà vide");
        }
        $carte = $this->cartes[count($this->cartes)-1];
        array_pop($this->cartes);
        return $carte;
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
