<?php

require_once("Deck.class.php");
require_once("Partie.class.php");
require_once("Home.class.php");
require_once("Table.class.php");
require_once("Pile.class.php");

class Tour{
    private $deck; // Deck
    private $home; // Home
    private $partie; // Partie
    private $table; // Table
    private $difficulte; // int

    /**
     * Le constructeur de la classe Tour affecte aux attributs deck, home et table des listes vides. L'attribut partie prend pour valeur
     * l'objet en paramètre et difficulte prend pour valeur celle de l'attribut difficulte de l'objet de la classe Partie.
     * 
     * @param $partie
     */

    public function __construct(Partie $partie){
        $this->deck = array();
        $this->home = array();
        $this->partie = array();
        $this->table = $partie;
        $this->difficulte = $partie->getDifficulte();
    }

    /**
     * Méthode getDifficulte().
     * Retourne la valeur de la difficulté
     * 
     * @return $difficulte
     */

    public function getDifficulte() : int{
        return $this->difficulte;
    }

    /**
     * La méthode distribution() permet d'initialiser un tour en créant un tas de 56 cartes, en distribuant les cartes entre la table, le home
     * et le deck.
     */

    public function distribution() : void{
        $tas = new Pile("NOM DU FICHIER ICI");
        $tas->melangerCartes();

        $colonne1 = [];
        $colonne2 = [];
        $colonne3 = [];
        $colonne4 = [];
        $colonne5 = [];
        $colonne6 = [];
        $colonne7 = [];
        for ($i = 0; $i < 5; $i++){
            $colonne1 = $tas->jouerCarte();
            $colonne2 = $tas->jouerCarte();
            $colonne3 = $tas->jouerCarte();
            $colonne4 = $tas->jouerCarte();
            $colonne5 = $tas->jouerCarte();
            $colonne6 = $tas->jouerCarte();
            $colonne7 = $tas->jouerCarte();
        }

        $this->table->ajouterColonne($colonne1);
        $this->table->ajouterColonne($colonne2);
        $this->table->ajouterColonne($colonne3);
        $this->table->ajouterColonne($colonne4);
        $this->table->ajouterColonne($colonne5);
        $this->table->ajouterColonne($colonne6);
        $this->table->ajouterColonne($colonne7);

        $deck = [];
        for ($i = 0; $i < 20; $i++){
            $deck[] = $tas->jouerCarte();
        }

        $home = $deck[0];
        $deck = array_pop($deck);

        $this->deck = $deck;
        $this->home = $home;
    }

    /**
     * La méthode jouerTour() permet de jouer un tour.
     */

    public function jouerTour() : void{
        echo "Il reste ".$this->deck->getNbCartes()." dans le talon.\n";

        $nb = readLine("Entrez le numéro de la colonne : ");
        while ($nb < 1 && $nb > 7){
            $nb = readLine("Entrez le numéro de la colonne : ");
        }
        $nb = (int) $nb;
        $nb++;

        
    }
}