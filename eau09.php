<?php

/**
 * Consigne :
 *
 * Créez un programme qui détermine si une chaîne de caractères ne contient que des chiffres.
 *
 * Exemples d’utilisation :
 * $> python exo.py “4445353”
 * true
 *
 * $> python exo.py 42
 * true
 *
 * $> python exo.py “Bonjour 36”
 * false
 *
 * Afficher error et quitter le programme en cas de problèmes d’arguments.
 *
 */

/* fonctions */
function isNumeric(string $string) {
    return preg_match('/[0-9]+/', $string) && !preg_match('/\D/', $string);
}

/* gestion d'erreurs */
const ERROR_CODE = "error";
if ($argc == 1) { // pas assez d'argument
    print ERROR_CODE."\n";
    exit;
}

if ($argc > 2) { // trop d'arguments
    print ERROR_CODE."\n";
    exit;
}

/* récupération des données */
$argument = $argv[1];

/* résolution */
// sinon on pourrait boucler sur chaque caractère pour vérifier 1 par 1 mais le preg_match le fait d'un coup...

/* affichage */
print isNumeric($argument) ? "true\n" : "false\n";