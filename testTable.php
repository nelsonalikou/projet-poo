<?php

require_once "Carte.class.php";
require_once "Valeur.class.php";
require_once "Couleur.class.php";
require_once "Pile.class.php";
require_once "Table.class.php";

$asDeCoeur = new Carte("as", "coeur" , 1);
$asDePique = new Carte("as", "pique" , 1);

$pile1 = [$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique];
$pile2 = [$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique];
$pile3 = [$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique];
$pile4 = [$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique];
$pile5 = [$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique];
$pile6 = [$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique];
$pile7 = [$asDeCoeur, $asDePique, $asDePique, $asDePique, $asDePique];

$table = new Table();

$table->ajouterColonne($pile1);
$table->ajouterColonne($pile2);
$table->ajouterColonne($pile3);
$table->ajouterColonne($pile4);
$table->ajouterColonne($pile5);
$table->ajouterColonne($pile6);
$table->ajouterColonne($pile7);

echo $table->getNbCartes(0);
if ($table->estVide() == False){
    echo "yres";
}