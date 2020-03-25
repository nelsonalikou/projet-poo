<?php

declare(strict_types = 1);

require_once "Carte.class.php";

$asDeCoeur = new Carte("As", "♥" , 13);
echo "$asDeCoeur\n";

$asDeCoeur = new Carte("As", "♠" , 13);
echo "$asDeCoeur\n";