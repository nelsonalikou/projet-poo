<?php

require_once "Carte.class.php";
require_once "Valeur.class.php";
require_once "Couleur.class.php";
require_once "Pile.class.php";
require_once "Table.class.php";

$asDeCoeur = new Carte("as", "coeur" , 1);
$asDePique = new Carte("as", "pique" , 1);

$table = new Table();

$table->ajouterCarte(0, $asDeCoeur);