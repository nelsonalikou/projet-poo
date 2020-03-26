<?php

require_once "Carte.class.php";
require_once "Valeur.class.php";
require_once "Couleur.class.php";
require_once "Pile.class.php";
require_once "Table.class.php";

$as = new Valeur("a");
$coeur = new Couleur("coeur");
$pique = new Couleur("pique");

$asDeCoeur = new Carte($as, $coeur , 1);
$asDePique = new Carte($as, $pique , 1);

$pile1 = new Pile([$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique]);
$pile2 = new Pile([$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique]);
$pile3 = new Pile([$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique]);
$pile4 = new Pile([$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique]);
$pile5 = new Pile([$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique]);
$pile6 = new Pile([$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique]);
$pile7 = new Pile([$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique]);

$table = new Table([$pile1, $pile2, $pile3, $pile4, $pile5, $pile6, $pile7]);

echo $table->getNbCartes(0)."\n";
$table->retirerCarte(0);
echo $table->getNbCartes(0);

echo $table;