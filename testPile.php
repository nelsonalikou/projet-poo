<?php

require_once "Carte.class.php";
require_once "Valeur.class.php";
require_once "Couleur.class.php";
require_once "Pile.class.php";

$as = new Valeur("a");
$coeur = new Couleur("coeur");
$pique = new Couleur("pique");

$asDeCoeur = new Carte($as, $coeur , 1);
$asDePique = new Carte($as, $pique , 1);

$pile = new Pile([$asDeCoeur, $asDePique]);

echo $pile->getNbCartes();
echo $pile->getCarte(0);
echo $pile->getCarte(1);

$pile->retirerCarte();
echo $pile->getNbCartes()."\n";

$pile->ajouterCarte($asDePique);
echo $pile->getNbCartes();