<?php
require_once("Partie.class.php");

$difficulte = readLine("Choisissez une difficulté (1 à 3) : ");
$difficulte = (int) $difficulte;
while ($difficulte < 1 || $difficulte > 3){
    $difficulte = readLine("Choisissez une difficulté (1 à 3) : ");
    $difficulte = (int) $difficulte;
}

$partie = new Partie($difficulte);
$partie->initialiser();