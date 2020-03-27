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
     * La méthode setHome() initialise le home en prenant une carte du tas.
     *
     * @param $tas
     */

    public function setHome(Pile $tas) : void{
        $carte = $tas->jouerCarte();
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
            $colonne1[] = $tas->jouerCarte();
            $colonne2[] = $tas->jouerCarte();
            $colonne3[] = $tas->jouerCarte();
            $colonne4[] = $tas->jouerCarte();
            $colonne5[] = $tas->jouerCarte();
            $colonne6[] = $tas->jouerCarte();
            $colonne7[] = $tas->jouerCarte();
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

        $this->setHome($tas);
        $this->setTable($tas);
        $this->setDeck($tas);
    }

    /**
     * La méthode jouerTour() permet de jouer le tour tant que la joueur n'a pas perdu ou gagné.
     *
     * @return True si le joueur gagne le tour, False sinon
     */

    public function jouer() : bool{
        $gagner = True;
        $temps = time();

        while ($this->table->estVide() == False && $gagner){
            /*echo $this->table;
            echo $this->deck;*/
            echo $this->home;

            switch($this->difficulte){
                case 1:
                    $score = 20;
                    $bonusTemps = 400;
                break;
                case 2:
                    $score = 40;
                    $bonusTemps = 750;
                break;
                case 3:
                    $score = 60;
                    $bonusTemps = 1250;
                break;
            }

            $combo = 1;
            $temps = 180+$temps-time();
            echo "Il reste ".$this->deck->getNbCartes()." cartes dans le talon.\n";
            echo "Bonus temps restant : ".$bonusTemps."\n";
            $nb = readLine("Entrez le numéro de la colonne (ou 'd' pour piocher) : ");

            if ((string)$nb == "d"){
                if ($this->deck->getNbCartes() == 0){
                    $gagner = False;
                    return $gagner;
                }else{
                    $carte = $this->deck->piocherCarte();
                    $this->home->ajouterCarte($carte);
                    $combo = 1;
                }
            }else{
                $nb = (int) $nb;
                $nb--;

                while ($nb < 0 || $nb > 7 || $this->table->getNbCartes($nb) == 0){
                    $nb = readLine("Numéro de colonne incorrect : ");
                    $nb = (int) $nb;
                    $nb--;
                }

                $carteJoue = $this->table->getDernCarte($nb);

                while ($this->home->estJouable($carteJoue) != True || $nb < 0 || $nb > 7){
                    $nb = readLine("Numéro de colonne incorrect : ");
                    $nb = (int) $nb;
                    $nb--;
                    $carteJoue = $this->table->getDernCarte($nb);
                }

                $this->home->ajouterCarte($carteJoue);
                $this->table->retirerCarte($nb);

                $this->partie->ajouterScore($score*$combo);
                $combo++;
            }

        }
        return $gagner;
    }
}
