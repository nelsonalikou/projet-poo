<?php

require_once "Tour.class.php";


$pile = new Tour(1);
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

$pile->afficherTable();