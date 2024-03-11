<?php

/**
 * Consigne :
 *
 * Créez un programme qui affiche ses arguments reçus à l’envers.
 *
 * Exemples d’utilisation :
 * $> python exo.py “Suis” “Je” “Drôle”
 * Drôle
 * Je
 * Suis
 *
 * $> python exo.py ha ho
 * ho
 * ha
 *
 * $> python exo.py “Bonjour 36”
 * Bonjour 36
 *
 * Afficher error et quitter le programme en cas de problèmes d’arguments.
 *
 */

/* fonctions */

/* gestion d'erreurs */
if ($argc < 2) {
    print "Error : pas d'argument\n";
    exit;
}

/* récupération des données */
$paramsToDisplay = [];
foreach ($argv as $key => $item) {
    if ($key === 0) {
        continue;
    }
    $paramsToDisplay[$argc - $key] = $item;
}

/* résolution */
ksort($paramsToDisplay);

/* affichage */
print implode("\n", $paramsToDisplay)."\n";