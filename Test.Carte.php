<?php

declare(strict_types = 1);

require_once "Carte.class.php";
require_once "Valeur.class.php";
require_once "Couleur.class.php";

$as = new Valeur("a");
$joker = new Valeur("j");
$jCoul = new Couleur("joker");
$coeur = new Couleur("coeur");
$pique = new Couleur("pique");

$Joker = new Carte($joker, $jCoul , 13);
echo "$Joker";

$asDePique = new Carte($as, $pique , 13);
echo "$asDePique";

echo "$Joker,$asDePique";
