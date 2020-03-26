<?php

declare(strict_types = 1);

require_once "Carte.class.php";
require_once "Valeur.class.php";
require_once "Couleur.class.php";

$as = new Valeur("a");
$coeur = new Couleur("coeur");
$pique = new Couleur("pique");

$asDeCoeur = new Carte($as, $coeur , 13);
echo "$asDeCoeur\n";

$asDeCoeur = new Carte($as, $pique , 13);
echo "$asDeCoeur\n";