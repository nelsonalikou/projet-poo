<?php

require_once "Carte.class.php";
require_once "Valeur.class.php";
require_once "Couleur.class.php";
require_once "Pile.class.php";

require_once "Home.class.php";

$asDeCoeur = new Carte("as", "coeur" , 1);
$asDePique = new Carte("as", "pique" , 1);

$pile = new Pile("Cartes_Solitaire.ini");
$pile->melangerCartes();
/*var_dump($pile);*/
#echo $pile->getNbCartes();

/*echo $pile->getNbCartes();
echo $pile->getCarte(0);
echo $pile->getCarte(1);

$pile->retirerCarte();
echo $pile->getNbCartes()."\n";

$pile->ajouterCarte($asDePique);
echo $pile->getNbCartes();*/

$Home = new Home();
$Home->ajouterCarte($pile->getCarte(0));
$Home->ajouterCarte($pile->getCarte(1));

Var_dump($Home);
echo "$Home\n";
$last = $Home->getCarteH(0);
echo "$last\n";
/*echo "\n";
echo "$pile";
echo "\n";

 $carte1=$pile->getCarte(0) ;
 echo "$carte1\n";*/

 $aff = $pile->printSideBySide2($pile->getCarte(0),$pile->getCarte(1));
 echo "$aff\n";

 $testRet = $pile->carteRetourne($asDeCoeur);
 echo "$testRet\n";

