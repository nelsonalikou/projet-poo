<?php
printf( "%9s%4s%9s","\e[30;47m♠\e[0m"," ", "--------");
print( "   ");
printf( "%9s%4s%9s","\e[30;47m♠\e[0m"," ", "--------");

$tab = [[1,2,3],2,3,4];
$taille = count($tab);
if  ($taille<5){
    while (count($tab)<7){
        $tab[] = "";
    }
}
$taille = count($tab);
echo "$taille";
$tab[0][3] = 5;
$n = count($tab[0]);
echo "$n\n";
$taille = count($tab);
echo "$taille";

