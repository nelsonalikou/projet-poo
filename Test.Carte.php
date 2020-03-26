<?php

declare(strict_types = 1);

require_once "Carte.class.php";
require_once "Valeur.class.php";
require_once "Couleur.class.php";

$carte1 = new Carte(2, "carreau" , 2);
echo $carte1;
echo "\n";
$val = $carte1->getSymboleValeur();
echo "$val.\n";
$coul = $carte1->getCouleur();
echo "$coul\n";
$ordre = $carte1->getOrdre();
echo "$ordre\n";

$carte2 = new Carte(2, "Coeur" , 2);
echo $carte2;
echo "\n";
$val = $carte2->getSymboleValeur();
echo "$val.\n";
$coul = $carte2->getCouleur();
echo "$coul\n";
$ordre = $carte2->getOrdre();
echo "$ordre\n";

$carte3 = new Carte(2, "trefle" , 2);
echo $carte3;
echo "\n";
$val = $carte3->getSymboleValeur();
echo "$val.\n";
$coul = $carte3->getCouleur();
echo "$coul\n";
$ordre = $carte3->getOrdre();
echo "$ordre\n";

$carte4 = new Carte(2, "pique" , 2);
echo $carte4;
echo "\n";
$val = $carte4->getSymboleValeur();
echo "$val.\n";
$coul = $carte4->getCouleur();
echo "$coul\n";
$ordre = $carte4->getOrdre();
echo "$ordre\n";

$carte5 = new Carte("Joker", "Joker" , 14);
echo $carte5;
echo "\n";
$val = $carte5->getSymboleValeur();
echo "$val.\n";
$coul = $carte5->getCouleur();
echo "$coul\n";
$ordre = $carte5->getOrdre();
echo "$ordre\n";
