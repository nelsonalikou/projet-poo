<?php
require_once("Couleur.class.php");

$couleur = new Couleur("pique");
echo $couleur->getCouleur();

$couleur = new Couleur("trèfle");
echo $couleur->getCouleur();

$couleur = new Couleur("carreau");
echo $couleur->getCouleur();

$couleur = new Couleur("coeur");
echo $couleur->getCouleur();

$couleur = new Couleur("joker");
echo $couleur->getCouleur();