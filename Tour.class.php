<?php

require_once("Deck.class.php");
require_once("Partie.class.php");
require_once("Home.class.php");
require_once("Table.class.php");
require_once("Pile.class.php");
require_once("Carte.class.php");

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
        $this->deck = new Deck();
        $this->home = new Home();
        $this->partie = $partie;
        $this->table = new Table();
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
     * La méthode setDeck() initialise le deck en fonction du tas de carte en paramètre.
     * 
     * @param $tas Tas de carte
     */

    public function setDeck(Pile $tas) : void{
        for ($i = 0; $i < 20; $i++){
            $carte = $tas->jouerCarte();
            $this->deck->ajouterCarte($carte);
        }
    }

    /**
     * La méthode setHome() initialise le home en piochant une carte du deck;
     */

    public function setHome() : void{
        $carte = $this->deck->piocherCarte();
        $this->home->ajouterCarte($carte);
    }

    /**
     * La méthode setTable() initialise la table en fonction du tas de carte en paramètre.
     * 
     * @param $tas Tas de carte
     */

    public function setTable(Pile $tas) : void{
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
    }

    /**
     * La méthode distribution() permet d'initialiser un tour en créant un tas de 56 cartes, en distribuant les cartes entre la table, le home
     * et le deck.
     */

    public function distribution() : void{
        $tas = new Pile("Cartes_Solitaire.ini");
        $tas->melangerCartes();

        $this->setTable($tas);
        $this->setDeck($tas);
        $this->setHome();
    }

    /**
     * La méthode jouerDeck() détermine si le joueur doit jouer le deck, et retourne un booléen.
     * 
     * @return $res True si le joueur joue le deck, False sinon
     */

    public function jouerDeck() : bool{
        $res = True;
        $i = 0;
        while ($i < 7 && $res){
            if ($this->home->estJouable($this->table->getDernCarte($i)) == True){
                $res = False;
            }
            $i++;
        }
        return $res;
    }

    /**
     * La méthode jouerTour() permet de jouer le tour tant que la joueur n'a pas perdu ou gagné.
     * 
     * @return $gagner True si le joueur gagne le tour, False sinon
     */

    public function jouer() : bool{
        $gagner = True;

        while ($this->table->estVide() == False && $gagner){
            echo "Il reste ".$this->deck->getNbCartes()." dans le talon.\n";

            $nb = readLine("Entrez le numéro de la colonne : ");
            $nb = (int) $nb;
            $nb--;
            $carteJoue = $this->table->getDernCarte($nb);
            while ($nb < 1 && $nb > 7 || $this->home->estJouable($carteJoue) != True){
                $nb = readLine("Entrez le numéro de la colonne : ");
                $nb = (int) $nb;
                $nb--;
                $carteJoue = $this->getDernCarte($nb);
            }

            $this->home->ajouterCarte($carteJoue);
    
            $jouerDeck = $this->jouerDeck();
            if ($jouerDeck){
                if ($this->deck->getNbCartes() == 0){
                    $gagner = False;
                }else{
                    $carte = $this->deck->piocherCarte();
                    $this->home->ajouterCarte($carte);
                }
            }
        }
        return $gagner;
    }
}