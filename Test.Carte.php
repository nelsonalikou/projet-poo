<?php

declare(strict_types = 1);

require_once "Carte.class.php";
require_once "Valeur.class.php";
require_once "Couleur.class.php";

$carte = new Carte(2, "pique" , 2);
echo $carte;