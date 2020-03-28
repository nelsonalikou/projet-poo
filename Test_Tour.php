<?php

require_once "Tour.class.php";
require_once "Partie.class.php";


$pile = new Tour();
$pile->distribution();

$Home = $pile->getHome();
echo "$Home\n";

echo "\n";
$Deck = $pile -> getDeck();
var_dump($Deck);

echo "\n";
echo "\n";
$Table = $pile->getTable();
var_dump($Table);
echo "\n";

$pile->afficherTour();
echo "\n"."\n";
$pile->delColonne();
echo "\n"."\n";

$Table = $pile->getTable();
var_dump($Table);
echo "\n";

$pile->afficherTour();



