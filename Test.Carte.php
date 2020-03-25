<?php

declare(strict_types = 1);

require_once "Carte.class.php";

$asDeCoeur = new Carte("\e[31mA\e[0m", "\e[31m:hearts:\e[0m" , 13);
echo "$asDeCoeur\n";
$vide = new Carte;
$asDeCarreau = new Carte("As" , "Carreau" , 13);
echo "$asDeCarreau\n";
$asDePique = new Carte("As" , "Pique" , 13);
echo "$asDePique\n";
$TroisDePique = new Carte("Trois" , "Pique" , 2);
echo "$TroisDePique\n";
