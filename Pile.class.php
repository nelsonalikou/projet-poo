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

    /**
     * La méthode melangerCartes() permet de melanger les cartes.
     *
     */

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
        echo "Taille : ".$this->getNbCartes()."\n";
        if ($i >= $this->getNbCartes() || $i < 0){
            throw new OutOfBoundsException("Indice invalide");
        }
        return $this->cartes[$i];
    }

    /**
     * La méthode estVide() permet savoir si la pile vide.
     *
     * @return True si la pile est vide, sinon False.
     */

    public function estVide() : bool {
        return count($this->cartes)==0;
    }
    /**
     * La méthode retirerCarte() retire la dernière carte de la pile si celle-ci n'est pas vide, et lance une exception sinon.
     *
     * @return Carte qui à été jouer.
     */

    public function jouerCarte() : Carte{
        if ($this->getNbCartes() == 0){
            throw new OutOfBoundsException("Impossible de supprimer une carte car la pile est déjà vide");
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

    /**
     * La méthode carteRetourne() un affichage de la carte retourné.
     *
     * @param $carte Carte à retourner
     * @return affichage
     */

    public function carteRetourne(Carte $carte) : string {
      $res = "\n" ;
      $res = $res ." \e[47m     \e[0m"."\n";
      $res = $res ." \e[47m     \e[0m"."\n" ;
      $res = $res ." \e[47m     \e[0m"."\n";
      return $res;
    }

    /**
     * Fonction d'affichage. Permet de faire un affichage
     * des cartes présente dans la pile.
     *
     * @return affichage
     */

    public function __toString() {
        $res = "\n";
        for ($j=0; $j < $this->getNbCartes(); $j++){
            $res = $res."\n";
            $res= $res."{$this->getCarte($j)}";
            $res= $res."\n";
            }
        return $res;

    }



}


    function printSideBySide( Carte  $C1,  Carte  $C2) : void{
        $n = 0;
        while ($n < ($this->getNbCartes()-1)){
            if ($this->cartes[$n] == $C1){
                $indiceC1 = $n;
            }
            else if (($this->cartes[$n] == $C2) ){
                $indiceC2 = $n;
            }

            $n++;
        }   
        print($this->getCarte($indiceC1).$this->getCarte($indiceC2));
       # print($this->getCarte($indiceC2));
    }

    function printSideBySide2( Carte  $C1,  Carte  $C2) : void{
       
        print($C1->getSymboleValeur()."   ".$C2->getSymboleValeur()."\n");
        print(" "."   "." "."\n");
        print($C1->getCouleur()."   ".$C2->getCouleur());
       # print($this->getCarte($indiceC2));
    }
