<?php

/**
 * Consigne :
 *
 * Créez un programme qui détermine si une chaîne de caractère se trouve dans une autre.
 *
 * Exemples d’utilisation :
 * $> python exo.py bonjour jour
 * true
 *
 * $> python exo.py bonjour joure
 * false
 *
 * $> python exo.py 42
 * error
 *
 * Afficher error et quitter le programme en cas de problèmes d’arguments.
 *
 */

/* fonctions */
function isStringAInStringB(string $aiguille, $botteDeFoin)
{
    return preg_match('/'.$aiguille.'/', $botteDeFoin);
}

/* gestion d'erreurs */
const ERROR_CODE = "Error";
if ($argc < 2) { // pas assez d'argument
    print ERROR_CODE."\n";
    exit;
}

if ($argc > 3) { // plus de 2 arguments
    print ERROR_CODE."\n";
    exit;
}

/* récupération des données */
$botteDeFoin = $argv[1];
$aiguille = $argv[2];

/* résolution */
$aiguilleDansLaBotteDeFoin = isStringAInStringB($aiguille, $botteDeFoin);

/* affichage */
print $aiguilleDansLaBotteDeFoin ? "true\n" : "false\n";