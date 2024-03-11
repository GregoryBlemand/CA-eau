<?php

/**
 * Consigne :
 *
 * Créez un programme qui affiche toutes les différentes combinaisons de deux nombres entre 00 et 99 dans l’ordre croissant.
 *
 * Exemples d’utilisation :
 * $> python exo.py
 * 00 01, 00 02, 00 03, 00 04, ... , 00 99, 01 02, ... , 97 99, 98 99
 * $>
 *
 */

/* fonctions */
function getNumberAsString(int $number): string {

    if ($number < 10){
        return '0'.$number;
    }

    return (string) $number;
}

/* résolution */
$combinaisonList = [];
for ($nombre1 = 0; $nombre1 < 99; $nombre1++) {

    for ($nombre2 = 1; $nombre2 < 100; $nombre2++) {

        if ($nombre2 <= $nombre1) {
            continue;
        }

        $combinaisonList[] = getNumberAsString($nombre1).' '.getNumberAsString($nombre2);
    }

}

/* affichage */
print implode(', ', $combinaisonList)."\n";