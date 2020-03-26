<?php

declare(strict_types = 1);

require_once "Carte.class.php";
require_once "Valeur.class.php";
require_once "Couleur.class.php";

$carte = new Carte(2, "Pique" , 2);
echo $carte;
echo "\n";
/*$val = $carte->getSymboleValeur();
echo "$val.\n";
$ordre = $carte->getOrdre();
echo "$ordre\n";*/